@extends('main')

@section('content')

    <div class="row d-flex justify-content-center align-items-center h-50 py-12">

        <a class="btn btn-dark w-75 main-submit" role="button" href="{{ route('admin.register') }}">
           A D D &ensp; U S E R
        </a>

        <a class="btn btn-dark w-75 main-submit" role="button" href="{{route('admin.permissions')}}">
          U S E R &ensp; P E R M I S S I O N S
        </a>

        <a class="btn btn-dark w-75 main-submit" role="button" href="{{route('admin.deregistration.index')}}">
           D E L E T E &ensp; U S E R
        </a>

        <a class="btn btn-dark w-75 main-submit" role="button" href="{{route('workplace')}}">
            I N Q U I R I E S &ensp; W O R K P L A C E
        </a>

        <form method="POST" action="{{ route('logout') }}"
              class="row d-flex justify-content-center align-items-center mx-0 px-0">
            @csrf
            <button class="btn btn-dark w-75 main-submit" type="submit"><a>L O G | O U T</a></button>
        </form>

    </div>

@endsection
