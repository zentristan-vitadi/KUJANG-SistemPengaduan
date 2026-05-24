<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ComplaintController extends Controller
{
    //
    public function index()
    {
        $complaint = Complaint::all();
        $role = Auth::user()->role;
        if ($role == 'admin') {

            // Admin dapat melihat semua laporan
            $laporanPengaduan = Complaint::with('user')->get();
        } else { 

            // User hanya dapat melihat laporan yang mereka buat
            $laporanPengaduan = Complaint::with('user')->where('user_id', Auth::id())->get();
        }
        return view('complaints.index', compact('complaint', 'laporanPengaduan'));
    }
    public function tampil_data()
    {
        return view('complaints.create', ['title' => 'Create Complaint']);
    }

    Public function update(Request $request, $id): RedirectResponse
    {

        $complaint = Complaint::findOrFail($id);
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->location = $request->location;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('/uploads/' . $filename);
            $file->move(public_path('/uploads'), $filename);
            $complaint->photo = '/uploads/' . $filename;
        }
        $complaint->save();

        $complaint->update([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'photo' => $complaint->photo,
        ]);

        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $complaint = new Complaint();
        $complaint->user_id = auth()->id(); // ← this fixes it
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->location = $request->location;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('/uploads/' . $filename);
            $file->move(public_path('/uploads'), $filename);
            $complaint->photo = '/uploads/' . $filename;
        }

        $complaint->status = 'pending';
        $complaint->save();

        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil dibuat.');
    }

    public function show($id): View
    {
        $complaint = Complaint::findOrFail($id);
        return view('complaints.show', compact('complaint'));
    }
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return redirect()->route('complaint.index')->with('success', 'Pengaduan berhasil dihapus.');
    }   
}
