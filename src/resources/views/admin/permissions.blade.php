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
            </tr>
            </thead>
            <tbody>
{{--            @foreach ($users as $user)--}}
{{--                <tr>--}}
{{--                    <td>{{$user->name }}</td>--}}
{{--                    <td>{{$user->email }}</td>--}}
{{--                    <td>{{$user->permission }}</td>--}}
{{--                    <td>{{$user->is_active }}</td>--}}
{{--                    <td>--}}
{{--                        <select  id="{{$user->id}}" name="{{$user->id}}">--}}
{{--                            <option value="{{ $user->permission->name}}"></option>--}}

{{--                        </select>--}}

{{--                    </td>--}}
{{--                    <td></td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>

@endsection
