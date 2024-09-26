<x-crud-layout title="تعديل بيانات المعهد" backUrl="institutes.index">

    <form action="{{ route('institutes.update', $institute->id) }}" method="POST"
        class=" grid grid-cols-4 gap-3 max-w-xl space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="name" :value="'الاسم'" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$institute->name"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- Name -->


        <!-- Region -->
        <div class=" col-span-4 md:col-span-2">
            <label for="countries" class="block font-medium text-sm text-gray-700 dark:text-gray-300">اختر
                البلدة</label>
            <select id="countries" name="region_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <option value="null">اختر البلدة</option>
                @foreach ($regions as $region)
                    <option @selected($institute->region_id == $region->id) value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
            @error('Region_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!--/ Region -->

        <!-- manager -->
        <div class=" col-span-4 md:col-span-2">
            <label for="countries" class="block font-medium text-sm text-gray-700 dark:text-gray-300">تحديد
                المدير</label>
            <select id="countries" name="manager_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <option value="null">اختر مدير المعهد</option>
                @foreach ($managers as $manager)
                    <option @selected($institute->manager_id == $manager->id) value="{{ $manager->id }}">{{ $manager->person->name }}
                    </option>
                @endforeach
            </select>
            @error('manager_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!--/ manager -->

        {{-- new --}}
        <!-- tester -->
        <div class=" col-span-4 md:col-span-2">
            <label for="testers" class="block font-medium text-sm text-gray-700 dark:text-gray-300">تحديد
                المختبر <select id="testers" name="tester_id"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                    <option value="null">اختر المختبر</option>
                    @foreach ($testers as $tester)
                        <option @selected($institute->tester_id == $tester->id) value="{{ $tester->id }}">{{ $tester->person->name }}
                        </option>
                    @endforeach
                </select>
                @error('tester_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
        </div>
        <!--/ tester -->


        <x-primary-button class=" col-span-2 md:col-span-1">حفظ التعديلات</x-primary-button>
    </form>


    @push('scripts')
        <script>
            $(function() {
                $("#datepicker-sc").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            })
        </script>
    @endpush

</x-crud-layout>
