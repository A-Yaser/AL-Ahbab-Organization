<x-crud-layout title="عرض معلومات المعهد" backUrl="institutes.index">


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1 class="text-2xl font-bold mb-4">معلومات المعهد</h1>

            <div class="bg-white p-6 rounded shadow-md">
                <p><strong>اسم المعهد:</strong> {{ $institute->name }}</p>
                <p><strong>اسم المدير:</strong> {{ $institute->manager->person->name }}</p>
                <p><strong>عدد الحلقات:</strong> {{ count($institute->groups) }}</p>
                <p><strong>المراكز: </strong>
                    @foreach ($institute->centers as $center)
                        <span> {{ $center->name }}</span>
                    @endforeach
                </p>
                <p><strong>القرية:</strong>
                    {{ $institute->region->name }}
                </p>
            </div>

            <div class="mt-4">
                <a href="{{ route('institutes.edit', $institute->id) }}"
                    class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                <form action="{{ route('institutes.destroy', $institute->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
</x-crud-layout>
