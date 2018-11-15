<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Expiry;
use Carbon\Carbon;

class ReportController extends Controller
{
	/**
	 * Show all items that have expired
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function expired(Request $request)
	{
		//Calculate start and end date that we want

		//Pull oldest expiry date as starting point
		$start = Carbon::Parse(Expiry::all()->min('expiry_date'));
		
		//Include today
		$end   = Carbon::now();

		//Grab required items within those dates
		$items = Item::whereHas('expiry', function ($query) {
					$query->whereDate('expiry_date', '<=', Carbon::now());
					})->with(['expiry' => function ($query) {
					$query->whereDate('expiry_date', '<=', Carbon::now())->orderBy('expiry_date');
					}])->get();

		return view('reports.expired', array('pageTitle'=>"Expired items", 'start'=>$start, 'end'=>$end, 'items'=>$items));
	}

	/**
	 * Show all items due to expire in the current week
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function week(Request $request)
	{
		//Calculate start and end date that we want
		$start = Carbon::now()->startOfWeek();
		//Add 6 days as opposed to week, because addWeek returns 8 days
		//Copy is used because using a method updates the object itself ($start==$end otherwise)
		$end  = $start->copy()->addWeek(1);

		//Using use ($end) to place variable within function scope
		//Grabs all items with an expiry less than $end

		$items = Item::whereHas('expiry', function ($query) use ($end){ $query->whereDate('expiry_date', '<', $end); })->with('expiry')->get();

		return view('reports.expired', array('pageTitle'=>"Expiring this week", 'start'=>$start, 'end'=>$end, 'items'=>$items));
	}
}