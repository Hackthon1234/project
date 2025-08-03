<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $latestproducts = Product::with(['reviews', 'category'])->latest()->take(4)->get();
        return view('welcome', compact('latestproducts'));
    }
    public function viewProduct($id)
    {
        $product = Product::with(['reviews.user', 'category'])->findOrFail($id);
        return view('viewproduct', compact('product'));
    }
    public function categoryproducts($catid)
    {
        $category = Category::findOrFail($catid);
        $products = Product::with(['reviews', 'category'])->where('category_id', $catid)->get();
        return view('categoryproducts', compact('products', 'category'));
    }
    public function checkout($cartid)
    {
        $cart=Cart::findOrFail($cartid);
        return view('checkout', compact('cart'));
    }
    public function myorders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('myorders', compact('orders'));
    }
    public function search(Request $request)
    {
        $search= $request->input('search');
        $products = Product::with(['reviews', 'category'])->where('name', 'like', '%' . $search . '%')->get();
        return view('search', compact('products'));
    }

    public function searchSuggestions(Request $request)
    {
        $query = $request->input('query');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        // Get product suggestions
        $products = Product::where('name', 'like', '%' . $query . '%')
            ->with('category')
            ->take(6)
            ->get();

        // Get category suggestions
        $categories = \App\Models\Category::where('name', 'like', '%' . $query . '%')
            ->take(4)
            ->get();

        $suggestions = [];

        // Add product suggestions
        foreach ($products as $product) {
            $suggestions[] = [
                'type' => 'product',
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->discounted_price ?: $product->price,
                'original_price' => $product->price,
                'image' => asset('images/products/' . $product->photopath),
                'category' => $product->category->name ?? 'General',
                'url' => route('viewproduct', $product->id)
            ];
        }

        // Add category suggestions
        foreach ($categories as $category) {
            $suggestions[] = [
                'type' => 'category',
                'id' => $category->id,
                'name' => $category->name,
                'url' => route('categoryproducts', $category->id)
            ];
        }

        return response()->json($suggestions);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function allProducts(Request $request)
    {
        $query = Product::with(['reviews', 'category']);
        
        // Add filtering by category if requested
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
        
        // Add search functionality
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // Add sorting options
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                break;
            default:
                $query->latest();
        }
        
        $products = $query->paginate(12);
        $categories = Category::all();
        
        return view('products.all', compact('products', 'categories'));
    }
            
}
