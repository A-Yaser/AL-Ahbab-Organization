<x-crud-layout title="عرض بيانات المختبر" backUrl="testers.index">

    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-end px-4 pt-4">
            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                type="button">
                <span class="sr-only">Open dropdown</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2" aria-labelledby="dropdownButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                            Data</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-start pr-5 pb-10">
            <img class="w-24 h-24 mb-10 rounded-full shadow-lg" src="{{ asset(Auth::user()->getAvatar()) }}"
                alt="Bonnie image" />
            <h2 class="mb-1 text-2xl font-bold text-gray-900 dark:text-white">
                {{ $tester->person->name }}</h2>

            <div class="mb-4">
                <strong>Email:</strong> {{ $tester->person->user->email }}
            </div>
            <div class="mb-4">
                <strong>Name:</strong> {{ $tester->person->name }}
            </div>
            <div class="mb-4">
                <strong>Username:</strong> {{ $tester->person->username }}
            </div>

            <div class="mb-4">
                <strong>Birth Day:</strong> {{ $tester->person->birth_day }}
            </div>
            <div class="mb-4">
                <strong>Phone:</strong> {{ $tester->person->phone }}
            </div>
            <div class="mb-4">
                <strong>Address:</strong> {{ $tester->person->address }}
            </div>
            <div class="mb-4">
                <strong>Gender:</strong> {{ $tester->person->sex }}
            </div>
            <div class="mb-4">
                <strong>Status:</strong> {{ $tester->person->Status ? 'Active' : 'Inactive' }}
            </div>
            <div class="mb-4">
                <strong>Married:</strong> {{ $tester->person->IsMarried ? 'Yes' : 'No' }}
            </div>


            {{-- <x-primary-button> <a href="{{ route('testers.index') }}">
                    {{ __('العودة إلى القائمة') }}</a></x-primary-button>

            <a href="{{ }}"
                class="bg-yellow-500 hover:bg-yellow-700 text-white inline-flex items-center px-4 py-2 border  rounded-md font-semibold text-xs  uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2  focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Edit</a> --}}


            <div class="flex mt-4 md:mt-6">
                <a href="{{ route('testers.edit', $tester->id) }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تعديل</a>
                <a href="{{ route('testers.index') }}"
                    class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">العودة
                    إلى القائمة</a>
            </div>
        </div>
    </div>










</x-crud-layout>
