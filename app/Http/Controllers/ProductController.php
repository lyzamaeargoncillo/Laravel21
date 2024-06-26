<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $products = Product::orderBy('name');

        if ($filter) {
            $products->where('name', 'like', '%' . $filter . '%')
                     ->orWhere('description', 'like', '%' . $filter . '%');
        }

        $products = $products->get();

        $html = '';

        foreach ($products as $prod) {
            $html .= "
                <div class='p-4 rounded bg-blue-200 w-[23rem] m-2'>
                    <h3 class='text-2xl'>$prod->name</h3>
                    <img src='$prod->image_url' alt='$prod->name' class='w-full h-48 object-cover mt-2 mb-2 rounded'>
                    <hr>
                    <div class='italic text-gray-500'>
                        $prod->description
                    </div>
                    <div class='text-4xl text-right'>$$prod->price</div>
                    <div class='text-right'>Quantity: $prod->quantity</div>
                </div>
            ";
        }
        return response($html);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image_url' => 'required|url',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'image_url' => $request->input('image_url'),
        ]);

        $html = "
            <div class='p-4 rounded bg-blue-200 w-[23rem] m-2'>
                <h3 class='text-2xl'>{$product->name}</h3>
                <img src='{$product->image_url}' alt='{$product->name}' class='w-full h-48 object-cover mt-2 mb-2 rounded'>
                <hr>
                <div class='italic text-gray-500'>
                    {$product->description}
                </div>
                <div class='text-4xl text-right'>\${$product->price}</div>
                <div class='text-right'>Quantity: {$product->quantity}</div>
            </div>
        ";

        return response()->json(['success' => true, 'html' => $html]);
    }
}
