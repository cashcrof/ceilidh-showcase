@props(['project', 'showBody' => false])

<div class="p-6 bg-white overflow-hidden shadow sm:rounded-lg">
    @if (!$showBody)
        @if ($project->thumb)
            <img src="{{ url('storage/' . $project->thumb) }}" alt="{{ $project->title }}"
                class="w-full h-64 object-cover object-center mb-6">
        @else
            <img src="{{ url('storage/images/placeholder.png') }}" alt="{{ $project->title }}"
                class="w-full h-64 object-cover object-center mb-6">
        @endif
    @endif
    @if ($showBody)
        @if ($project->image)
            <img src="{{ url('storage/' . $project->thumb) }}" alt="{{ $project->title }}"
                class="w-full h-64 object-cover object-center mb-6">
        @else
            <img src="{{ url('storage/images/placeholder-slide.png') }}" alt="{{ $project->title }}"
                class="w-full h-64 object-cover object-center mb-6">
        @endif
    @endif
    <div class="text-xl font-bold">
        <a href="/projects/{!! $project->slug !!}">{!! $project->title !!}</a>
    </div>
    @if (!$showBody)
        <div class="text-lg italic">{!! $project->excerpt !!}</div>
    @endif
    @if ($showBody)
        <div class="flex-auto flex-col space-y-4">{!! $project->body !!}</div>
    @endif
    <footer>
        @if ($project->category)
            <div><a href="/projects/categories/{{ $project->category->slug }}"> Category:
                    {{ $project->category->slug }}</a></div>
        @endif
        @if ($project->tags && count($project->tags))
            <span>Tags: </span>
            @foreach ($project->tags as $tag)
                <a href="/projects/tags/{{ $tag->slug }}">{{ $tag->slug }}</a>
            @endforeach
        @endif
    </footer>
</div>
