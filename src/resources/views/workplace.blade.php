<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        @if(isset($inquiries))
                            @foreach($inquiries as $inquiry)
                                <form action="#" class="card-body p-3 text-center" method="GET">
                                    @csrf
                                    <div class="d-flex row justify-content-between" style="border-radius: 1rem;"
                                         id="main-input">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>User Id.:</th>
                                                <th>Unique inquiry Nr.:</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="w-auto my-2"> {{$inquiry->user_id}}</div>
                                                </td>
                                                <td>
                                                    <div class="w-auto my-2"> {{$inquiry->id}}</div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th colspan="2">
                                                    <div class="w-auto my-2">
                                                        <button class="btn btn-dark text-center"
                                                                type="submit" id="main-submit">
                                                            O P E N | I N Q U I R Y
                                                        </button>
                                                    </div>
                                                </th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </form>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
