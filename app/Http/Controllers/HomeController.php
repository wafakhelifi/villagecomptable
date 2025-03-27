namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the home page
    public function index()
    {
        return view('home'); // Ensure this view exists
    }
}
