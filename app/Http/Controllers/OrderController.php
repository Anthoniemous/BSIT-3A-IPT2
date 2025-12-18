<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'billing.fullName' => 'required|string',
            'billing.email' => 'required|email',
            'billing.address' => 'required|string',
            'items' => 'required|array|min:1',
            'items.*.id' => 'required|integer|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'payment.method' => 'required|string',
        ]);

        $user = $request->user();

        DB::beginTransaction();
        try {
            $productIds = collect($request->input('items'))->pluck('id')->unique()->values()->all();
            $products = Product::whereIn('id', $productIds)->lockForUpdate()->get()->keyBy('id');

            $subtotal = 0;
            $orderItemsData = [];

            foreach ($request->input('items') as $it) {
                $pid = (int)$it['id'];
                $qty = (int)$it['quantity'];
                if (!isset($products[$pid])) throw new \Exception("Product {$pid} not found");
                $product = $products[$pid];
                if ($product->stock < $qty) throw new \Exception("Insufficient stock for: {$product->name}");

                $unit = (float)$product->price;
                $lineSubtotal = $unit * $qty;
                $subtotal += $lineSubtotal;

                $orderItemsData[] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'unit_price' => $unit,
                    'quantity' => $qty,
                    'subtotal' => $lineSubtotal,
                ];

                $product->stock -= $qty;
                $product->save();
            }

            $shipping = $request->input('shipping', 0);
            $total = $subtotal + $shipping;

            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'processing',
                'subtotal' => $subtotal,
                'shipping' => $shipping,
                'total' => $total,
                'billing' => $request->input('billing'),
                'payment' => $request->input('payment'),
            ]);

            foreach ($orderItemsData as $oi) {
                $oi['order_id'] = $order->id;
                OrderItem::create($oi);
            }

            DB::commit();
            return response()->json(['success' => true, 'order_id' => $order->id], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function confirmation(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::with('items')->findOrFail($orderId);

        // Temporary debug: Check if items are loaded
        \Log::info('Order items count: ' . ($order->items ? $order->items->count() : 'null'));

        // Ensure the authenticated user owns this order
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to order.');
        }

        return view('user.order_confirmation', compact('order'));
    }
}