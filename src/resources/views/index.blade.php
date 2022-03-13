@extends('main')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-50">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="card shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                    <div class="card-body p-3 text-center">
                        <div class="form-outline py-2">
                            <input type="text" name="email" id="email" class="form-control form-control-sm"
                                   placeholder="E-mail"/>
                            <label class="form-label" for="email"></label>
                        </div>
                        <div class="form-outline">
                            <input type="password" name="password" id="password" class="form-control form-control-sm"
                                   placeholder="Password"/>
                            <label class="form-label" for="password"></label>
                        </div>
                        <button class="btn btn-dark" type="submit" id="main-submit">L O G | I N</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
