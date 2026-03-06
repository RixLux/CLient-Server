<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function ping()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Server Laravel aktif (via Controller)',
            'time' => now()
        ]);
    }

    public function info()
    {
    return response()->json([
        'app' => 'Client Server API',
        'version' => '2.0',
        'developer' => 'Mahasiswa TI'
        ]);
    }

     public function profile()
    {
    return response()->json([
        'Nama' => 'Afif Irham Nobel',
        'NIM' => '23343025',
        'Program-Studi' => 'Informatika'
        ]);
    }

    public function status()
    {
    return response()->json([
        'php-version' => phpversion(),
        'Laravel-version' => app()->version(),
        'time' => now()
        ]);
    }




}
