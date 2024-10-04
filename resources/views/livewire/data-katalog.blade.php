<div>
    @foreach ($sensor as $sensors)
    <div class="flex-auto rounded md:w-56 h-fit border p-4 bg-white dark:border-slate-500 dark:bg-gray-800 hover:shadow-md hover:shadow-cyan-500/50 tall:w-44 blur-none transition-all hover:cursor-pointer">
        <img src="{{ URL::asset('/img/ryo.jpeg') }}" alt="" class="object-cover rounded">
        <div class="pt-2">
            <!-- <div class="col-span-1">
                <h1 class="text-sm">Nama sensors :</h1>
                <p class="text-sm">Satelit</p>
            </div> -->
            <div class="">
                <h1 class="text-based">{{ $sensors['nama_sensor'] }}</h1>
                <p class="font-bold text-lg">{{ $sensors['jumlah_satelit'] }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>