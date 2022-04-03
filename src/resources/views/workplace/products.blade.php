<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            <div class="text-end">--}}
            {{--                <a class="btn btn-dark w-25" role="button" id="main-submit" href="{{route('workplace.create')}}">--}}
            {{--                    A D D | P R O D U C T--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </h2>
    </x-slot>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row d-flex justify-content-around align-items-center h-50">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-2" :errors="$errors"/>

                            <form method="POST" action="{{ route('workplace.create') }}">
                                @csrf
                                <div class="card shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                                    <div class="card-body p-3 text-start">
                                        <div class="form-outline py-1">
                                            <label class="form-label" for="name" :value="__('Name')">Name:</label>
                                            <input type="text" name="name" id="name"
                                                   class="form-control form-control-sm"
                                                   placeholder="Product name" :value="old('name')" required autofocus/>
                                        </div>
                                        <div class="form-outline py-1">
                                            <label class="form-label" for="model" :value="__('Model')">Model:</label>
                                            <input type="text" name="model" id="model"
                                                   class="form-control form-control-sm"
                                                   placeholder="Model name" :value="old('model')" required autofocus/>
                                        </div>
                                        <div class="form-outline py-1">
                                            <label for="description" :value="__('Description')">Product
                                                description:</label>
                                            <textarea class="form-control" style="min-width: 100%" id="description"
                                                      name="description" :value="old('description')"></textarea>
                                        </div>
                                        <div class="form-outline py-1">
                                            <label for="measure">Measurement:</label>
                                            <select class="form-control" style="min-width: 100%" id="measure"
                                                    name="measure">
                                                <option value="" disabled selected> Please select measurement...
                                                </option>
                                                @foreach ($measures as $measure)
                                                    <option value="{{ $measure->name}}">{{ $measure->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-outline py-1">
                                            <label class="form-label" for="quantity"
                                                   :value="__('Quantity')">Quantity:</label>
                                            <input type="number" name="quantity" id="quantity"
                                                   class="form-control form-control-sm" :value="old('quantity')"
                                                   required autofocus/>
                                        </div>
                                        <div class="text-center pt-4">
                                            <button style="min-width: 100%" class="btn btn-dark text-center"
                                                    type="submit" id="main-submit">
                                                A D D | P R O D U C T
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <form action="{{route('workplace.delete')}}" class="card-body p-3 text-center" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <div class="d-flex row justify-content-between" style="border-radius: 1rem;"
                                         id="main-input">
                                        <input class="number" hidden value="{{$product->id}}" name="id" id="id">
                                        <div class="w-auto my-2"> {{$product->name}}</div>
                                        <div class="w-auto my-2"> {{$product->measure}}</div>
                                        <div class="w-auto my-2"> {{$product->quantity}}</div>
                                        <div class="w-auto my-2">
                                            <button class="btn btn-dark text-center"
                                                    type="submit" id="main-submit">
                                                D E L E T E | P R O D U C T
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                @endforeach
                            @endif
                                <div class="my-2">
                                    <button style="min-width: 100%" class="btn btn-dark text-center"
                                            type="submit" id="main-submit">
                                        S E N D | I N Q U I R Y
                                    </button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
