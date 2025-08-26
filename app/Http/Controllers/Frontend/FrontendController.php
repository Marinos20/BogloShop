<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;  // Import ajouté pour la recherche
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function service()
    {
        return view('frontend.service');
    }
        public function condition()
    {
        return view('frontend.condition_general');
    }

    public function policy()
    {
        return view('frontend.privacy-policy');
    }

    public function categories()
    {
        $categories = Category::withCount('products')
            ->where('status', 1)
            ->select(['id', 'name', 'image', 'slug'])
            ->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)
            ->where('status', 1)
            ->select(['id', 'name', 'slug', 'meta_title', 'meta_description', 'meta_keyword'])
            ->first();

        if ($category) {
            return view('frontend.collections.products.index', compact('category'));
        }

        return abort(404);
    }

    public function AllProducts()
    {
        $category = Category::all();
        return view('frontend.collections.index', compact('category'));
    }

    public function product($category_slug, $product_slug)
    {
        $category = Category::where('slug', $category_slug)
            ->where('status', 1)
            ->select(['id', 'name'])
            ->first();

        if ($category) {
            $product = $category->products()
                ->where('slug', $product_slug)
                ->where('status', 1)
                ->first();

            $products = $category->products()
                ->where('id', '!=', $product->id)
                ->where('status', 1)
                ->get();

            if ($product) {
                return view('frontend.collections.products.view', compact('product', 'products'));
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function thankyou()
    {
        if (session('order_data')) {
            $order = array(session('order_data'));
            session()->forget('order_data');
            $order = $order[0];

            $paid = $order['payment_mode'] === 'Card/Bank Transfer' ? true : false;
            $trackingNo = $order['tracking_no'];

            return view('frontend.thankyou', compact('order', 'paid', 'trackingNo'));
        } else {
            return abort(404);
        }
    }

    // Nouvelle méthode search
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', '%' . $query . '%')
            ->where('status', 1)
            ->paginate(12);

        return view('layouts.inc.frontend.app.search-results', compact('products', 'query'));


    }
}
