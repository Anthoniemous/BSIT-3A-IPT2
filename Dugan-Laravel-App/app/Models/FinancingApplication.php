namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancingApplication extends Model
{
    use HasFactory;

    protected $table = 'financing_applications';
    protected $primaryKey = 'application_id';
    public $timestamps = false;
}
