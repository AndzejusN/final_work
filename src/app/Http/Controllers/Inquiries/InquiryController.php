<?php

namespace App\Http\Controllers\Inquiries;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{

    public function index()
    {
        $inquiries = Inquiry::get();

        return view('workplace', compact('inquiries'));

    }

    public function inquiry()
    {

        return view('workplace.products');
    }


    public function store(Request $request)
    {


    }


    public function create(Request $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'model' => $request->model,
            'description' => $request->description,
            'measure' => $request->measure,
            'quantity' => $request->quantity
        ]);
    }
}
