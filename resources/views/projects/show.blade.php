@extends('layouts.app')

@section('content')
<header class="flex item-center mb-3 py-4">
    <div class="flex justify-between w-full items-end">
        <p class="text-muted text-sm font-light">
            <a href="/projects" class="text-default text-sm font-normal no-underline hover:underline">My Projects</a> /
            {{ $project->title }}
        </p>
        <div class="flex">
            @foreach ($project->members as $member)
            <img src="{{ gravatar_url($member->email) }}" alt="{{ $member->name }}'s avater"
                class="rounded-full w-10 h-10 mr-2">
            @endforeach

            <img src="{{ gravatar_url($project->owner->email) }}" alt="{{ $project->owner->name }}'s avater"
                class="rounded-full w-10 h-10 mr-2">
            <a href="{{ $project->path().'/edit'}}" class="button ml-4">Edit Project</a>

        </div>
    </div>
</header>

<main>
    <div class="lg:flex -m-3">
        <div class="lg:w-3/4 px-3 mb-6">
            <div class="mb-8">
                <h2 class="text-muted font-normal mb-3 text-lg">Tasks</h2>

                {{-- task --}}
                @foreach ($project->tasks as $task)
                <div class="card mb-3">
                    <form action="{{ $task->path() }}" method="POST">
                        @method('PATCH')
                        @csrf

                        <div class="flex items-center">
                            <input type="text" name="body" value="{{ $task->body }}"
                                class="bg-card text-default w-full {{ $task->completed ? 'line-throught text-muted' : ''}}">
                            <input type="checkbox" name="completed" onchange="this.form.submit()"
                                {{ $task->completed ? 'checked' : ''}}>
                        </div>

                    </form>
                </div>
                @endforeach
                <div class="card mb-3">
                    <form action="{{ $project->path() . '/tasks' }}" method="POST">
                        @csrf

                        <input type="text" class="bg-card text-default w-full" placeholder="Add a new task..." name="body">
                    </form>
                </div>
            </div>

            <div>
                <h2 class="text-default font-normal mb-3 text-lg">General Notes</h2>

                {{-- General Notes --}}
                <form action="{{ $project->path() }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <textarea class="card w-full" style="min-height: 200px"
                        placeholder="Anything special that you want to make a note of?"
                        name="notes">{{ $project->notes }}</textarea>
                    <button type="submit" class="button">Save</button>

                </form>

                @include('errors')

            </div>
        </div>

        <div class="lg:w-1/4 px-3 lg:mt-10">

            @include('projects.card')

            @include('projects.activity.card')

            @can('manage', $project)
                @include('projects.invite')            
            @endcan

        </div>
</main>
@endsection
