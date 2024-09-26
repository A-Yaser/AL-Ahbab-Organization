<x-table-layout headerText="قائمة المختبرين" createBtnText="إضافة مختبر جديد" Routsprefix="testers">
    <x-slot name="headRows">
        <th class="py-2 px-4 border-b">#</th>
        <th class="py-2 px-4 border-b">الاسم</th>
        <th class="py-2 px-4 border-b">اسم المستخدم</th>
        <th class="py-2 px-4 border-b">رقم الهاتف</th>
        <th class="py-2 px-4 border-b">تاريخ الميلاد</th>
        <th class="py-2 px-4 border-b">الإجراءات</th>
    </x-slot>
    <x-slot name="bodyRows">
        @foreach ($testers as $tester)
            {{-- {{ dd($tester) }} --}}
            <tr>
                <td class="py-2 px-4 border-b">{{ $tester->id }}</td>
                <td class="py-2 px-4 border-b">{{ $tester->person->name }}</td>
                <td class="py-2 px-4 border-b">{{ $tester->person->username }}</td>
                <td class="py-2 px-4 border-b">{{ $tester->person->phone }}</td>
                <td class="py-2 px-4 border-b">{{ $tester->person->birth_day }}</td>
                <td class="py-2 px-4 border-b ">
                    <x-crud-actions-group :item="$tester" prefix="testers" /> {{-- جعلت أزرار الاحداث في مجموعة موحدة لكل الجداول لسهولة تعديلها ولتكون مرنة --}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table-layout>
