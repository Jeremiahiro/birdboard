@extends('layouts.app')

@section('content')
<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:mx-12 rounded shadow">
    <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Login') }}</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field mb-6">
            <label for="title" class="label text-sm mb-2 block">{{ __('E-Mail Address') }}</label>

            <div class="control">
                <input type="email"
                    class="input bg-transparent border border-gray-500 rounded p-2 text-xs w-full @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-red-800" role="alert">
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
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="text-red-800" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field mb-6">
            <div class="control">
                <input class="input bg-transparent" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="label is link text-sm block" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="button" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
