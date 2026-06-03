@extends('layouts.app')

@section('content')
<x-common.page-breadcrumb pageTitle="Respons" />
<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 mb-6 shadow">
        <div class="flex gap-4">
            <img src="{{ asset($complaint->photo) }}" class="w-52 h-32 object-cover rounded-lg">
            <div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">{{ $complaint->title }}</h2>
                <p class="text-gray-500 mt-1">{{ $complaint->description }}</p>
                <div class="mt-3 text-sm text-gray-400 space-y-1">
                    <p><span class="font-medium">Pelapor:</span> {{ $complaint->user->name }}</p>
                    <p><span class="font-medium">Lokasi:</span> {{ $complaint->location }}</p>
                    <p><span class="font-medium">Tanggal:</span> {{ $complaint->created_at}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
        <h3 class="text-lg font-semibold mb-4 dark:text-white">Tulis Respon</h3>

        @if($complaint->status === 'selesai')
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg space-y-3">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500">
                    selesai
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Respon Admin</p>
                <p class="dark:text-white mt-1">{{ $complaint->response->response ?? '-' }}</p>
            </div>
        </div>

        @elseif(Auth::user()->role === 'admin')
        <form method="POST" action="{{ route('responses.store', $complaint->id) }}">
            @csrf

            {{-- Status Dropdown --}}
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status Pengaduan</label>
            <select name="status"
                class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-3 mb-4 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="diproses" {{ $complaint->status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="ditolak" {{ $complaint->status === 'ditolak'  ? 'selected' : '' }}>Ditolak</option>
                <option value="selesai" {{ $complaint->status === 'selesai'  ? 'selected' : '' }}>Selesai</option>
            </select>

            {{-- Response Textarea --}}
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Respon</label>
            <textarea
                name="response"
                rows="5"
                placeholder="Tulis respon untuk pengaduan ini..."
                class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-3 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('response', $complaint->response->response ?? '') }}</textarea>

            @error('response')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                {{ $complaint->response ? 'Update Respon' : 'Kirim Respon' }}
            </button>
        </form>
        
        @else
        @if($complaint->response)
        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Respon Admin:</p>
            <p class="dark:text-white">{{ $complaint->response->response }}</p>
        </div>
        @else
        <p class="text-gray-500 dark:text-gray-400">Belum ada respon dari admin.</p>
        @endif
        @endif
    </div>
</div>
@endsection