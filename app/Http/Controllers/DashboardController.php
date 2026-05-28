<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $query = $user->role === 'admin'
            ? Complaint::query()
            : Complaint::where('user_id', $user->id);

        $totalPengaduan = (clone $query)->count();
        $totalPending   = (clone $query)->where('status', 'pending')->count();
        $totalDitolak   = (clone $query)->where('status', 'ditolak')->count();
        $totalSelesai   = (clone $query)->where('status', 'selesai')->count();

        $laporanPengaduan = (clone $query)->with('user')->get();

        return view('pages.dashboard.ecommerce', compact(
            'totalPengaduan',
            'totalPending',
            'totalDitolak',
            'totalSelesai',
            'laporanPengaduan'
        ) + ['title' => 'E-commerce Dashboard']);
    }
}
