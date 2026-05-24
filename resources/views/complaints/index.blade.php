@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>
<x-common.page-breadcrumb pageTitle="Pengaduan" />
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
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Tabel Pengaduan</h3>
                    <p class="py-2font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Daftar semua pengaduan yang masuk</p>
                </div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <form>
                    <div class="relative">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            @php
                            $role = Auth::user()->role;
                            if ($role == 'masyarakat') {
                            @endphp
                            <a href="{{ route('pengaduan.create') }}" class="bg-blue-600 text-white ps-2 pe-3 py-2 rounded"><i class="fa-regular fa-square-plus" style="color: rgb(255, 255, 255);"></i>&nbsp;Tambah Pengaduan</a>
                            @php } @endphp
                        </div>

                    </div>
                </form>
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

                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                <div class="flex justify-center relative">
                                    @php
                                    $role = Auth::user()->role;
                                    if ($role == 'masyarakat') {
                                    @endphp
                                    <form id="delete-form-{{ $comp->id }}"
                                        action="{{ route('complaint.destroy', $comp->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="bg-red-600 px-2 py-2 rounded-lg" onclick="confirmDelete({{ $comp->id }})"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    </form>
                                    <a href="{{ route('complaint.show', $comp->id) }}"
                                        class="text-blue-600 rounded-lg px-3 py-2 mx-2 bg-blue-500 inline-flex items-center">
                                        <i class="fa-solid fa-edit" style="color: #ffffff;"></i>
                                    </a>
                                    @php } else { @endphp
                                    <form id="delete-form-{{ $comp->id }}"
                                        action="{{ route('complaint.destroy', $comp->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="bg-red-600 px-2 py-2 rounded-lg" onclick="confirmDelete({{ $comp->id }})"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                    </form> 
                                    <a href="{{ route('responses.show', $comp->id) }}" class="bg-blue-600 px-2 py-2 mx-2 rounded-lg"><i class="fa-solid fa-comment" style="color: #ffffff;"></i></a>
                                    <!-- <a href="{{ route('complaint.show', $comp->id) }}"
                                        class="text-blue-600 rounded-lg px-3 py-2 bg-blue-500 inline-flex items-center">
                                        <i class="fa-solid fa-eye" style="color: #ffffff;"></i>  
                                    </a> -->
                                    @php } @endphp

                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-white/[0.05]">
            <div class="flex items-center justify-between">
                <button @click="prevPage" :disabled="currentPage === 1" :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z" fill="currentColor" />
                    </svg>
                    <span class="hidden sm:inline">Previous</span>
                </button>

                <span class="block text-sm font-medium text-gray-700 dark:text-gray-400 sm:hidden">
                    Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                </span>

                <ul class="hidden items-center gap-0.5 sm:flex">
                    <template x-for="page in displayedPages" :key="page">
                        <li>
                            <button x-show="page !== '...'" @click="goToPage(page)" :class="currentPage === page ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-blue-500/[0.08] hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500'" class="flex h-10 w-10 items-center justify-center rounded-lg text-theme-sm font-medium" x-text="page"></button>
                            <span x-show="page === '...'" class="flex h-10 w-10 items-center justify-center text-gray-500">...</span>
                        </li>
                    </template>
                </ul>

                <button @click="nextPage" :disabled="currentPage === totalPages" :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <span class="hidden sm:inline">Next</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z" fill="currentColor" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form dengan id sesuai data
                document.getElementById('delete-form-' +

                    id).submit();
            }
        });
    }
</script>

@endsection