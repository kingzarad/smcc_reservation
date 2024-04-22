<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::where('status', '0')->get();
        $products = Product::with('productImages')->where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('frontend.index', compact('categories', 'products'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        $products = Product::with('productImages')->where('status', '0')->orderBy('created_at', 'DESC')->get();
        return view('frontend.product.collection.index', compact('categories', 'products'));
    }

    public function products($category_slug)
    {

        $categories = Category::where('status', '0')->get();
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.product.collection.index', compact('categories', 'products'));
        } else {
            return redirect()->back();
        }
    }

    public function productView($category_slug, $product_slug)
    {

        $category = Category::where('slug', $category_slug)->first();
        if ($category) {

            $products = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

            if ($products) {
                $products_suggest = Product::with('productImages')->orderBy('created_at', 'DESC')->get();
                return view('frontend.product.details.index', compact('products', 'products_suggest'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function reservedList()
    {
        
        return view('frontend.reserved.index');
    }
}
