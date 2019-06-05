@extends('layouts.app')

@section('content')
<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:mx-12 rounded shadow">
    <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Register') }}</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="field mb-6">
            <label for="title" class="label text-sm mb-2 block">{{ __('Name') }}</label>

            <div class="control">
                <input type="text"
                    class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field mb-6">
            <label for="title" class="label text-sm mb-2 block">{{ __('E-Mail Address') }}</label>

            <div class="control">
                <input type="email"
                    class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field mb-6">
            <label for="description" class="label text-sm mb-2 block">{{ __('Password') }}</label>
            <div class="control">
                <input type="password"
                    class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field mb-6">
            <label for="description" class="label text-sm mb-2 block">{{ __('Confirm Password') }}</label>
            <div class="control">
                <input type="password" class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">
                    {{ __('Register') }}
                </button>

            </div>
        </div>

    </form>
</div>
@endsection
