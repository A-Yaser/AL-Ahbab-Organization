<x-table-layout headerText="قائمة الحلقات" createBtnText="إضافة حلقة جديد" Routsprefix="groups">
    <x-slot name="headRows">
        <th class="py-2 px-4 border-b">#</th>
        <th class="py-2 px-4 border-b">اسم الحلقة</th>
        <th class="py-2 px-4 border-b">المعهد</th>
        <th class="py-2 px-4 border-b">المركز</th>
        <th class="py-2 px-4 border-b">المدرس</th>
        <th class="py-2 px-4 border-b">عدد الطلاب</th>
        <th class="py-2 px-4 border-b">الإجراءات</th>
    </x-slot>

    <x-slot name="bodyRows">
        @foreach ($groups as $group)
            <tr>
                <td class="py-2 px-4 border-b">{{ $group->id }}</td>
                <td class="py-2 px-4 border-b">{{ $group->name }}</td>
                <td class="py-2 px-4 border-b"><a
                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300"
                        href="{{ route('institutes.show', $group->institute->id) }}">{{ $group->institute->name }}</a>
                </td>
                <td class="py-2 px-4 border-b"><a class=" hover:underline"
                        href="{{ route('centers.show', $group->center->id) }}">{{ $group->center->name }}</a></td>
                {{-- @dd($group->teatecher) --}}
                <td class="py-2 px-4 border-b"><a class=" hover:underline"
                        href="{{ route('teachers.show', $group->teacher->id) }}">{{ $group->teacher->person->name }}</a>
                </td>
                <td class="py-2 px-4 border-b">{{ count($group->students) }}</td>
                <td class="py-2 px-4 border-b ">
                    <x-crud-actions-group :item="$group" prefix="groups" /> {{-- جعلت أزرار الاحداث في مجموعة موحدة لكل الجداول لسهولة تعديلها ولتكون مرنة --}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table-layout>
