<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Expiry;

class ExpiryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {
	    //Validate the new expiry
	    $this->validate($request, [
	        'expiry_date' => 'required'
	    ]);

	    //Create the new expiry, but do not duplicate!
	    $expiry = Expiry::firstOrCreate(['item_id'=>$item->id, 'expiry_date'=>$request->expiry_date]);

	    return view('items.show', array('item'=>$item));
    }

    /**
     * Delete the given date from the item
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item)
    {
        //Find Expiry to delete. Use first other wise
        $expiry = $item->expiry->where('expiry_date' , '=', $request->date)->first();

        if ($expiry != null) {
            $expiry->delete();
        }

        //Using redirect because view was still showing deleted item and browser url was showing wrong route
        //Suspect browser caching?
        return redirect()->route('items.show', ['item' => $item]);
    }
}