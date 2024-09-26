<x-app-layout>
    {{--
$Routsprefix = هو اسم البادئة من أجل التعامل مع الروتس
$headerText = هو النص الذي سيظهر فوق الجدول
$createBtnText= النص الذي سيظهر في زر الإضافة
 --}}
    @props(['Routsprefix', 'headerText', 'createBtnText'])

    <div class="p-6 bg-white dark:bg-gray-800 overflow-x-scroll shadow-sm sm:rounded-lg">
        <h1 class="text-2xl font-bold mb-4">{{ $headerText }}</h1>
        <a href="{{ route($Routsprefix . '.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">{{ $createBtnText }}</a>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    {{ $headRows ?? null }}
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{ $bodyRows }}
                </tr>
            </tbody>
        </table>
    </div>

</x-app-layout>
