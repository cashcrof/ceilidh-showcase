<x-layout>
    <x-slot name="content">
        <main class="max-w-lg mx-auto">


            @if ($category)
                <h1 class="text-center font-bold text-xl mb-3">Edit Category: {{ $category->name }}</h1>
                <form method="POST" action="/admin/category/{{ $category->id }}/edit" enctype="multipart/form-data">
                    @method('PATCH')
                @else
                    <h1 class="text-center font-bold text-xl mb-3">Create Category</h1>
                    <form method="POST" action="/admin/category/create" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $category?->name }}"
                    required class="border border-gray-400 rounded p2 w-full">
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-green-700 text-white rounded py-2 px-4">
                    Submit
                </button>
            </div>
            </form>
        </main>
    </x-slot>
</x-layout>
