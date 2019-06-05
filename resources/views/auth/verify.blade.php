@extends('layouts.app')

@section('content')
<div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:mx-12 rounded shadow">
    <h1 class="text-2xl font-normal mb-10 text-center">{{ __('Verify Your Email Address') }}</h1>
    <div class="control">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a
            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
    </div>
</div>
@endsection
