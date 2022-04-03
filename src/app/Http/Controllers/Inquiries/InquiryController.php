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

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = Models\Product::where('id', $id);
        $product->delete();

        $session = $request->session()->getId();

        $measures = Models\Measure::get();

        $inquiries = Models\Inquiry::where('inquiry_mark', $session)->get();

        $products = Models\Product::whereIn('inquiry_id', $inquiries->pluck('id'))->get();

        return view('workplace.products', compact('products', 'measures'));
    }


    public function store(Request $request)
    {


    }


    public function create(Requests\Inquiry\InquiryCreateRequest $request)
    {
        $inquiry = new Models\Inquiry;
        $inquiry->user_id = Auth::user()->id;
        $session = $inquiry->inquiry_mark = $request->session()->getId();
        $inquiry->save();

        $last_inquiry_id = $inquiry->id;
        $validated = $request->validated();
        $validated['inquiry_id'] = $last_inquiry_id;

        Models\Product::create($validated);

        $measures = Models\Measure::get();

        $inquiries = Models\Inquiry::where('inquiry_mark', $session)->get();

        $products = Models\Product::whereIn('inquiry_id', $inquiries->pluck('id'))->get();

        return view('workplace.products', compact('products', 'measures'));
    }
}
