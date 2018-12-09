<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Resources\ItemResource;


class apiItemController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return ItemResource::collection(Item::paginate(25));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//Validate the new item
		//TODO Accept category as string and convert to cat_id?
		//TODO Validation fail doesnt return error, fix
		$this->validate($request, [
			'name' => 'required|max:255',
			'barcode' => 'required|unique:items,barcode|max:255',
			'category_id' => 'required'
		]);


		//Create the new item and store
		$item = Item::create($request->all());

		return new ItemResource($item);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Item $item)
	{
		return new ItemResource($item);
	}

	/**
	 * Update the specified item in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Item $item
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Item $item)
	{

		$this->validate($request, [
			'name' => 'required|max:255',
			'barcode' => "required|unique:items,barcode,$item->id,id|max:255",
			'category_id' => 'required'
		]);

		$item->update($request->all());

		return new ItemResource($item);
	}

	/**
	 * Remove the specified item from storage.
	 *
	 * @param  \App\Item $item
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Item $item)
	{
		$item->delete();

		return response()->json(null, 204);
	}
}