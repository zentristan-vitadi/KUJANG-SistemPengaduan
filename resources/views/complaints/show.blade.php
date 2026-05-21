@extends('layouts.app')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-50 dark:bg-gray-900 rounded-lg px-4 py-10">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md w-full max-w-md px-7 py-8">
        <div class="flex items-start gap-4 pb-5 mb-6 border-b border-gray-100 dark:border-gray-700">
            <div class="w-11 h-11 rounded-xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center shrink-0">
                {{-- Swap this SVG for your preferred icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.-->
                    <path fill="rgb(59, 130, 246)" d="M192 64C156.7 64 128 92.7 128 128L128 512C128 547.3 156.7 576 192 576L448 576C483.3 576 512 547.3 512 512L512 234.5C512 217.5 505.3 201.2 493.3 189.2L386.7 82.7C374.7 70.7 358.5 64 341.5 64L192 64zM453.5 240L360 240C346.7 240 336 229.3 336 216L336 122.5L453.5 240z" />
                </svg>
            </div>

            <div>
                <h2 class="text-sm font-bold text-gray-900 dark:text-white">Form Tambah Pengaduan</h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 leading-relaxed">
                    Sampaikan Keluhan Atau Laporan Data
                </p>
            </div>
        </div>
        {{-- ── END HEADER ── --}}


        {{-- ── FORM BODY ── --}}
        <form method="POST" action="{{route ('complaint.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-5">

                {{-- Plain text input --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Judul Pengaduan
                    </label>
                    <input type="text"
                        name="title"
                        id="title"
                        placeholder="Tulis judul pengaduan Anda"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Lokasi Kejadian
                    </label>
                    <input type="text"
                        name="location"
                        id="location"
                        placeholder="Masukan Lokasi Kejadian"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Description
                    </label>
                    <textarea id="description" name="description" placeholder="Masukan Deskripsi..." type="text" rows="6"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:shadow-focus-ring dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-0 focus:outline-hidden disabled:border-gray-100 disabled:bg-gray-50 disabled:placeholder:text-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:disabled:border-gray-800 dark:disabled:bg-white/[0.03] dark:disabled:placeholder:text-white/15"></textarea>
                </div>

                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Foto Bukti
                    </label>
                    <input type="file"
                    name="photo"
                    id="photo"
                        class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400" />
                </div>
                <button
                    type="submit"
                    class="w-full h-11 rounded-xl bg-blue-600 hover:bg-blue-700 active:scale-[0.99]
                 text-white text-sm font-semibold tracking-wide
                 shadow-md shadow-blue-800 transition-all duration-150">
                    Tombol Submit
                </button>

            </div>
        </form>
        {{-- ── END FORM BODY ── --}}
    </div>
</div>
@endsection