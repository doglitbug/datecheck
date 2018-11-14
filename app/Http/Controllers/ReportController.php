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
        //Grab required items within those dates
        $items = Item::whereHas('expiry', function ($query) {
                    $query->whereDate('expiry_date', '<=', Carbon::now());
                    })->with(['expiry' => function ($query) {
                    $query->whereDate('expiry_date', '<=', Carbon::now())->orderBy('expiry_date');
                    }])->get();

        //Calculate start and end date that we want
        $start = Carbon::Parse(Expiry::all()->min('expiry_date'));
        //return $start;
        $end   = Carbon::now();

        return view('reports.expired', array('pageTitle'=>"Expired items", 'start'=>$start, 'end'=>$end, 'items'=>$items));
    }

    /**
     * Show all items due to expire in the next 7 days
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function week()
    {
        //Grab required items within those dates TODO
        $items = Item::whereHas('expiry', function ($query) {
                    $query->whereDate('expiry_date', '<=', Carbon::now()->addWeeks(1));
                    })->with(['expiry' => function ($query) {
                    $query->whereDate('expiry_date', '<=', Carbon::now()->addWeeks(1))->orderBy('expiry_date');
                    }])->get();

        //Calculate start and end date that we want
        $start = Carbon::Parse(Expiry::all()->min('expiry_date'));
        //return $start;
        $end   = Carbon::now()->addWeeks(1);

        return view('reports.expired', array('pageTitle'=>"Expiring within next week", 'start'=>$start, 'end'=>$end, 'items'=>$items));
    }
}