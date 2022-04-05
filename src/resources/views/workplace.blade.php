<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row d-flex justify-content-around align-items-center h-50">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            @if(isset($inquiries))
                                @foreach($inquiries as $inquiry)
                                    <form action="{{ route ('workplace.show', ['id' => $inquiry->id]) }}"
                                          class="card-body p-1 text-center"
                                          method="GET">
                                        @csrf
                                        <input type="number" hidden value="{{$inquiry->id}}" name="id" id="id">
                                        <div class="d-flex row justify-content-between" style="border-radius: 1rem;"
                                             id="main-input">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <th>User Id</th>
                                                    <th>Inquiry &#8470;</th>
                                                    <th>State</th>
                                                    <th rowspan="2">
                                                        <button class="btn btn-dark text-center align-items-center"
                                                                type="submit" id="main-submit">
                                                            O P E N | I N Q U I R Y
                                                        </button>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="w-auto my-1"> {{$inquiry->user_id}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="w-auto my-1"> {{$inquiry->id}}</div>
                                                    </td>
                                                    <td>
                                                        <div class="w-auto my-1"> {{$inquiry->inquiry_state}}</div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                            <div class="d-flex justify-content-center">
                                {!! $inquiries->links() !!}
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <p> {{ $product->name }}</p>
                                    <p> {{ $product->model }}</p>
                                    <p> {{ $product->description }}</p>
                                    <p> {{ $product->measure }}</p>
                                    <p> {{ $product->quantity }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
