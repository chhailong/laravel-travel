<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    
    public function index()
    {
        $product = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'Product List',
            'data' => $product
        ]);
        // dd($product);

    }

    

    // public function store(Request $request)
    // {
    //     return 'test api';
    // }

    // public function show($id)
    // {
    //     return 'test api';
    // }

    // public function update(Request $request, $id)
    // {
    //     return 'test api';
    // }

    // public function destroy($id)
    // {
    //     return 'test api';
    // }
}
