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
    public function store(Request $request)
    {
        // //Validate the new item
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'barcode' => 'required|unique:items,barcode|max:255',
        //     'category_id' => 'required'

        // ]);

        // //Create the new item and store
        // Item::create($request->all());

        // return redirect('/items');
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

        return redirect('/items/$item');
    }
}
