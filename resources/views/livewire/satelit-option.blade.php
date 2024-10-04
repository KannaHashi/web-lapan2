<div class="">
    <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assigned to</label>
    <div class="relative mt-2">
        <span class="absolute top-2 left-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672ZM12 2.25V4.5m5.834.166-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243-1.59-1.59" />
            </svg>
        </span>
        <select name="name" id="name" class="border-gray-300 pl-11 focus:border-sky-500/50 bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 hover:cursor-pointer" wire:model="selectedData">
            <option value="" class="flex flex-nowrap relative">
                Select an option
            </option>
            @foreach ($datas as $data)
            <option value="{{ $data->id }}">{{ $data->satelit }}</option>
            @endforeach
        </select>
    </div>
</div>