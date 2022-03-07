@extends('main')

@section('content')
    <div class="row d-flex justify-content-center align-items-center h-50">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                <div class="card-body p-3 text-center">
                    <div class="form-outline py-2">
                        <input type="text" id="username" class="form-control form-control-sm"
                               placeholder="User name"/>
                        <label class="form-label" for="username"></label>
                    </div>
                    <div class="form-outline">
                        <input type="password" id="userpass" class="form-control form-control-sm"
                               placeholder="Password"/>
                        <label class="form-label" for="userpass"></label>
                    </div>
                    <button class="btn btn-dark" type="submit" id="main-submit">L O G | I N</button>
                </div>
            </div>
        </div>
    </div>
@endsection
