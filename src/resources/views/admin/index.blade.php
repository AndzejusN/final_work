@extends('main')

@section('content')

    <div class="row d-flex justify-content-center align-items-center h-50 py-12">

        <a class="btn btn-dark w-75" role="button" id="main-submit" href="{{ route('admin.register') }}">
            U S E R S &ensp; A C C O U N T &ensp; A D M I N I S T R A T I O N
        </a>

        <a class="btn btn-dark w-75" role="button" id="main-submit" href="{{route('admin.permissions')}}">
            P E R M I S S I O N S &ensp; P A N E L
        </a>

        <a class="btn btn-dark w-75" role="button" id="main-submit" href="{{route('workplace')}}">
            I N Q U I R I E S &ensp; P A N E L
        </a>

        <form method="POST" action="{{ route('logout') }}"
              class="row d-flex justify-content-center align-items-center mx-0 px-0">
            @csrf
            <button class="btn btn-dark w-75" type="submit" id="main-submit"><a>L O G | O U T</a></button>
        </form>

    </div>

@endsection
