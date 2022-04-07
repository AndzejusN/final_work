@extends('main')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-50">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('logged') }}">
                @csrf

                <div class="card shadow-2-strong main-input" style="border-radius: 1rem;">
                    <div class="card-body p-3 text-center">
                        <div class="form-outline py-2">
                            <input type="email" name="email" id="email" class="form-control form-control-sm"
                                   placeholder="E-mail" :value="old('email')" required autofocus />
                            <label class="form-label" for="email" :value="__('Email')"></label>
                        </div>
                        <div class="form-outline">
                            <input type="password" name="password" id="password" class="form-control form-control-sm"
                                   placeholder="Password" required autocomplete="current-password"/>
                            <label class="form-label" for="password" :value="__('Password')"></label>
                        </div>
                        <button class="btn btn-dark main-submit" type="submit">L O G | I N</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
