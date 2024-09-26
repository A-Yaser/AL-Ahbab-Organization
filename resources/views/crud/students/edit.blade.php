<x-crud-layout title="تعديل بيانات الطالب" backUrl="students.index">

    <form action="{{ route('students.update', $student->id) }}" method="POST"
        class="w-full grid grid-cols-4 gap-3 max-w-xl p-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="person_id" value="{{ $student->person_id }}">
        <input type="hidden" name="user_id" value="{{ $student->person->user_id }}">

        <!-- Name -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="name" :value="__('الاسم الثلاثي')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$student->person->name"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- /Name -->

        <!-- Group -->
        <div class="col-span-4 md:col-span-2">
            <label for="group_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">اختر
                المجموعة</label>
            <select id="group_id" name="group_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <option value="null">اختر المجموعة</option>
                @foreach ($groups as $group)
                    <option {{ $student->group_id == $group->id ? 'selected' : '' }} value="{{ $group->id }}">
                        {{ $group->name }}</option>
                @endforeach
            </select>
            @error('group_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!-- /Group -->

        <!-- Subject -->
        <div class="col-span-4 md:col-span-2">
            <label for="subject_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">اختر
                المادة</label>
            <select id="subject_id" name="subject_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <option value="null">اختر المادة</option>
                @foreach ($subjects as $subject)
                    <option {{ $student->subject_id == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">
                        {{ $subject->name }}</option>
                @endforeach
            </select>
            @error('subject_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!-- /Subject -->

        <!-- Gender -->
        <div class="md:flex md:items-center justify-center mb-6 col-span-2">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                    الجنس
                </label>
            </div>
            <div class="md:w-2/3">
                <div class="flex flex-row items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="sex" @checked($student->person->sex == 'male') class="mr-2 leading-tight" type="radio"
                            value="male">
                        <span class="text-sm">ذكر</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="sex" @checked($student->person->sex == 'female') class="mr-2 leading-tight" type="radio"
                            value="female">
                        <span class="text-sm">أنثى</span>
                    </label>
                </div>
                @error('sex')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- /Gender -->

        <!-- Is Married -->
        <div class="md:flex md:items-center col-span-2 mb-6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                الوضع الاجتماعي
            </label>
            <div class="">
                <div class="flex flex-row items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="isMarried" class="mr-2 leading-tight" type="radio" @checked($student->person->isMarried)
                            value="1">
                        <span class="text-sm">متزوج</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="is_married" class="mr-2 leading-tight" type="radio" @checked(!$student->person->isMarried)
                            value="0">
                        <span class="text-sm">أعزب</span>
                    </label>
                </div>
                @error('isMarried')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- /Is Married -->

        <x-primary-button class="col-span-2 md:col-span-1">حفظ التعديلات</x-primary-button>

    </form>
</x-crud-layout>

@push('scripts')
    <script>
        $(function() {
            $("#datepicker-sc").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        })
    </script>
@endpush
