<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="height: 500px; overflow-y: scroll;"
                         class="row d-flex justify-content-around align-items-start">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            @if(isset($inquiries))
                                @foreach($inquiries as $inquiry)
                                    <form action="{{ route ('workplace.view', ['id' => $inquiry->id]) }}"
                                          class="card-body p-1 text-center"
                                          method="GET">
                                        @csrf
                                        <div class="d-flex row justify-content-between" style="border-radius: 1rem;"
                                             id="main-input">
                                            <table>
                                                <tbody>
                                                <tr>
                                                    <th>User Id</th>
                                                    <th>Inquiry &#8470;</th>
                                                    <th>State</th>
                                                    <th rowspan="2">
                                                        <button class="btn btn-dark text-center align-items-center main-submit"
                                                                type="submit">
                                                            O P E N | O F F E R
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
                                    <form method="GET"
                                          action="{{ route ('workplace.order', ['id' => $product->id]) }}"
                                          class="py-1">
                                        @csrf
                                        <div class="card shadow-2-strong" style="border-radius: 1rem;" id="main-input">
                                            <div class="card-body p-3 text-start">
                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="name">Name:</label>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{ $product->name }}" readonly/>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="model">Model:</label>
                                                    <input type="text" name="model" id="model"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{$product->model}}" readonly/>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label for="description">Product description:</label>
                                                    <textarea class="form-control" style="min-width: 100%"
                                                              id="description"
                                                              name="description"
                                                              readonly>{{ $product->description }}</textarea>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="measure">Measurement:</label>
                                                    <input type="text" name="measure" id="measure"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{$product->measure}}" readonly/>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="quantity">Quantity:</label>
                                                    <input type="number" name="quantity" id="quantity"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{ $product->quantity }}" readonly/>
                                                </div>

                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="price">Price:</label>
                                                    <input type="number" name="price" id="price"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{ $product->price }}" readonly/>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label class="form-label" for="delivery_term">Delivery term:</label>
                                                    <input type="number" name="delivery_term" id="delivery_term"
                                                           class="form-control form-control-sm"
                                                           placeholder="{{ $product->delivery_term }}"
                                                           readonly/>
                                                </div>
                                                <div class="form-outline py-1">
                                                    <label for="conditions">Conditions:</label>
                                                    <textarea class="form-control" style="min-width: 100%"
                                                              id="description" name="conditions" readonly>{{ $product->conditions }}</textarea>
                                                </div>
                                                <div class="text-center pt-4">
                                                    <button style="min-width: 100%" class="btn btn-dark text-center main-submit"
                                                            type="submit">
                                                        C O N F I R M | O F F E R
                                                    </button>
                                                </div>
                                                <div class="text-center pt-4">
                                                    <button style="min-width: 100%" class="btn btn-dark text-center main-submit"
                                                            type="button" data-action="delete" data-product-id="{{ $product->id }}">
                                                        D E L E T E | O F F E R
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
