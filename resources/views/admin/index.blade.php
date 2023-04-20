<x-layout>
    <x-slot name="content">
        <div class="flex justify-center min-w-full bg-gray-300 p-6">
            <div class="flex flex-col w-96 min-h-1/2">
                <h1 class="text-center text-2xl">Admin</h1>
                <div class="p-6 rounded-lg bg-white text-right ">
                    <a class="bg-green-500 text-white text-center font-bold py-2 px-4 rounded-lg mt-6 w-1/5 mr-0"
                        href="/admin/projects/create">Create</a>
                    <ol>
                        @foreach ($projects as $project)
                            <x-admin.admin-card :project="$project" />
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <div class="flex justify-center min-w-full bg-gray-300 p-6">
            <div class="flex flex-col w-96 min-h-1/2">
                <h1 class="text-center text-2xl">Users</h1>
                <div class="p-6 rounded-lg bg-white text-right ">
                    <a class="bg-green-500 text-white text-center font-bold py-2 px-4 rounded-lg mt-6 w-1/5 mr-0"
                        href="/admin/users/create">Create</a>
                    <ol>
                        @foreach ($users as $user)
                            <x-admin.admin-user-card :user="$user" />
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <div class="flex justify-center min-w-full bg-gray-300 p-6">
            <div class="flex flex-col w-96 min-h-1/2">
                <h1 class="text-center text-2xl">Categories</h1>
                <div class="p-6 rounded-lg bg-white text-right ">
                    <a class="bg-green-500 text-white text-center font-bold py-2 px-4 rounded-lg mt-6 w-1/5 mr-0"
                        href="/admin/category/create">Create</a>
                    <ol>
                        @foreach ($categories as $category)
                            <x-admin.admin-category-card :category="$category" />
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        <div class="flex justify-center min-w-full bg-gray-300 p-6">
            <div class="flex flex-col w-96 min-h-1/2">
                <h1 class="text-center text-2xl">Tags</h1>
                <div class="p-6 rounded-lg bg-white text-right ">
                    <a class="bg-green-500 text-white text-center font-bold py-2 px-4 rounded-lg mt-6 w-1/5 mr-0"
                        href="/admin/tag/create">Create</a>
                    <ol>
                        @foreach ($tags as $tag)
                            <x-admin.admin-tag-card :tag="$tag" />
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout>
