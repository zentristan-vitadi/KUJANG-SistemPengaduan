@extends('layouts.app') {{-- use your actual layout name --}}

@section('content')
<x-common.page-breadcrumb pageTitle="Respons"/>
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

        @if($complaint->response)
        <div class="bg-green-50 dark:bg-green-900 p-4 rounded-lg">
            <p class="text-green-700 dark:text-green-300 font-medium">Sudah direspon:</p>
            <p class="mt-1 dark:text-white">{{ $complaint->response->response }}</p>
        </div>
        @else
        <form method="POST" action="{{ route('responses.store', $complaint->id) }}">
            @csrf
            <textarea
                name="response"
                rows="5"
                placeholder="Tulis respon untuk pengaduan ini..."
                class="w-full border border-gray-300 dark:border-gray-600 rounded-lg p-3 dark:bg-gray-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('response') }}</textarea>

            @error('response')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <button type="submit"
                class="mt-4 bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Kirim Respon
            </button>
        </form>
        @endif
    </div>
</div>
@endsection