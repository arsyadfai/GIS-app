@extends('layouts.frontend')
<html>

<head>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 shadow-lg h-screen w-full md:w-64">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <span class="text-white text-lg font-semibold">AdminLTE 3</span>
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
                        <a class="flex items-center text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white" href="#">
                            <i class="fas fa-th mr-3"></i>
                            <span>Widgets</span>
                        </a>
                    </li>
                    <!-- Other Sidebar Items... -->
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">Input Data Wilayah</h2>

                <form action="/dashboard/input/wilayah" method="post" class="space-y-4">
                    @csrf
                    <div>
                        <label for="wilayah" class="block text-gray-600 mb-2">Wilayah</label>
                        <input type="text" name="wilayah" id="wilayah" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label for="data" class="block text-gray-600 mb-2">Data</label>
                        <textarea name="data" id="data" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
