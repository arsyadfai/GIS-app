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
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-th mr-3"></i>
                            <span>Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-copy mr-3"></i>
                            <span>Layout Options</span>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white"
                            href="#">
                            <i class="fas fa-chart-pie mr-3"></i>
                            <span>Charts</span>
                        </a>
                    </li>
                    <!-- Additional Sidebar Items -->
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Input Data IKU</h2>
            <form action="/dashboard/input/iku" method="post" class="space-y-4">
                @csrf
                <div class="flex flex-col space-y-2">
                    <label for="wilayah" class="font-medium text-gray-700">Wilayah</label>
                    <select name="wilayah_id" class="p-2 border border-gray-300 rounded-lg">
                        @foreach ($wilayah as $w)
                            <option value="{{ $w->id }}">{{ $w->wilayah }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="ipm" class="block font-medium text-gray-700">IPM</label>
                        <input type="number" name="ipm" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="pertumbuhan_ekonomi" class="block font-medium text-gray-700">Pertumbuhan Ekonomi</label>
                        <input type="number" name="pertumbuhan_ekonomi" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="inflasi" class="block font-medium text-gray-700">Inflasi</label>
                        <input type="number" name="inflasi" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="indeks_gizi" class="block font-medium text-gray-700">Indeks Gizi</label>
                        <input type="number" name="indeks_gizi" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="pdrb" class="block font-medium text-gray-700">PDRB</label>
                        <input type="number" name="pdrb" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="tingkat_pengangguran_terbuka" class="block font-medium text-gray-700">Tingkat Pengangguran Terbuka</label>
                        <input type="number" name="tingkat_pengangguran_terbuka" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="nilai_tukar_petani" class="block font-medium text-gray-700">Nilai Tukar Petani</label>
                        <input type="number" name="nilai_tukar_petani" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="angka_kemiskinan" class="block font-medium text-gray-700">Angka Kemiskinan</label>
                        <input type="number" name="angka_kemiskinan" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="indeks_pembangunan_gender" class="block font-medium text-gray-700">Indeks Pembangunan Gender</label>
                        <input type="number" name="indeks_pembangunan_gender" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label for="tahun" class="block font-medium text-gray-700">Tahun</label>
                        <input type="number" name="tahun" class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="mt-4 bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
