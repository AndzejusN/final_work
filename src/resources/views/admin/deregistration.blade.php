@extends('main')

@section('content')

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
        @include('layouts.pagination')
        @include('layouts.back')
    </div>

@endsection
