<x-table-layout headerText="قائمة المعاهد" createBtnText="إضافة معهد جديد" Routsprefix="institutes">
    <x-slot name="headRows">
        <th class="py-2 px-4 border-b">#</th>
        <th class="py-2 px-4 border-b">اسم المعهد</th>
        <th class="py-2 px-4 border-b">اسم المدير</th>
        <th class="py-2 px-4 border-b">عدد الحلقات</th>
        <th class="py-2 px-4 border-b">المراكز</th>
        <th class="py-2 px-4 border-b">البلد</th>
        <th class="py-2 px-4 border-b">الإجراءات</th>
    </x-slot>

    <x-slot name="bodyRows">

        @foreach ($institutes as $institute)
            <tr>
                <td class="py-2 px-4 border-b">{{ $institute->id }}</td>
                <td class="py-2 px-4 border-b">{{ $institute->name }}</td>
                <td class="py-2 px-4 border-b">{{ $institute->manager->person->name }}</td>
                <td class="py-2 px-4 border-b">{{ count($institute->groups) }}</td>
                <td class="py-2 px-4 border-b">
                    @foreach ($institute->centers as $center)
                        {{-- <a href="{{ route('centers.show', $center->id) }}"> {{ $center->name }}</a> --}}
                        <a href=""> {{ $center->name }}</a>
                    @endforeach
                </td>
                <td class="py-2 px-4 border-b ">{{ $institute->region->name }}</td>
                <td class="py-2 px-4 border-b ">
                    <x-crud-actions-group :item="$institute" prefix="institutes" /> {{-- جعلت أزرار الاحداث في مجموعة موحدة لكل الجداول لسهولة تعديلها ولتكون مرنة --}}
                </td>
            </tr>
        @endforeach
    </x-slot>
</x-table-layout>
