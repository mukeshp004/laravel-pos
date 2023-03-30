<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  Product::all();
        return response()->json($products, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $data = $request->only($product->getFillable());
        $data['uuid'] = Str::uuid();

        $product = product::create($data);
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $product->update($request->only($product->getFillable()));

        return response()->json($product, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return response()->json($product, Response::HTTP_NO_CONTENT);
        }
    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        // return $request->all();
        $product = Product::select('id', 'name')
            ->where('name', 'LIKE', '%' . $term . '%')
            ->where('status', Product::$status['Active'])
            ->get();

        return response()->json($product, Response::HTTP_ACCEPTED);
    }
}
