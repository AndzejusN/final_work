@extends('main')

@section('content')
    <div class="d-flex py-3 h-50 justify-content-center align-items-center">

        <div class="col-12 col-md-8 col-lg-6 col-xl-5 w-100 mb-6">
            <div class="d-flex justify-content-center align-items-center w-full">
                    @if(Session::has('negative'))
                        <div class="alert alert-danger w-50">
                            {{ Session::get('negative')}}
                        </div>
                    @endif

                    @if(Session::has('positive'))
                        <div class="alert alert-success w-50 text-center">
                            {{ Session::get('positive')}}
                        </div>
                    @endif
            </div>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form action="{{ route('registered') }}" method="POST">
                @csrf
                <div class="shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                    <div class="p-3 inline-flex w-full">
                        <div class="w-25 px-2">
                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                   placeholder="User name" :value="old('name')" required autofocus/>
                            <label class="form-label" for="name" :value="__('Name')"></label>
                        </div>
                        <div class="w-25 px-2">
                            <input type="text" name="email" id="email" class="form-control form-control-sm"
                                   placeholder="E-mail" :value="old('email')" required/>
                            <label class="form-label" for="email" :value="__('Email')"></label>
                        </div>
                        <div class="w-25 px-2">
                            <input type="password" id="password" name="password" class="form-control form-control-sm"
                                   placeholder="Password" required autocomplete="new-password"/>
                            <label class="" for="password" :value="__('Password')"></label>
                        </div>
                        <div class="w-25 px-2">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control form-control-sm"
                                   placeholder="Repeat password" required/>
                            <label class="" for="password_confirmation" :value="__('Confirm Password')"></label>
                        </div>
                        <div class="px-2">

                            <select id="is_active" name="is_active" required>
                                <option selected disabled>Is active</option>
                                <option value="1">TRUE</option>
                                <option value="0">FALSE</option>

                            </select>
                        </div>
                        <div class="w-25 px-2">
                            <select id="permission" name="permission" required>
                                <option selected disabled>Permission</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name}}">
                                        {{ $permission->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-25 mb-5 px-2">
                            <button class="btn btn-dark main-submit" type="submit">A D D | U S E R</button>
                        </div>
                    </div>
                </div>
            </form>
            @include('layouts.back')
        </div>
    </div>
@endsection
