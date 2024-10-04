<?php
$theme = 'light'; // default theme
?>

<!DOCTYPE html>
<html lang="en" class="{{ $theme }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <script>
        $(document).ready(function() {
            // Saat tombol dengan class .theme-btn diklik
            $('.theme-btn').click(function() {
                // Toggle theme class antara 'dark' dan 'light' pada elemen <html>
                if ($('html').hasClass('dark')) {
                    $('html').removeClass('dark').addClass('light');
                    // Ganti ikon tombol ke ikon tema terang (sun)
                    $('.theme-btn svg').replaceWith(`
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:size-6 tall:size-auto">
                            <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                        </svg>
                    `);
                } else {
                    $('html').removeClass('light').addClass('dark');
                    // Ganti ikon tombol ke ikon tema gelap (moon)
                    $('.theme-btn svg').replaceWith(`
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:size-6 tall:size-auto">
                            <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
                        </svg>
                    `);
                }
            });
        });
    </script>
</head>

<body class="bg-white dark:bg-gray-900 dark:text-white transition-all">
    <div class="z-10 flex fixed md:items-start md:p-5 tall:h-1/3 border-l dark:border-l-gray-600 bg-white dark:bg-slate-900 overflow-y-auto h-screen -right-[32rem]">
        <div class="grid grid-flow-row gap-3 w-full">
            <h1 class="text-based font-bold">Tanggal</h1>
            <div id="date-range-picker" date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                </div>
            </div>
        </div>
    </div>
    <div class="container w-full fixed">
        <div class="flex items-center z-0 justify-center px-10 py-3 fixed w-full bg-white border-b dark:border-b dark:border-b-gray-600 dark:bg-gray-900">
            <div class="flex md:basis-3/12 tall:basis-1/3">
                <a href="" class="flex tall:flex-col items-center md:gap-6 cursor-pointer">
                    <img src="{{ URL::asset('/img/brin.png') }}" class="h-10" alt="Logo BRIN">
                    <span class="grid columns-1">
                        <p class="col-span-1 md:text-xl tall:text-sm tall:text-center font-bold uppercase">Katalog</p>
                        <span class="col-span-1 md:text-sm tall:text-wrap tall:h-1 tall:overflow-hidden">Stasiun Bumi Penginderaan Jauh Parepare</span>
                    </span>
                </a>
            </div>
            <div class="basis-7/12">
                <div class="relative">
                    <!-- <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>
                    <input type="text" id="search" class="dark:bg-gray-800 rounded-lg w-1/2 pl-12" placeholder="Cari Data"> -->
                </div>
            </div>
            <div class="basis-2/12">
                <div class="flex justify-end items-center gap-3">
                    <button class="rounded-full theme-btn bg-gray-200 dark:bg-gray-700 transition-all p-2">
                        @if ($theme == 'light')
                        <!-- Ikon untuk tema terang (sun) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:size-6 tall:size-auto">
                            <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z" clip-rule="evenodd" />
                        </svg>
                        @else
                        <!-- Ikon untuk tema gelap (moon) -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="md:size-6 tall:size-auto">
                            <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
                        </svg>
                        @endif
                    </button>
                    <!-- Profil -->
                    <a href="#" class="flex tall:basis-full md:basis-1/2 justify-between items-center rounded-full md:p-2 dark:hover:bg-slate-300 dark:hover:text-slate-900 dark:bg-gray-700 transition-all">
                        <span class="text-sm hidden md:block text-center">Elgaxor</span>
                        <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="Avatar" class="h-8 w-8 rounded-full border pr-0">
                    </a>
                </div>
            </div>
        </div>
        <div class="-z-10 flex w-screen md:flex-row tall:flex-col relative tall:mt-[5.5rem] md:mt-[4.5rem] left-0">
            <div class="flex flex-row h-auto md:basis-1/4 tall:h-1/3 border-r dark:border-r-gray-600">
            </div>
            <div class="flex flex-col h-screen md:basis-3/4 tall:h-1/3 border-r dark:border-r-gray-600 p-7">
                <div class="overflow-y-auto h-screen">
                    <div class="p-3 mb-6 rounded bg-cyan-500/10 text-blue-700 dark:text-blue-200">
                        <h1 class="text-2xl font-bold mb-2">Hasil Pencarian Data</h1>
                        <div class="flex flex-row w-1/5">
                            <div class="flex flex-col basis-1/2">
                                <h1 class="text-based basis-1/2">Satelit : </h1>
                                <h1 class="text-based basis-1/2">Tanggal : </h1>
                            </div>
                            <div class="flex flex-col basis-1/2 justify-end text-end">
                                <h1 class="text-based basis-1/2">Aqua </h1>
                                <h1 class="text-based basis-1/2">2024-09-01</h1>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg border  p-4 hover:shadow-md hover:shadow-cyan-500/50 blur-none transition-all hover:cursor-pointer">
                            <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
                            <div class="pt-2">
                                <!-- <div class="col-span-1">
                                    <h1 class="text-sm">Nama Data :</h1>
                                    <p class="text-sm">Satelit</p>
                                </div> -->
                                <div class="">
                                    <h1 class="text-based">a1.24245.0737</h1>
                                    <p class="font-bold text-lg">Aqua</p>
                                    <div class="flex flex-row mt-3">
                                        <div class="flex basis-1/2 text-sm">2024-09-01</div>
                                        <div class="flex basis-1/2 text-sm justify-end">
                                            <p class="text-end">2024-09-01</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>