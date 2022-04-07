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
                <form action="{{ route('admin.permissions.edit',['id' => $user->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                <tr>
                    <td>{{$user->name }}</td>
                    <td>{{$user->email }}</td>
                    <td>
                        <select id="permission" name="permission">
                            @foreach ($permissions as $permission)
                                <option
                                    value="{{ $permission->name}}" {{ $permission->name == $user->permission ? 'selected' : '' }}>
                                    {{ $permission->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="is_active" name="is_active">
                            <option value="0" {{$user->is_active ? 'selected' : ''}}>FALSE</option>
                            <option value="1" {{$user->is_active ? 'selected' : ''}}>TRUE</option>
                        </select>
                    </td>
                    <td>
                        <div>
                            <button class="btn btn-dark main-submit" type="submit">S A V E | C H A N G E S</button>
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
