@extends('layouts.app')

@section('content')
<h1 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">Selamat Datang {{ auth()->user()->name}}!</h1>
<div class="text-sm text-gray-500 dark:text-gray-400 mb-5">Berikut Adalah Ringkasan Aktivitas Anda Hari Ini.</div>
<div class="grid grid-cols-12 gap-4 md:gap-6">
  <div class="col-span-12 space-y-6 xl:col-span-12">
    <x-ecommerce.ecommerce-metrics :totalPengaduan="$totalPengaduan"
      :totalPending="$totalPending"
      :totalDitolak="$totalDitolak"
      :totalSelesai="$totalSelesai" />
  </div>
</div>
@endsection