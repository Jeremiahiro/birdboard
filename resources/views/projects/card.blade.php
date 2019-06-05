<div class="card flex flex-col" style="height: 200px">
    <h3 class="font-normal text-xl mb-4 py-4 -ml-5 border-l-4 border-blue-40 pl-4 mb-3">
        <a href="{{ $project->path()}}" class="text-default no-underline">{{ $project->title }}</a>
    </h3>
    <div class="text-default mb-4 flex-1">{{ str_limit($project->description, 100) }}</div>

    @can('manage', $project)
        <footer>
            <form action="{{ $project->path() }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="float-right" type="submit">Delete</button>
            </form>
        </footer>
    @endcan
</div>
