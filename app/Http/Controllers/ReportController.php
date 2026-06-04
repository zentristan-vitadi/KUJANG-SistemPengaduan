<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $complaints = Complaint::with(['user', 'response'])
            ->where('status', 'selesai')
            ->when($user->role !== 'admin', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest()
            ->paginate(15);

        return view('reports.index', compact('complaints'));
    }
}
