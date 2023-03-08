@props(['category'])

<li class="flex justify-between w-100 p-2 even:bg-slate-200 odd:bg-white">
    <p class="inline-block">{{ $category->name }}</p>
    <div class="inline-block">
        <a class="font-normal text-blue-700" href="/admin/tag/{{ $category->id }}/edit">Edit</a>
        <form method="POST" action="/admin/tag/{{ $category->id }}/delete" class="inline">
            @csrf
            @method('delete')
            <button type="submit" class="text-red-600">
                Delete
            </button>
        </form>
    </div>
</li>
