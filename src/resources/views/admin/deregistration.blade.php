@extends('main')

@section('content')

    <div class="d-flex justify-content-center align-items-center w-full mt-4">
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

    <div class="my-5 text-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name:</th>
                <th>E-mail:</th>
                <th>Permission:</th>
                <th>Is active:</th>
                <th></th>
            </tr>
            </thead>
            <tbody style="font-weight:600">
            @foreach ($users as $user)
                <form action="{{ route('admin.deregistration.delete',['id' => $user->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <tr>
                        <td>{{$user->name }}</td>
                        <td>{{$user->email }}</td>
                        <td>{{$user->permission}}</td>
                        <td>{{$user->is_active}}</td>
                        <td>
                            <div>
                                <button class="btn btn-dark" type="submit" id="main-submit">D E L E T E | U S E R
                                </button>
                            </div>
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $users->links() !!}
        </div>
        @include('layouts.back')
    </div>

@endsection
