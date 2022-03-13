@extends('main')

@section('content')

    <div class="row d-flex justify-content-center align-items-center h-50 py-12">
        <button class="btn btn-dark w-75" type="submit" id="main-submit">
            <a href="{{ route('admin.registration') }}">U S E R S &ensp; A C C O U N T &ensp; A D M I N I S T R A T I O N</a></button>
        <button class="btn btn-dark w-75" type="submit" id="main-submit">
            <a href="#">P E R M I S S I O N S &ensp; P A N E L</a></button>
        <button class="btn btn-dark w-75" type="submit" id="main-submit">
            <a href="#">I N Q U I R I E S &ensp; P A N E L</a></button>
        <button class="btn btn-dark w-75" type="submit" id="main-submit">
            <a href="#">L O G | O U T</a></button>
    </div>

@endsection
