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
        $inquiries = Models\Inquiry::select('id', 'user_id', 'inquiry_state')
            ->distinct()
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('workplace', compact('inquiries'));

    }

    public function create(Request $request)
    {
        $inquiry = new Models\Inquiry;
        $inquiry->user_id = Auth::user()->id;
        $inquiry->save();

        Models\Product::whereNull('inquiry_id')->update(['inquiry_id' => $inquiry->id]);

        $measures = Models\Measure::get();

        return view('workplace.products', compact('measures'));
    }

    public function show($id)
    {
        $products = Models\Product::where('inquiry_id', $id)->get();

        $inquiries = Models\Inquiry::select('id', 'user_id', 'inquiry_state')
            ->distinct()
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('workplace', compact('inquiries', 'products'));
    }
}
