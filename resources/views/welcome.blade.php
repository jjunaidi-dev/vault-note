<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VaultNote - Personal Hub</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(160deg, #F4F5FF 0%, #FFFFFF 45%, #F2F0FF 100%);
            color: #1E1B4B;
        }

        [x-cloak] {
            display: none !important;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 30px -10px rgba(79, 70, 229, 0.08);
        }

        .gradient-banner {
            background: linear-gradient(135deg, #5B6CF9 0%, #7C5CFA 55%, #9353F6 100%);
            box-shadow: 0 14px 28px -8px rgba(109, 93, 252, 0.38);
        }

        .gradient-btn {
            background: linear-gradient(135deg, #4F6BFF 0%, #834BFF 100%);
        }
    </style>
</head>

<body class="min-h-screen antialiased pb-28 md:pb-8"
    x-data="{ activeTab: 'dashboard', openAddModal: false, modalType: 'todo' }">

    <!-- FULL WIDTH CONTAINER -->
    <div class="w-full flex flex-col md:flex-row min-h-screen">

        <!-- SIDEBAR DESKTOP (Flush ke kiri layar) -->
        <aside class="hidden md:flex md:w-64 lg:w-72 md:flex-col md:fixed md:inset-y-0 p-4 z-30">
            <div class="glass-card rounded-3xl h-full p-5 flex flex-col justify-between">
                <div>
                    <!-- Brand -->
                    <div class="flex items-center gap-3 px-2 mb-8">
                        <img src="{{ asset('logo.png') }}" alt="Logo"
                            class="w-10 h-10 rounded-2xl object-cover shadow-md shadow-indigo-200">
                        <div>
                            <h1 class="font-bold text-lg text-slate-900 tracking-tight">VaultNote</h1>
                            <p class="text-[11px] font-medium text-indigo-500">Personal Hub</p>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="space-y-1.5">
                        <button @click="activeTab = 'dashboard'"
                            :class="activeTab === 'dashboard' ? 'gradient-btn text-white shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/70'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span>Dashboard</span>
                        </button>
                        <button @click="activeTab = 'accounts'"
                            :class="activeTab === 'accounts' ? 'gradient-btn text-white shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/70'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                            </svg>
                            <span>Info Akun</span>
                        </button>
                        <button @click="activeTab = 'glossaries'"
                            :class="activeTab === 'glossaries' ? 'gradient-btn text-white shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/70'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span>Istilah Baru</span>
                        </button>
                        <button @click="activeTab = 'schedules'"
                            :class="activeTab === 'schedules' ? 'gradient-btn text-white shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/70'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Jadwal</span>
                        </button>
                        <button @click="activeTab = 'todos'"
                            :class="activeTab === 'todos' ? 'gradient-btn text-white shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/70'"
                            class="w-full flex items-center gap-3 px-4 py-3 rounded-2xl text-sm font-semibold transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            <span>To-Do List</span>
                        </button>
                    </nav>
                </div>

                <!-- Quick Add Desktop -->
                <button @click="openAddModal = true; modalType = 'todo'"
                    class="w-full py-3.5 rounded-2xl gradient-btn text-white font-semibold text-sm shadow-lg shadow-indigo-200 hover:opacity-95 transition flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Catatan Baru
                </button>
            </div>
        </aside>

        <!-- MAIN WORKSPACE (Full Screen Fluid Width) -->
        <main class="flex-1 md:pl-64 lg:pl-72 w-full">
            <div class="w-full px-4 sm:px-6 lg:px-10 pt-5 sm:pt-7">

                <!-- TOP HEADER -->
                <header class="flex items-center justify-between mb-6 pb-4 border-b border-indigo-100/60">
                    <div>
                        <p class="text-xs font-medium text-slate-400">Selamat Pagi,</p>
                        <h2
                            class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                            Hello, Junaidi <span class="text-xl">👋</span>
                        </h2>
                        <p class="text-xs text-slate-500 mt-0.5">Kelola akun, istilah, jadwal & tugasmu hari ini.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden sm:block text-right">
                            <p class="text-xs font-bold text-slate-800">Junaidi</p>
                            <p class="text-[11px] text-indigo-500 font-medium">Personal Workspace</p>
                        </div>
                        <div
                            class="w-11 h-11 rounded-full p-0.5 bg-gradient-to-tr from-blue-500 to-purple-500 shadow-sm">
                            <div
                                class="w-full h-full rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-700 text-sm">
                                JN
                            </div>
                        </div>
                    </div>
                </header>

                <!-- ========================================== -->
                <!-- PAGE 1: DASHBOARD                          -->
                <!-- ========================================== -->
                <section x-show="activeTab === 'dashboard'" x-transition.opacity>

                    <!-- TOP ROW: STAT CARDS + BANNER -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 mb-6">
                        <!-- 3 MINI STAT CARDS (5 Kolom di layar besar) -->
                        <div class="lg:col-span-5 grid grid-cols-3 gap-3 sm:gap-4">
                            <div @click="activeTab = 'accounts'"
                                class="glass-card rounded-2xl p-4 cursor-pointer hover:scale-[1.02] transition flex flex-col justify-between">
                                <div
                                    class="w-9 h-9 rounded-xl bg-blue-100/80 text-blue-600 flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-extrabold text-slate-900">3</p>
                                    <p class="text-[11px] font-medium text-slate-400">Akun Tersimpan</p>
                                </div>
                            </div>

                            <div @click="activeTab = 'glossaries'"
                                class="glass-card rounded-2xl p-4 cursor-pointer hover:scale-[1.02] transition flex flex-col justify-between">
                                <div
                                    class="w-9 h-9 rounded-xl bg-purple-100/80 text-purple-600 flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-extrabold text-slate-900">2</p>
                                    <p class="text-[11px] font-medium text-slate-400">Istilah Baru</p>
                                </div>
                            </div>

                            <div @click="activeTab = 'schedules'"
                                class="glass-card rounded-2xl p-4 cursor-pointer hover:scale-[1.02] transition flex flex-col justify-between">
                                <div
                                    class="w-9 h-9 rounded-xl bg-indigo-100/80 text-indigo-600 flex items-center justify-center mb-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-2xl font-extrabold text-slate-900">2</p>
                                    <p class="text-[11px] font-medium text-slate-400">Agenda Aktif</p>
                                </div>
                            </div>
                        </div>

                        <!-- HIGHLIGHT GRADIENT BANNER (7 Kolom di layar besar) -->
                        <div
                            class="lg:col-span-7 gradient-banner rounded-3xl p-5 sm:p-6 text-white relative overflow-hidden flex flex-col justify-between">
                            <div class="flex items-center justify-between">
                                <div>
                                    <span
                                        class="inline-flex items-center gap-1.5 text-[11px] font-semibold bg-white/20 px-2.5 py-1 rounded-full mb-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span> Produktivitas Harian
                                    </span>
                                    <h3 class="text-xl sm:text-2xl font-extrabold tracking-tight">Keep Going!</h3>
                                    <p class="text-xs text-indigo-100 mt-0.5">33% tugas harian telah diselesaikan</p>
                                </div>
                                <button @click="activeTab = 'todos'"
                                    class="w-10 h-10 rounded-full bg-white text-indigo-600 flex items-center justify-center shadow-md hover:scale-105 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mt-4 flex items-center gap-3">
                                <div class="flex-1 h-2 bg-white/25 rounded-full overflow-hidden">
                                    <div class="h-full bg-white rounded-full transition-all duration-500"
                                        style="width: 33%"></div>
                                </div>
                                <span class="text-xs font-bold">33%</span>
                            </div>
                        </div>
                    </div>

                    <!-- BOTTOM ROW: MY TASKS & JADWAL TERDEKAT SIDE-BY-SIDE ON DESKTOP -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                        <!-- MY TASKS PREVIEW (7 Kolom) -->
                        <div class="lg:col-span-7">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-bold text-base text-slate-900">My Tasks</h3>
                                <button @click="activeTab = 'todos'"
                                    class="text-xs font-semibold text-indigo-600 hover:underline">See All
                                    &rsaquo;</button>
                            </div>

                            <div class="space-y-2.5">
                                <div class="glass-card rounded-2xl p-4 flex items-center justify-between">
                                    <div class="flex items-center gap-3.5">
                                        <div
                                            class="gradient-btn border-transparent text-white w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="3"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="line-through text-slate-400 text-sm font-bold">Selesaikan
                                                integrasi backend Laravel</p>
                                            <p class="text-[11px] text-slate-400">Hari ini, 20:00</p>
                                        </div>
                                    </div>
                                    <span
                                        class="bg-rose-50 text-rose-600 text-[10px] font-bold px-2.5 py-1 rounded-full">High</span>
                                </div>

                                <div class="glass-card rounded-2xl p-4 flex items-center justify-between">
                                    <div class="flex items-center gap-3.5">
                                        <div
                                            class="border-slate-300 bg-white w-6 h-6 rounded-full border-2 flex items-center justify-center shrink-0">
                                        </div>
                                        <div>
                                            <p class="text-slate-800 text-sm font-bold">Review catatan istilah perbankan
                                            </p>
                                            <p class="text-[11px] text-slate-400">Hari ini, 21:00</p>
                                        </div>
                                    </div>
                                    <span
                                        class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-2.5 py-1 rounded-full">Medium</span>
                                </div>
                            </div>
                        </div>

                        <!-- JADWAL TERDEKAT PREVIEW (5 Kolom) -->
                        <div class="lg:col-span-5">
                            <div class="flex items-center justify-between mb-3">
                                <h3 class="font-bold text-base text-slate-900">Jadwal Terdekat</h3>
                                <button @click="activeTab = 'schedules'"
                                    class="text-xs font-semibold text-indigo-600 hover:underline">See All
                                    &rsaquo;</button>
                            </div>
                            <div class="space-y-2.5">
                                <div class="glass-card rounded-2xl p-4 flex items-center gap-3.5">
                                    <div
                                        class="w-12 h-12 rounded-2xl gradient-btn text-white flex flex-col items-center justify-center shrink-0">
                                        <span class="text-[10px] font-semibold uppercase">NOV</span>
                                        <span class="text-base font-extrabold leading-none">14</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Evaluasi Materi Training</p>
                                        <p class="text-xs text-slate-400 mt-0.5">08:30 WIB • Aula Utama Lt. 2</p>
                                    </div>
                                </div>
                                <div class="glass-card rounded-2xl p-4 flex items-center gap-3.5">
                                    <div
                                        class="w-12 h-12 rounded-2xl gradient-btn text-white flex flex-col items-center justify-center shrink-0">
                                        <span class="text-[10px] font-semibold uppercase">NOV</span>
                                        <span class="text-base font-extrabold leading-none">16</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">Presentasi Studi Kasus Kredit</p>
                                        <p class="text-xs text-slate-400 mt-0.5">13:00 WIB • Ruang Kelas B</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- PAGE 2: INFORMASI AKUN                     -->
                <!-- ========================================== -->
                <section x-show="activeTab === 'accounts'" x-transition.opacity x-cloak>
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900">Brankas Akun</h3>
                            <p class="text-xs text-slate-500">Klik tombol salin untuk menyalin password dengan cepat.
                            </p>
                        </div>
                        <button @click="modalType = 'account'; openAddModal = true"
                            class="px-4 py-2.5 rounded-xl gradient-btn text-white text-xs font-bold shadow-md shadow-indigo-200">
                            + Akun
                        </button>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse ($akuns as $akun)
                            <div x-data="{ show: false, copied: false }" class="glass-card rounded-2xl p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-2.5">
                                        {{-- Ambil huruf pertama dari nama platform sebagai inisial icon --}}
                                        <div
                                            class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 font-bold flex items-center justify-center text-sm uppercase">
                                            {{ substr($akun->nama_platform ?? 'A', 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-sm text-slate-900">
                                                {{ $akun->nama_platform ?? 'Akun' }}
                                            </h4>
                                            <span class="text-[10px] font-semibold text-indigo-500">Personal Vault</span>
                                        </div>
                                    </div>

                                    {{-- Tombol Hapus (Opsional, biar gampang bersihin data) --}}
                                    <form action="{{ route('akun.destroy', $akun->id) }}" method="POST"
                                        onsubmit="return confirm('Hapus akun ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-xs text-slate-400 hover:text-rose-500 transition">Hapus</button>
                                    </form>
                                </div>

                                <div class="space-y-2 text-xs">
                                    {{-- Tampilkan Username atau Email --}}
                                    <div class="bg-slate-50/90 px-3 py-2 rounded-xl flex justify-between items-center">
                                        <span class="text-slate-400">User</span>
                                        <span class="font-semibold text-slate-700">{{ $akun->username ?? '-' }}</span>
                                    </div>

                                    {{-- Tampilkan Username atau Email --}}
                                    <div class="bg-slate-50/90 px-3 py-2 rounded-xl flex justify-between items-center">
                                        <span class="text-slate-400">email</span>
                                        <span class="font-semibold text-slate-700">{{ $akun->email ?? '-' }}</span>
                                    </div>

                                    {{-- Tampilkan Password dengan Show/Hide & Copy --}}
                                    <div class="bg-slate-50/90 px-3 py-2 rounded-xl flex justify-between items-center">
                                        <span class="text-slate-400">Pass</span>
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono font-semibold text-slate-800"
                                                x-text="show ? @js($akun->password) : '••••••••'"></span>
                                            <button type="button" @click="show = !show" class="text-indigo-600 font-bold"
                                                x-text="show ? 'Hide' : 'Show'"></button>
                                            <button type="button"
                                                @click="navigator.clipboard.writeText(@js($akun->password)); copied = true; setTimeout(() => copied = false, 1500)"
                                                class="text-slate-400 hover:text-indigo-600 font-bold"
                                                x-text="copied ? '✓' : 'Copy'"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8 text-sm text-slate-400">
                                Belum ada data akun tersimpan. Klik tombol tambah untuk menyimpan akun pertamamu.
                            </div>
                        @endforelse

                    </div>
                </section>

                <!-- ========================================== -->
                <!-- PAGE 3: DAFTAR ISTILAH BARU                -->
                <!-- ========================================== -->
                <section x-show="activeTab === 'glossaries'" x-transition.opacity x-cloak>
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900">Kamus Istilah Baru</h3>
                            <p class="text-xs text-slate-500">Kumpulan kosakata dan terminologi penting.</p>
                        </div>
                        <button @click="modalType = 'glossary'; openAddModal = true"
                            class="px-4 py-2.5 rounded-xl gradient-btn text-white text-xs font-bold shadow-md shadow-indigo-200">
                            + Istilah
                        </button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        @forelse ($istilahs as $item)
                            <div class="glass-card rounded-2xl p-5 flex items-start justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h4 class="font-bold text-sm text-slate-900">{{ $item->nama_istilah }}</h4>
                                        <span
                                            class="text-[10px] font-bold px-2.5 py-0.5 rounded-full bg-purple-100/80 text-purple-600">
                                            {{ $item->kategori ?? 'Umum' }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                                        {{ $item->arti }}
                                    </p>
                                </div>
                                <form action="{{ route('istilah.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus akun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-xs text-slate-400 hover:text-rose-500 transition">Hapus</button>
                                </form>
                            </div>
                        @empty
                            <div class="col-span-full glass-card rounded-2xl p-5 text-center text-xs text-slate-500">
                                Belum ada data istilah yang tersimpan, bro.
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- PAGE 4: JADWAL KEGIATAN                    -->
                <!-- ========================================== -->
                <section x-show="activeTab === 'schedules'" x-transition.opacity x-cloak>
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900">Jadwal & Agenda</h3>
                            <p class="text-xs text-slate-500">Daftar kegiatan terjadwal mendatang.</p>
                        </div>
                        <button @click="modalType = 'schedule'; openAddModal = true"
                            class="px-4 py-2.5 rounded-xl gradient-btn text-white text-xs font-bold shadow-md shadow-indigo-200">
                            + Jadwal
                        </button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        @forelse ($jadwal as $item)
                            @php
                                $tgl = \Carbon\Carbon::parse($item->tanggal)->locale('id');
                            @endphp
                            <div class="glass-card rounded-2xl p-5 flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="w-12 h-12 rounded-2xl gradient-btn text-white flex flex-col items-center justify-center shrink-0">
                                        <span
                                            class="text-[10px] font-semibold uppercase">{{ $tgl->translatedFormat('M') }}</span>
                                        <span class="text-base font-extrabold leading-none">{{ $tgl->format('d') }}</span>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-sm text-slate-900">{{ $item->judul_kegiatan }}</h4>
                                        <p class="text-xs text-indigo-600 font-medium mt-0.5">
                                            {{ $item->waktu }} • {{ $item->location }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full glass-card rounded-2xl p-6 text-center text-sm text-slate-500">
                                Belum ada jadwal kegiatan.
                            </div>
                        @endforelse
                    </div>
                </section>

                <!-- ========================================== -->
                <!-- PAGE 5: TO-DO LIST                         -->
                <!-- ========================================== -->
                <section x-show="activeTab === 'todos'" x-transition.opacity x-cloak>
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-900">To-Do List</h3>
                            <p class="text-xs text-slate-500">Ketuk tugas untuk menandai selesai.</p>
                        </div>
                        <button @click="modalType = 'todo'; openAddModal = true"
                            class="px-4 py-2.5 rounded-xl gradient-btn text-white text-xs font-bold shadow-md shadow-indigo-200">
                            + Tugas
                        </button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-3.5">
                        <div class="glass-card rounded-2xl p-4 flex items-center justify-between"
                            x-data="{ done: true }" @click="done = !done" style="cursor: pointer;">
                            <div class="flex items-center gap-3.5 flex-1">
                                <div :class="done ? 'gradient-btn border-transparent text-white' : 'border-slate-300 bg-white'"
                                    class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition shrink-0">
                                    <svg x-show="done" class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p :class="done ? 'line-through text-slate-400' : 'text-slate-800'"
                                        class="text-sm font-bold">Selesaikan integrasi backend Laravel</p>
                                    <p class="text-[11px] text-slate-400">Hari ini, 20:00</p>
                                </div>
                            </div>
                            <span
                                class="bg-rose-50 text-rose-600 text-[10px] font-bold px-2.5 py-1 rounded-full">High</span>
                        </div>

                        <div class="glass-card rounded-2xl p-4 flex items-center justify-between"
                            x-data="{ done: false }" @click="done = !done" style="cursor: pointer;">
                            <div class="flex items-center gap-3.5 flex-1">
                                <div :class="done ? 'gradient-btn border-transparent text-white' : 'border-slate-300 bg-white'"
                                    class="w-6 h-6 rounded-full border-2 flex items-center justify-center transition shrink-0">
                                    <svg x-show="done" class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        stroke-width="3" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <p :class="done ? 'line-through text-slate-400' : 'text-slate-800'"
                                        class="text-sm font-bold">Review catatan istilah perbankan</p>
                                    <p class="text-[11px] text-slate-400">Hari ini, 21:00</p>
                                </div>
                            </div>
                            <span
                                class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-2.5 py-1 rounded-full">Medium</span>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <!-- MOBILE BOTTOM NAVIGATION BAR -->
    <nav class="md:hidden fixed bottom-0 inset-x-0 z-40 px-4 pb-3 pt-1">
        <div class="glass-card rounded-3xl px-2 py-2 flex items-center justify-around shadow-xl shadow-indigo-950/10">
            <button @click="activeTab = 'dashboard'"
                :class="activeTab === 'dashboard' ? 'text-indigo-600' : 'text-slate-400'"
                class="flex flex-col items-center p-1.5 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="text-[10px] font-bold mt-0.5">Home</span>
            </button>
            <button @click="activeTab = 'accounts'"
                :class="activeTab === 'accounts' ? 'text-indigo-600' : 'text-slate-400'"
                class="flex flex-col items-center p-1.5 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                <span class="text-[10px] font-bold mt-0.5">Akun</span>
            </button>
            <button @click="openAddModal = true; modalType = 'todo'"
                class="-mt-8 w-14 h-14 rounded-full gradient-btn text-white flex items-center justify-center shadow-lg shadow-indigo-400/50 border-4 border-white active:scale-95 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <button @click="activeTab = 'glossaries'"
                :class="activeTab === 'glossaries' ? 'text-indigo-600' : 'text-slate-400'"
                class="flex flex-col items-center p-1.5 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="text-[10px] font-bold mt-0.5">Istilah</span>
            </button>
            <button @click="activeTab = 'schedules'"
                :class="activeTab === 'schedules' ? 'text-indigo-600' : 'text-slate-400'"
                class="flex flex-col items-center p-1.5 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span class="text-[10px] font-bold mt-0.5">Jadwal</span>
            </button>
        </div>
    </nav>

    <!-- UNIVERSAL QUICK ADD MODAL -->
    <div x-show="openAddModal" x-cloak
        class="fixed inset-0 z-50 flex items-end sm:items-center justify-center bg-slate-900/40 backdrop-blur-xs p-4">
        <div @click.away="openAddModal = false" class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-extrabold text-lg text-slate-900">Tambah Catatan Baru</h3>
                <button @click="openAddModal = false"
                    class="text-slate-400 hover:text-slate-600 text-lg">&times;</button>
            </div>

            <!-- Selector Tipe Catatan -->
            <div class="grid grid-cols-4 gap-1.5 bg-slate-100 p-1 rounded-2xl mb-4 text-xs font-bold">
                <button @click="modalType = 'todo'"
                    :class="modalType === 'todo' ? 'bg-white text-indigo-600 shadow-xs' : 'text-slate-500'"
                    class="py-2 rounded-xl">To-Do</button>
                <button @click="modalType = 'account'"
                    :class="modalType === 'account' ? 'bg-white text-indigo-600 shadow-xs' : 'text-slate-500'"
                    class="py-2 rounded-xl">Akun</button>
                <button @click="modalType = 'glossary'"
                    :class="modalType === 'glossary' ? 'bg-white text-indigo-600 shadow-xs' : 'text-slate-500'"
                    class="py-2 rounded-xl">Istilah</button>
                <button @click="modalType = 'schedule'"
                    :class="modalType === 'schedule' ? 'bg-white text-indigo-600 shadow-xs' : 'text-slate-500'"
                    class="py-2 rounded-xl">Jadwal</button>
            </div>

            <!-- Form To-Do -->
            <form x-show="modalType === 'todo'" @submit.prevent="openAddModal = false" class="space-y-3">
                <input type="text" required placeholder="Nama tugas..."
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm">
                <div class="grid grid-cols-2 gap-2">
                    <select class="border border-slate-200 rounded-xl px-3 py-2.5 text-sm bg-white">
                        <option value="High">High Priority</option>
                        <option value="Medium">Medium Priority</option>
                    </select>
                    <input type="text" placeholder="Hari ini, 19:00"
                        class="border border-slate-200 rounded-xl px-3 py-2.5 text-sm">
                </div>
                <button type="submit" class="w-full py-3 rounded-xl gradient-btn text-white font-bold text-sm">Simpan
                    Tugas</button>
            </form>

            <!-- Form Akun -->
            <form x-show="modalType === 'account'" action="{{ route('akun.store') }}" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="nama_platform" required placeholder="Platform (misal: GitHub, BRI)"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm">

                <input type="text" name="username" placeholder="Username (opsional)"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm">

                <input type="email" name="email" placeholder="Email (opsional)"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm">

                <input type="password" name="password" required placeholder="Password / PIN"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm">

                <button type="submit" class="w-full py-3 rounded-xl gradient-btn text-white font-bold text-sm">
                    Simpan Akun
                </button>
            </form>

            <!-- Form Istilah -->
            <form action={{ route('istilah.store') }} method="POST" x-show="modalType === 'glossary'" class="space-y-3">
                @csrf
                <input type="text" required placeholder="Istilah baru (misal: NPL)"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm" name="nama_istilah">
                <input type="text" required placeholder="Kategori (misal: Perbankan)"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm" name="kategori">
                <textarea required rows="2" placeholder="Arti / penjelasan singkat..."
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm" name="arti"></textarea>
                <button type="submit" class="w-full py-3 rounded-xl gradient-btn text-white font-bold text-sm">Simpan
                    Istilah</button>
            </form>

            <!-- Form Jadwal -->
            <form x-show="modalType === 'schedule'" action="{{ route('jadwal.store') }}" method="POST"
                class="space-y-3">
                @csrf
                <input type="text" required placeholder="Judul kegiatan..."
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm" name="judul_kegiatan">

                <div class="grid grid-cols-3 gap-2">
                    <input type="number" min="1" max="31" required placeholder="Tgl (18)"
                        class="border border-slate-200 rounded-xl px-3 py-2.5 text-sm" name="tanggal">
                    <input type="text" required placeholder="Bln (NOV)"
                        class="border border-slate-200 rounded-xl px-3 py-2.5 text-sm uppercase" name="bulan">
                    <input type="text" required placeholder="09:00"
                        class="border border-slate-200 rounded-xl px-3 py-2.5 text-sm" name="waktu">
                </div>

                <input type="text" required placeholder="Lokasi / Ruang Meeting"
                    class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm" name="location">

                <button type="submit" class="w-full py-3 rounded-xl gradient-btn text-white font-bold text-sm">
                    Simpan Jadwal
                </button>
            </form>
        </div>
    </div>

</body>

</html>