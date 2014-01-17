<?php
use Carbon\Carbon;
class OtsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

		 function __construct() {
        // ...
        $this->beforeFilter('auth');
        // ...
    }

	public function index()
	{
				$UserId =  Auth::user()->id;
				$Ots = User::find($UserId)->ots;
				 //return View::make('ots.index')->with('Ots', $Ots);
				$html = View::make('ots.show')->with('Ots', $Ots)->render();
$pdf = App::make('snappy.pdf.wrapper');
 $pdf->loadHTML($html);
 return $pdf->stream();
	}

	static public function getRange ($start, $end){

			$s = date("ga", strtotime($start));
			$e = date("g", strtotime($end));
			$ea = date("a", strtotime($end));
			$m = date('i', strtotime($end));
			return $s."-".$e.":".$m.$ea;
	}

	static public function getDay($end){

		if($end->dayOfWeek == 1)
		{
			return "Monday";
		}
		elseif ($end->dayOfWeek == 2) {
			return "Tuesday";
		}
		elseif ($end->dayOfWeek == 3) {
			return "Wednesday";
		}
		elseif ($end->dayOfWeek == 4) {
			return "Thursday";
		}
		elseif ($end->dayOfWeek == 5) {
			return "Friday";
		}
		elseif ($end->dayOfWeek == 6) {
			return "Saturday";
		}
		else
			return "Sunday";
	}

	static public function getHoursWorked ($end, $start){


		 $diff = $end->hour - $start->hour;
		 $diff = 24 - $diff;
		 if ($start->minute > 30) {
		 		return intval($diff) + 1;
		 }
		 else
		 	return $diff." 1/2";
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('ots.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			$input =  Input::all();

			//Convert sminute to 00 format
			$smin = intval($input['sminute']);
			if ($smin <= 9) {
				$smin = "0".$input['sminute'];
				//echo $smin;
			}

				 $shour = $input['shour'];
		   	 $sradios = $input['sradios'];



	//Convert eminute to 00 format
		   	 $emin =  intval($input['eminute']);
			if ($emin <= 9) {
				$emin = "0".$input['eminute'];
			}
			
			$ehour = $input['ehour'];
		 	$eradios = $input['eradios'];

			$ot= new Ot;

		 	$stime = $shour.":".$smin." ".$sradios;
		 	$stime24  = date("H", strtotime($stime));

		 	$ot->starttime = Carbon::now('EAT')->setTime($stime24, $smin, null);

		 	$etime = $ehour.":".$emin." ".$eradios;
		 	$etime24 = date("H", strtotime($etime));

		 	$ot->endtime = Carbon::now('EAT')->setTime($etime24, $emin, null);

		 	$ot->beod = $input['beod'];
		 	$ot->eod = $input['eod'];
		 	$ot->aeod = $input['aeod'];
		 	$ot->user_id =  Auth::user()->id;

		 	$ot->save();
		
			//var_dump($ot->starttime);
			//return $ot;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
				$UserId =  Auth::user()->id;
				$Ots = User::find($UserId)->ots;
				return View::make('ots.show')->with('Ots', $Ots);	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('ots.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
