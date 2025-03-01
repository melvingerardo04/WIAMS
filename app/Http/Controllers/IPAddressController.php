<?php

namespace App\Http\Controllers;

use App\Models\IpAddress;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Auth;
use App\Models\AuditLog;

class IPAddressController extends Controller
{
    // Method to fetch all IP addresses and pass them to the view
    public function index()
    {
        $ipAddresses = IpAddress::join('users', 'ip_addresses.created_by', '=', 'users.id')->get(['ip_addresses.*', 'users.name', 'users.id as user_id']);
        return Inertia::render('IPAddress/IPAddress', ['ipAddresses' => $ipAddresses]);
    }

    // Method to show the edit form for an IP address
    public function edit($id)
    {
        $ipAddress = IpAddress::findOrFail($id);
        return Inertia::render('IPAddress/EditIPAdd', ['ipAddress' => $ipAddress]);
    }

    // Method to update an existing IP address
    public function update(Request $request, $id)
    {
        $ipAddress = IpAddress::findOrFail($id);
        $ipAddress->update($request->all());

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Updated IP Address',
            'details' => json_encode($request->all())
        ]);

        return redirect()->route('ipAddress');
    }

    // Method to delete an IP address
    public function destroy($id)
    {
        $ipAddress = IpAddress::findOrFail($id);
        $ipAddress->delete();

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted IP Address',
            'details' => json_encode(['id' => $id])
        ]);

        return redirect()->route('ipAddress');
    }

    public function create()
    {
        return Inertia::render('IPAddress/CreateIPAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ip_v4' => 'nullable|ip',
            'ip_v6' => 'nullable|ip',
            'label' => 'nullable|string|max:45',
            'comment' => 'nullable|string|max:45',
            'created_by' => 'nullable|string|max:45',
        ]);

        IPAddress::create($request->all());

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Created IP Address',
            'details' => json_encode($request->all())
        ]);

        return redirect()->route('ipAddress');
    }
}