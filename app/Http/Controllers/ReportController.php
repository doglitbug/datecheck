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

		$items = $this->getItems($start, $end);

		return view('reports.expired', array('pageTitle'=>"Expired items", 'start'=>$start, 'end'=>$end, 'items'=>$items));
	}

	/**
	 * Show all items due to expire in the current week(starting Monday)
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function current(Request $request)
	{
		//Calculate start and end date that we want
		$start = Carbon::now()->startOfWeek(Carbon::MONDAY);
		//Copy is used because using a method updates the object itself ($start==$end otherwise)
		$end  = $start->copy()->addWeek(1);

		$items = $this->getItems($start, $end);

		return view('reports.expired', array('pageTitle'=>"Expiring this week", 'start'=>$start, 'end'=>$end, 'items'=>$items));
	}

	/**
	 * Show all items due to expire in the next week(7 days)
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function week(Request $request)
	{
		//Calculate start and end date that we want
		$start = Carbon::now();
		//Copy is used because using a method updates the object itself ($start==$end otherwise)
		$end  = $start->copy()->addWeek(1);

		$items = $this->getItems($start, $end);

		return view('reports.expired', array('pageTitle'=>"Expiring within next week", 'start'=>$start, 'end'=>$end, 'items'=>$items));
	}

	/**
	 * Grab all items(and expiry dates) with expiry dates between given parameters
	 */
	private function getItems(Carbon $start, Carbon $end){
		$items = Item::whereHas('expiry', function ($query) use ($start, $end){ $query
			->whereDate('expiry_date', '>=', $start)
			->whereDate('expiry_date', '<', $end)
			;})
			->with('expiry')->get();
		return $items;
	}
}