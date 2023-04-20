<x-layout>
    <x-slot name="content">
        <div class="relative flex flex-col justify-center min-h-screen bg-gray-300 sm:items-center py-4 sm:pt-0">
            <div class="m-4">
                <h1 class="text-2xl font-bold  bg-gray-300 text-center">Featured Project</h1>
                <x-projects.project-card :project="$featured" />
            </div>

            <h1 class="text-2xl font-bold  bg-gray-300  text-center">Other Projects</h1>
            <a href="/projects">View All</a>
            <div class="flex">
                @foreach ($projects as $project)
                    <div class="m-2">
                        <x-projects.project-card :project="$project" />
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-layout>
