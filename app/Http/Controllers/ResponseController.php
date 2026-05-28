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
            ->where('status', 'selesai')
            ->when($user->role !== 'admin', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest()
            ->paginate(10);

        return view('responses.index', compact('complaints'));
    }
    public function show($id)
    {
        $complaint = Complaint::with(['user', 'response'])->findOrFail($id);
        return view('responses.show', compact('complaint'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|min:5',
        ]);

        $complaint = Complaint::findOrFail($id);

        Response::create([
            'complaint_id' => $complaint->id,
            'admin_id'     => Auth::id(),
            'response'     => $request->response,
        ]);

        $complaint->update(['status' => 'selesai']);

        return redirect()->route('complaint.index')
            ->with('success', 'Respon berhasil dikirim.');
    }
}
