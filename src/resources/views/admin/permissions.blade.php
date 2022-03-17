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
                <th>Change permission</th>
                <th>Change is active</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name }}</td>
                    <td>{{$user->email }}</td>
                    <td>{{$user->permission }}</td>
                    <td>{{$user->is_active }}</td>
                    <td>
                        <select id="{{$user->id}}" name="{{$user->id}}">
                            @foreach ($permissions as $permission)
                                <option
                                    value="{{ $permission->name}}" {{ $permission->name == $user->permission ? 'selected' : '' }}>
                                    {{ $permission->name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="{{$user->id}}" name="{{$user->id}}">
                            <option value="1" {{$user->is_active ? 'selected' : ''}}>FALSE</option>
                            <option value="0" {{$user->is_active ? 'selected' : ''}}>TRUE</option>
                        </select>
                    </td>
                    <td>
                        <div>
                            <button class="btn btn-dark" type="submit" id="main-submit">S A V E | C H A N G E S</button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
