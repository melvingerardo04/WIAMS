<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LogViewerController extends Controller
{
    public function index()
    {
        $auditLogs = AuditLog::with('user')->get();
        return Inertia::render('LogViewer/LogViewer', ['auditLogs' => $auditLogs]);
    }
}
