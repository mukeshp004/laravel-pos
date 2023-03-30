<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Purchase::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $purchase = new Purchase();
        $purchaseItem = new PurchaseItem();

        $items = $request->get('items');


        $item =  collect($items)->map(function ($item, $key) use ($purchaseItem) {
            return Arr::only($item, $purchaseItem->getFillable());
        });


        $purchase->save();

        $purchase->items()->createMany($item);
        $purchase->refresh();

        return $purchase;
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
        return $purchase;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //

        $purchase->update($request->only($purchase->getFillable()));

        return response()->json($purchase, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
