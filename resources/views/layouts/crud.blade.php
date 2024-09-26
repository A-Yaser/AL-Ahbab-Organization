<!-- resources/views/layouts/app.blade.php -->
<x-app-layout>



    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $title ?? null }}
        </h2>
    </x-slot> --}}
    <x-slot name="header">
        <x-crud-header text="رجوع" title="{{ $title }}" backUrl="{{ $backUrl }}">
        </x-crud-header>
    </x-slot>

    <div class=" flex justify-center  p-4 mb-4 rounded bg-gray-50 dark:bg-gray-800 shadow">
        {{ $slot }}
    </div>

    @stack('scripts')

</x-app-layout>
