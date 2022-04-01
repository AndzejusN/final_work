<?php

namespace App\Http\Controllers\Inquiries;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InquiryController extends Controller
{

    public function index()
    {
        $inquiries = Models\Inquiry::get();

        return view('workplace', compact('inquiries'));

    }

    public function inquiry()
    {
        $measures = Models\Measure::get();

        return view('workplace.products', compact('measures'));
    }


    public function store(Request $request)
    {


    }


    public function create(Requests\Inquiry\InquiryCreateRequest $request)
    {
        $inquiry = new Models\Inquiry;
        $inquiry->user_id = Auth::user()->id;
        $inquiry->save();

        $last_inquiry_id = $inquiry->id;

        $validated = $request->validated();
        $validated['inquiry_id'] = $last_inquiry_id;

        $product = Models\Product::create($validated);

        return redirect()->route('workplace.products', $product->id);
    }
}
