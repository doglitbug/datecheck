<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$items=Item::paginate(10);
		return view('items.all', array('items'=>$items));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//Get all categories for selector
		$categories=Category::all();
		return view('items.create', array('categories'=>$categories));
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
		$this->validate($request, [
			'name' => 'required|max:255',
			'barcode' => 'required|unique:items,barcode|max:255',
			'category_id' => 'required'

		]);

		//Create the new item and store
		Item::create($request->all());

		return redirect('/items');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$item = Item::findOrFail($id);
		return view('items.show', array('item'=>$item));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//Find item
		$item = Item::findOrFail($id);
		
		$item->delete();

		return redirect('/items');
	}

	/**
	 * Search for items
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request){

		$query = $request->input('query');

		//Not searching on category(will require a orWhereHas join)
		$items = Item::where('name', 'LIKE', '%'.$query.'%')
					->orWhere('barcode', 'LIKE', '%'.$query.'%')->orderBy('name')->paginate(15);
		$items->appends(['query'=>$query]);
		
		return view('search', array('items'=>$items, 'query'=>$query));
	}
}