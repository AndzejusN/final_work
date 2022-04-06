<?php

namespace App\Http\Controllers\Products;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $measures = Models\Measure::get();

        return view('workplace.products', compact('measures'));
    }

    public function delete($id)
    {

        $product = Models\Product::where('id', $id);

        $product->delete();

        $measures = Models\Measure::get();

        $products = Models\Product::where('inquiry_id', null)->get();

        return view('workplace.products', compact('products', 'measures'));
    }

    public function create(Requests\Inquiry\InquiryCreateRequest $request)
    {
        $validated = $request->validated();

        $validated += ['user_id' => Auth::user()->id];

        Models\Product::create($validated);

        $products = Models\Product::where('inquiry_id', null)->get();

        $measures = Models\Measure::get();

        return view('workplace.products', compact('products', 'measures'));
    }

    public function update(Requests\Inquiry\InquiryUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $validated += ['filled' => 1];

        Models\Product::where('id',$id)->update($validated);
    }
}

