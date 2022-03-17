@extends('main')

@section('content')
    <div class="d-flex py-3 h-50 justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5 w-100">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form action="{{ route('registered') }}" method="POST">
                @csrf
                <div class="shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                    <div class="p-3 inline-flex w-full">
                        <div class="w-50 px-3">
                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                   placeholder="User name" :value="old('name')" required autofocus />
                            <label class="form-label" for="name" :value="__('Name')"></label>
                        </div>
                        <div class="w-50 px-3">
                            <input type="text" name="email" id="email" class="form-control form-control-sm"
                                   placeholder="E-mail" :value="old('email')" required/>
                            <label class="form-label" for="email" :value="__('Email')"></label>
                        </div>
                        <div class="w-50 px-3">
                            <input type="password" id="password" name="password" class="form-control form-control-sm"
                                   placeholder="Password" required autocomplete="new-password"/>
                            <label class="" for="password" :value="__('Password')"></label>
                        </div>
                        <div class="w-50 px-3">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-sm"
                                   placeholder="Repeat password" required/>
                            <label class="" for="password_confirmation" :value="__('Confirm Password')"></label>
                        </div>
                        <div class="w-50 px-3">
                        </div>
                        <div class="w-50 px-3">
                        </div>
                        <div class="w-25 mb-4 px-3">
                            <button class="btn btn-dark" type="submit" id="main-submit">A D D | U S E R</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
