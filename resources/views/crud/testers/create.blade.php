<x-crud-layout title="إضافة مختبر جديد" backUrl="testers.index">

    <form action="{{ route('testers.store') }}" method="POST" class=" grid grid-cols-4 gap-3 max-w-xl space-y-6"
        enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="name" :value="'الاسم'" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <!-- Name -->


        <!-- Username -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="username" :value="'اسم المستخدم'" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username')"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>
        <!--/ Username -->


        <!-- Email -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="email" :value="'البريد الإلكتروني'" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email')"
                required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <!--/ Email -->



        <!-- Phone -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="phone" :value="'رقم الهاتف'" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')"
                required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <!--/ Phone -->


        <!-- Password -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="update_password_password" :value="'كلمة المرور'" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>
        <!--/ Password -->

        <!-- Password Confirmation -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="update_password_password_confirmation" :value="'تأكيد كلمة المرور'" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>
        <!--/ Password Confirmation -->




        <!-- Birth Date -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="datepicker-sc" :value="__('تاريخ الميلاد')" />
            <x-text-input id="datepicker-sc" name="birth_day" type="date" class="mt-1 block w-full"
                :value="old('birth_day')" required autocomplete="birth_day" />
            <x-input-error class="mt-2" :messages="$errors->get('birth_day')" />
        </div>
        <!--/ birth_day -->


        <!-- Address -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="address" :value="__('العنوان')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')"
                required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>
        <!--/ Address -->

        <!-- Institute -->
        <div class=" col-span-4 md:col-span-2">
            <label for="institutes" class="block font-medium text-sm text-gray-700 dark:text-gray-300">اختر
                المعهد</label>
            <select id="institutes" name="institute_id"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                <option selected>اختر المعهد</option>
                @foreach ($institutes as $institute)
                    <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                @endforeach
            </select>
            @error('institute_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <!--/ Institute -->





        <!-- profile_picture -->
        <div class=" col-span-4 md:col-span-2">
            <x-input-label for="profile_picture" :value="__('صورة الحساب')" />
            <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full"
                :value="old('profile_picture')" autocomplete="profile_picture" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
        </div>
        <!--/ profile_picture -->



        <!-- SEX -->
        <div class="md:flex md:items-center justify-center mb-6 col-span-2">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                الجنس
            </label>
            <div class="">
                <div class="flex flex-row justify-center text-center items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="sex" class="mr-2 leading-tight" type="radio" value="male">
                        <span class="text-sm">ذكر</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="sex" class="mr-2 leading-tight" type="radio" value="female">
                        <span class="text-sm">أنثى</span>
                    </label>
                </div>
                @error('sex')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!--/ SEX -->



        <!-- Is Married -->
        <div class="md:flex md:items-center col-span-2 mb-6">

            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                الوضع الاجتماعي
            </label>
            <div class="">
                <div class="  flex flex-row items-center">
                    <label class="block text-gray-500 font-bold">
                        <input name="IsMarried" class="mr-2 leading-tight" type="radio" value="1">
                        <span class="text-sm">متزوج</span>
                    </label>
                    <label class="ml-4 block text-gray-500 font-bold">
                        <input name="IsMarried" class="mr-2 leading-tight" type="radio" value="0">
                        <span class="text-sm">أعزب</span>
                    </label>
                </div>
                @error('IsMarried')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror

            </div>

        </div>
        <!--/ Is Married -->

        <x-primary-button class=" col-span-2 md:col-span-1">أضف مختبر جديد</x-primary-button>
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
