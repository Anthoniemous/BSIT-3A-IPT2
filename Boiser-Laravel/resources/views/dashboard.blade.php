
<title>Archiora - Modern Shopping</title>




<x-app-layout>
    <!-- Header -->


    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white p-10 rounded-2xl shadow-lg flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-bold">Big Savings Await! 🎉</h1>
                    <p class="mt-3 text-lg text-gray-100">
                        Shop the latest deals and discover top products tailored for you.
                    </p>
                    <a href="{{ route('dashboard') }}"
                       class="inline-block mt-6 px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-100 transition">
                        Start Shopping
                    </a>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png"
                     alt="Shopping Illustration"
                     class="w-40 md:w-56 dr2222hadow-lg">
            </div>

            <!-- Categories -->
            <div>


                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">🗂 Categories</h3>
                    <a href="{{ route('services') }}"
                       class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        View all
                    </a>
                </div>


                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <a href="#" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition text-center text-white">
                        👕 <p class="mt-2 font-semibold">Clothing</p>
                    </a>
                    <a href="#" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition text-center text-white">
                        💻 <p class="mt-2 font-semibold">Electronics</p>
                    </a>
                    <a href="#" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition text-center text-white">
                        🏠 <p class="mt-2 font-semibold">Home</p>
                    </a>
                    <a href="#" class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition text-center text-white">
                        🎮 <p class="mt-2 font-semibold">Gaming</p>
                    </a>
                </div>
            </div>

            <!-- Featured Products -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">🔥 Featured Products</h3>
                    <a href="{{ route('services') }}"
                       class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        View all
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                        <img src="https://cdn-icons-png.flaticon.com/512/3081/3081823.png" alt="Product" class="w-32 mx-auto">
                        <h4 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">Wireless Headphones</h4>
                        <p class="text-gray-600 dark:text-gray-300">$59.99</p>
                        <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Add to Cart
                        </button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                        <img src="https://cdn-icons-png.flaticon.com/512/3652/3652191.png" alt="Product" class="w-32 mx-auto">
                        <h4 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">Smartwatch Pro</h4>
                        <p class="text-gray-600 dark:text-gray-300">$129.99</p>
                        <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Add to Cart
                        </button>
                    </div>
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow hover:shadow-lg transition">
                        <img src="https://cdn-icons-png.flaticon.com/512/1046/1046857.png" alt="Product" class="w-32 mx-auto">
                        <h4 class="mt-4 font-semibold text-gray-800 dark:text-gray-200">Sneakers</h4>
                        <p class="text-gray-600 dark:text-gray-300">$89.99</p>
                        <button class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">📦 Recent Orders</h3>
                    <a href="#"
                       class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        View all
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-left text-sm font-semibold">
                                <th class="p-3 text-gray-700 dark:text-gray-300">Date</th>
                                <th class="p-3 text-gray-700 dark:text-gray-300">Product</th>
                                <th class="p-3 text-gray-700 dark:text-gray-300">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 20, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Wireless Headphones</td>
                                <td class="p-3 text-green-600 font-semibold">✔ Delivered</td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 18, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Smartwatch Pro</td>
                                <td class="p-3 text-yellow-500 font-semibold">⌛ Processing</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sept 15, 2025</td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">Sneakers</td>
                                <td class="p-3 text-blue-500 font-semibold">🚚 Shipped</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>

        </div>
    </div>
</x-app-layout>
