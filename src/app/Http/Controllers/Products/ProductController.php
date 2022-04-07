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

    public function change($id)
    {
        $product = Models\Product::where('id', $id);
        $product->delete();

        $inquiry_id = Models\Product::where('id', $id)->pluck('inquiry_id');

        $count = Models\Product::where('inquiry_id', $inquiry_id)->count();

        if ($count == 0) {

            $empty = Models\Inquiry::where('id', $inquiry_id);
            $empty->delete();
        }

        $products = Models\Product::where('inquiry_id', $inquiry_id)->where('filled', 1);

        $all_same_inquiry = Models\Product::where('inquiry_id', $inquiry_id);

        $just_filled_sum = $all_same_inquiry->pluck('filled')->sum();

        if ($just_filled_sum == 0) {

            Models\Inquiry::where('id', $inquiry_id)->update(['inquiry_state' => 'Fully']);
        }

        $inquiries = Models\Inquiry::select('id', 'user_id', 'inquiry_state')
            ->distinct()
            ->orderBy('id', 'DESC')
            ->where('inquiry_state', 'Partly')
            ->where('user_id', Auth::user()->id)
            ->paginate(6);

        return view('workplace.confirmation', compact('inquiries', 'products'));
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

        Models\Product::where('id', $id)->update($validated);

        $updated_product = Models\Product::where('id', $id)->get();

        $inquiry_id = $updated_product->pluck('inquiry_id');

        $all_same_inquiry = Models\Product::where('inquiry_id', $inquiry_id);

        $just_filled_num = $all_same_inquiry->pluck('filled')->count();

        $just_filled_sum = $all_same_inquiry->pluck('filled')->sum();

        if ($just_filled_num == $just_filled_sum) {

            Models\Inquiry::where('id', $inquiry_id)->update(['inquiry_state' => 'Partly']);
        }

        $inquiries = Models\Inquiry::select('id', 'user_id', 'inquiry_state')
            ->distinct()
            ->orderBy('id', 'DESC')
            ->where('inquiry_state', 'Empty')
            ->paginate(7);

        $products = Models\Product::where('inquiry_id', $inquiry_id)
            ->where('filled', 0)
            ->get();

        return view('workplace', compact('inquiries', 'products'));
    }

    public function add($id)
    {
        Models\Product::where('id', $id)->update(['filled' => 0]);

        $inquiry_id = Models\Product::where('id', $id)->pluck('inquiry_id');

        $products = Models\Product::where('inquiry_id', $inquiry_id)->where('filled', 1);

        $all_same_inquiry = Models\Product::where('inquiry_id', $inquiry_id);

        $just_filled_sum = $all_same_inquiry->pluck('filled')->sum();

        if ($just_filled_sum == 0) {

            Models\Inquiry::where('id', $inquiry_id)->update(['inquiry_state' => 'Fully']);
        }

        $inquiries = Models\Inquiry::select('id', 'user_id', 'inquiry_state')
            ->distinct()
            ->orderBy('id', 'DESC')
            ->where('inquiry_state', 'Partly')
            ->where('user_id', Auth::user()->id)
            ->paginate(6);
        
        return view('workplace.confirmation', compact('inquiries', 'products'));
    }
}
