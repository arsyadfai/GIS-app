@extends('layouts.frontend')
<html>

<head>
    <title>
        Dashboard
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 shadow-lg h-screen w-full md:w-64">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white text-lg font-semibold">
                    AdminLTE 3
                </span>
            </div>
            <div class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a class="flex items-center text-white p-2 rounded-md bg-gray-700" href="#">
                            <i class="fas fa-tachometer-alt mr-3">
                            </i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-th mr-3">
                            </i>
                            <span>
                                Widgets
                            </span>
                        </a>
                    </li>
                    <!-- Input Options with Sub-Menu -->
                    <li x-data="{ open: false }">
                        <li x-data="{ open: false }">
                            <a @click="open = !open" class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white cursor-pointer">
                                <i class="fas fa-copy mr-3"></i>
                                <span>Input Options</span>
                                <!-- Ikon panah yang akan berputar ketika dropdown dibuka -->
                                <i :class="{ 'rotate-180': open }" class="fas fa-chevron-down ml-auto transition-transform duration-300"></i>
                            </a>
                            <ul x-show="open" x-transition class="space-y-2 ml-6">
                                <li>
                                    <a href="dashboard/input/wilayah" class="text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white flex items-center">
                                        <i class="fas fa-map-marker-alt mr-2"></i> 
                                        Input Wilayah
                                    </a>
                                </li>
                                <li>
                                    <a href="dashboard/input/iku" class="text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white flex items-center">
                                        <i class="fas fa-tasks mr-2"></i> 
                                        Input IKU
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <script src="//unpkg.com/alpinejs" defer></script>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-chart-pie mr-3">
                            </i>
                            <span>
                                Charts
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-tree mr-3">
                            </i>
                            <span>
                                UI Elements
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-edit mr-3">
                            </i>
                            <span>
                                Forms
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-table mr-3">
                            </i>
                            <span>
                                Tables
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">
                    Dashboard
                </h1>
                <div class="flex items-center space-x-4">
                    <button class="text-gray-600">
                        <i class="fas fa-bell">
                        </i>
                    </button>
                    <button class="text-gray-600">
                        <i class="fas fa-user">
                        </i>
                    </button>
                </div>
            </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <!-- Card for IPM -->
    <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->ipm ?? 'N/A' }}</h2>
                <p>IPM</p>
            </div>
            <i class="fas fa-chart-bar text-4xl"></i>
        </div>
    </div>

    <!-- Card for Pertumbuhan Ekonomi -->
    <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->pertumbuhan_ekonomi ?? 'N/A' }}%</h2>
                <p>Pertumbuhan Ekonomi</p>
            </div>
            <i class="fas fa-chart-line text-4xl"></i>
        </div>
    </div>

    <!-- Card for Inflasi -->
    <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->inflasi ?? 'N/A' }}%</h2>
                <p>Inflasi</p>
            </div>
            <i class="fas fa-balance-scale text-4xl"></i>
        </div>
    </div>

    <!-- Card for Indeks Gizi -->
    <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->indeks_gizi ?? 'N/A' }}</h2>
                <p>Indeks Gizi</p>
            </div>
            <i class="fas fa-apple-alt text-4xl"></i>
        </div>
    </div>

    <!-- Card for PDRB -->
    <div class="bg-indigo-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->pdrb ?? 'N/A' }}</h2>
                <p>PDRB</p>
            </div>
            <i class="fas fa-wallet text-4xl"></i>
        </div>
    </div>

    <!-- Card for Tingkat Pengangguran Terbuka -->
    <div class="bg-purple-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->tingkat_pengangguran_terbuka ?? 'N/A' }}%</h2>
                <p>Tingkat Pengangguran Terbuka</p>
            </div>
            <i class="fas fa-users text-4xl"></i>
        </div>
    </div>

    <!-- Card for Nilai Tukar Petani -->
    <div class="bg-teal-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->nilai_tukar_petani ?? 'N/A' }}</h2>
                <p>Nilai Tukar Petani</p>
            </div>
            <i class="fas fa-leaf text-4xl"></i>
        </div>
    </div>

    <!-- Card for Angka Kemiskinan -->
    <div class="bg-orange-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->angka_kemiskinan ?? 'N/A' }}%</h2>
                <p>Angka Kemiskinan</p>
            </div>
            <i class="fas fa-poverty text-4xl"></i>
        </div>
    </div>

    <!-- Card for Indeks Pembangunan Gender -->
    <div class="bg-pink-500 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->indeks_pembangunan_gender ?? 'N/A' }}</h2>
                <p>Indeks Pembangunan Gender</p>
            </div>
            <i class="fas fa-venus-mars text-4xl"></i>
        </div>
    </div>

    <!-- Card for Tahun -->
    <div class="bg-gray-700 text-white p-4 rounded-lg shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-semibold">{{ $data_iku->tahun ?? 'N/A' }}</h2>
                <p>Tahun</p>
            </div>
            <i class="fas fa-calendar-alt text-4xl"></i>
        </div>
    </div>
</div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">
                        Sales
                    </h2>
                    <div class="h-48 bg-gray-200 rounded-lg">
                        <!-- Placeholder for sales chart -->
                        <img alt="Sales chart placeholder" class="w-full h-full object-cover rounded-lg" height="200"
                            src="https://storage.googleapis.com/a1aa/image/O0biAka96fzpMK2vtMfKhAOo3E4NP8ZC0ebADY2NtbJf8lLOB.jpg"
                            width="400" />
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">
                        Visitors
                    </h2>
                    <div class="h-48 bg-gray-200 rounded-lg">
                        <!-- Placeholder for visitors map -->
                        <img alt="Visitors map placeholder" class="w-full h-full object-cover rounded-lg" height="200"
                            src="https://storage.googleapis.com/a1aa/image/kVV5cxJ3StrzP1tHREQJA14avbzrf2n5fCqytxC6jbzQfyFnA.jpg"
                            width="400" />
                    </div>
                </div>
            </div>
           
        </div>
    </div>
     
</body>

</html>