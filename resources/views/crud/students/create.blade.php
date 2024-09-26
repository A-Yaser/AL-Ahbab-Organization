<x-crud-layout title="إضافة طالب جديد" backUrl="students.index">

    <form action="{{ route('students.store') }}" method="POST" class="grid grid-cols-4 gap-3 max-w-xl space-y-6"
        enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="name" :value="'الاسم'" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- /Name -->

        <!-- Username -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="username" :value="'اسم المستخدم'" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username')"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>
        <!-- /Username -->

        <!-- Email -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="email" :value="'البريد الإلكتروني'" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email')"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <!-- /Email -->

        <!-- Phone -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="phone" :value="'رقم الهاتف'" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')"
                required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <!-- /Phone -->

        <!-- Password -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="password" :value="'كلمة المرور'" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required
                autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>
        <!-- /Password -->

        <!-- Password Confirmation -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="password_confirmation" :value="'تأكيد كلمة المرور'" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" required autocomplete="new-password" />
            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
        </div>
        <!-- /Password Confirmation -->

        <!-- Birth Date -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="birth_day" :value="'تاريخ الميلاد'" />
            <x-text-input id="birth_day" name="birth_day" type="date" class="mt-1 block w-full" :value="old('birth_day')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('birth_day')" />
        </div>
        <!-- /Birth Date -->

        <!-- Address -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="address" :value="'العنوان'" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')"
                required />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <!-- /Address -->

        <!-- Group -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="group_id" :value="'اختر المجموعة'" />
            <select id="group_id" name="group_id" class="mt-1 block w-full border-gray-300">
                <option selected>اختر المجموعة</option>
                @foreach ($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('group_id')" />
        </div>
        <!-- /Group -->

        <!-- Subject -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="subject_id" :value="'اختر المادة'" />
            <select id="subject_id" name="subject_id" class="mt-1 block w-full border-gray-300">
                <option selected>اختر المادة</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('subject_id')" />
        </div>
        <!-- /Subject -->

        <!-- Profile Picture -->
        <div class="col-span-4 md:col-span-2">
            <x-input-label for="profile_picture" :value="'صورة الحساب'" />
            <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>
        <!-- /Profile Picture -->

        <!-- SEX -->
        <div class="md:flex md:items-center justify-center mb-6 col-span-2">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                الجنس
            </label>
            <div class="">
                <div class="flex flex-row justify-center text-center items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="sex" class="mr-2 leading-tight" type="radio" value="male" required>
                        <span class="text-sm">ذكر</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="sex" class="mr-2 leading-tight" type="radio" value="female" required>
                        <span class="text-sm">أنثى</span>
                    </label>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('sex')" />
            </div>
        </div>
        <!-- /SEX -->

        <!-- Is Married -->
        <div class="md:flex md:items-center col-span-2 mb-6">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                الوضع الاجتماعي
            </label>
            <div class="">
                <div class="flex flex-row items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="IsMarried" class="mr-2 leading-tight" type="radio" value="1">
                        <span class="text-sm">متزوج</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="IsMarried" class="mr-2 leading-tight" type="radio" value="0" checked>
                        <span class="text-sm">أعزب</span>
                    </label>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('IsMarried')" />
            </div>
        </div>
        <!-- /Is Married -->

        <x-primary-button class="col-span-2 md:col-span-1">أضف طالب جديد</x-primary-button>
    </form>

</x-crud-layout>
