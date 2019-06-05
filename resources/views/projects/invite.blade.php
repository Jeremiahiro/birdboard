<div class="card flex flex-col mt-3">
    <h3 class="font-normal text-xl mb-4 py-4 -ml-5 border-l-4 border-blue-40 pl-4 mb-3">
        Invite a User
    </h3>

    <form action="{{ $project->path() . '/invitations'}}" method="POST">
        @csrf

        <div class="mb-3">
            <input type="email" class="border border-gray-400 rounded w-full py-2 px-4" name="email"
                placeholder="Email address">

        </div>
        <button class="button" type="submit">Invite</button>
    </form>
    @include('errors', ['bag' => 'invitations'])

</div>