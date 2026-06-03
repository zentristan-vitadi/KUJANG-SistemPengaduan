<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ResponseController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $complaints = Complaint::with(['user', 'response'])
            ->where('status', 'diproses')
            ->when($user->role !== 'admin', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest()
            ->paginate(5);

        return view('responses.index', compact('complaints'));
    }
    public function show($id)
    {
        $complaint = Complaint::with(['user', 'response'])->findOrFail($id);
        return view('responses.show', compact('complaint'));
    }
    public function store(Request $request, $id)
    {
        
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'response' => 'required|string|min:5',
            'status'   => 'required|in:diproses,ditolak,selesai',
        ]);

        $complaint = Complaint::findOrFail($id);

        // Update or create the response
        Response::updateOrCreate(
            ['complaint_id' => $complaint->id],
            [
                'admin_id' => Auth::id(),
                'response' => $request->response,
            ]
        );

        // Update the complaint status from the dropdown
        $complaint->update(['status' => $request->status]);

        return redirect()->route('complaint.index')
            ->with('success', 'Respon berhasil dikirim.');
    }
}
