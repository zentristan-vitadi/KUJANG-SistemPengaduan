@extends('layouts.app')

@section('content')
<h1 class="mt-2 font-bold text-gray-800 text-title-sm dark:text-white/90">
  Selamat Datang {{ auth()->user()->name }}!
</h1>
<div class="text-sm text-gray-500 dark:text-gray-400 mb-5">
  Berikut Adalah Ringkasan Aktivitas Anda Hari Ini.
</div>
<div class="grid grid-cols-12 gap-3 md:gap-6">
  <div class="col-span-2 space-y-6 xl:col-span-12">
    <x-ecommerce.ecommerce-metrics
      :totalPengaduan="$totalPengaduan"
      :totalPending="$totalPending"
      :totalDitolak="$totalDitolak"
      :totalDiproses="$totalDiproses"
      :totalSelesai="$totalSelesai" />
  </div>
  <div class="col-span-12 ">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>
    <div x-data="{
    transactions: [
        {
            id: 1,
            name: 'Bought PYPL',
            image: '/images/brand/brand-08.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 2,
            name: 'Bought AAPL',
            image: '/images/brand/brand-07.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 3,
            name: 'Sell KKST',
            image: '/images/brand/brand-15.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 4,
            name: 'Bought FB',
            image: '/images/brand/brand-02.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 5,
            name: 'Sell AMZN',
            image: '/images/brand/brand-10.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 6,
            name: 'Bought MSFT',
            image: '/images/brand/brand-09.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$1,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 7,
            name: 'Bought GOOG',
            image: '/images/brand/brand-01.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$3,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 8,
            name: 'Sell TSLA',
            image: '/images/brand/brand-12.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$4,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 9,
            name: 'Bought NVDA',
            image: '/images/brand/brand-11.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$5,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 10,
            name: 'Sell META',
            image: '/images/brand/brand-03.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$6,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 11,
            name: 'Bought DIS',
            image: '/images/brand/brand-04.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$7,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 12,
            name: 'Bought NFLX',
            image: '/images/brand/brand-05.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$8,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 13,
            name: 'Sell CRM',
            image: '/images/brand/brand-06.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$9,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 14,
            name: 'Bought TSLA',
            image: '/images/brand/brand-13.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$10,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 15,
            name: 'Sell AAPL',
            image: '/images/brand/brand-14.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$11,567.88',
            category: 'Finance',
            status: 'Failed',
        },
    ],
    itemsPerPage: 5,
    currentPage: 1,
    dropdownOpen: null,
    get totalPages() {
        return Math.ceil(this.transactions.length / this.itemsPerPage);
    },
    get paginatedTransactions() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.transactions.slice(start, end);
    },
    get displayedPages() {
        const range = [];
        for (let i = 1; i <= this.totalPages; i++) {
            if (
                i === 1 ||
                i === this.totalPages ||
                (i >= this.currentPage - 1 && i <= this.currentPage + 1)
            ) {
                range.push(i);
            } else if (range[range.length - 1] !== '...') {
                range.push('...');
            }
        }
        return range;
    },
    prevPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
        }
    },
    nextPage() {
        if (this.currentPage < this.totalPages) {
            this.currentPage++;
        }
    },
    goToPage(page) {
        if (typeof page === 'number' && page >= 1 && page <= this.totalPages) {
            this.currentPage = page;
        }
    },
    getStatusClass(status) {
        const classes = {
            'Success': 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500',
            'pending': 'bg-yellow-50 text-yellow-600 dark:bg-yellow-500/15 dark:text-orange-400',
            'Failed': 'bg-red-50 text-red-600 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    },
    toggleDropdown(id) {
        this.dropdownOpen = this.dropdownOpen === id ? null : id;
    }
}">
      <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
        <!-- Header -->
        <div class="flex flex-col gap-2 px-5 mb-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
          <div class="flex">
            <div class="flex items-center justify-center px-2 py-2 bg-blue-600 rounded-lg text-white">
              <i class="fa-solid fa-file-pen " style="color: rgb(255, 255, 255); font-size: 1.5rem;"></i>
            </div>
            <div class="px-3">
              <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Pengaduan Terbaru</h3>
              <p class="py-2font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Daftar Semua Pengaduan Yang Terbaru</p>
            </div>
          </div>
          <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
            
          </div>
        </div>

        <!-- Table -->
        <div class="overflow-hidden">
          <div class="max-w-full px-5 overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="border-gray-200 border-y dark:border-gray-700">
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">No.</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Foto</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Judul Pengaduan</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Pelapor</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Lokasi</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Tanggal</th>
                  <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Status</th>
                  <!-- <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 capitalize">Category</th> -->
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($laporanPengaduan as $comp)
                <tr>
                  <td class="px-4 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $loop->iteration }}</div>
                  </td>
                  <td>
                    <img src="{{ asset($comp->photo) }}"
                      alt="Foto Pengaduan"
                      class="w-18 h-12 object-cover rounded-lg">
                  </td>
                  <td class="py-4 whitespace-nowrap">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $comp->title }}</div>
                      <p class="font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">{{ Str::limit($comp->description, 20) }}</p>
                    </div>
                  </td>

                  <td class="px-4 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                      {{ $comp->user->name }}
                    </div>
                    <p class="py-2font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">{{ $comp->user->email }}</p>
                    <div class="text-sm text-gray-500 dark:text-gray-400"></div>
                  </td>
                  <td class="px-4 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $comp->location }}</div>
                    <!-- <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.price"></div> -->
                  </td>
                  <td class="px-4 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-500 dark:text-gray-400"> {{ $comp->created_at->format('Y-m-d') }}</div>
                  </td>
                  @php
                  $statusClass = match($comp->status) {
                  'pending' => 'bg-yellow-50 text-yellow-600 dark:bg-yellow-500/15 dark:text-orange-400',
                  'diproses' => 'bg-blue-50 text-blue-600 dark:bg-blue-500/15 dark:text-blue-400',
                  'selesai' => 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500',
                  'ditolak' => 'bg-red-50 text-red-600 dark:bg-red-500/15 dark:text-red-500',
                  default => 'bg-gray-100 text-gray-600',
                  };
                  @endphp

                  <td class="px-4 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }}">
                      {{ $comp->status }}
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- Pagination -->
      </div>
    </div>
  </div>
</div>
@endsection