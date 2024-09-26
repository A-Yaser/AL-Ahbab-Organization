<x-table-layout headerText="قائمة الطلاب" createBtnText="إضافة طالب جديد" Routsprefix="students">
    <x-slot name="headRows">
        <th class="py-2 px-4 border-b">#</th>
        <th class="py-2 px-4 border-b">الاسم</th>
        <th class="py-2 px-4 border-b">اسم المستخدم</th>
        <th class="py-2 px-4 border-b">تاريخ الميلاد</th>
        <th class="py-2 px-4 border-b">اسم الحلقة</th>
        <th class="py-2 px-4 border-b">المادة</th>
        <th class="py-2 px-4 border-b">الإجراءات</th>
    </x-slot>
    <x-slot name="bodyRows">
        @foreach ($students as $student)
            {{-- {{ dd($student) }} --}}
            <tr>
                <td class="py-2 px-4 border-b">{{ $student->id }}</td>
                <td class="py-2 px-4 border-b">{{ $student->person->name }}</td>
                <td class="py-2 px-4 border-b">{{ $student->person->username }}</td>
                <td class="py-2 px-4 border-b">{{ $student->person->birth_day }}</td>
                <td class="py-2 px-4 border-b">{{ $student->group->name }}</td>
                <td class="py-2 px-4 border-b">{{ $student->subject->name }}</td>
                <td class="py-2 px-4 border-b ">
                    <x-crud-actions-group :item="$student" prefix="students" /> {{-- جعلت أزرار الاحداث في مجموعة موحدة لكل الجداول لسهولة تعديلها ولتكون مرنة --}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table-layout>
