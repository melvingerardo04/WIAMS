<?php
// filepath: /home/melvin/WIAMS/app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\IpAddress;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $ipAddressCount = IpAddress::count();

        return Inertia::render('Dashboard', [
            'userCount' => $userCount,
            'ipAddressCount' => $ipAddressCount,
        ]);
    }
}