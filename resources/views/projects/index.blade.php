<x-layout>
    <x-slot name="content">
        @if ($category)
            <a class="text-xs w-full" href="/projects">Back to Projects</a>
            <div class="text-center">
                <h1 class="text-2xl font-bold  bg-gray-300 ">{{ $category->name }} Projects</h1>
            </div>
        @endif
        <div class="relative flex justify-center min-h-screen bg-gray-300 sm:items-center py-4 sm:pt-0">
            <div class="mt-6 w-1/2">
                <section class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach ($projects as $project)
                        <x-projects.project-card :project="$project" />
                    @endforeach
                </section>
                @if (count($projects))
                    <div class="text-xs w-full text-right">{{ count($projects) }} projects to peep.</div>
                @else
                    <div>Nothing to showcase, yet.</div>
                @endif
            </div>
        </div>
    </x-slot>
</x-layout>
