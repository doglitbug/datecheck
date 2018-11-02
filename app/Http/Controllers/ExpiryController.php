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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find expiry
        $expiry = Expiry::findOrFail($id);
        //Find parent
        $item = $expiry->item;

        $expiry->delete();

        return view('items.show', array('item'=>$item));
    }
}