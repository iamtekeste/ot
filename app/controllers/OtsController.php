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
				 return View::make('ots.report')->with('Ots', $Ots);
	}

public function pdf()
{
		$UserId = Auth::user()->id;
		$Ots = User::find($UserId)->ots;
		$pdf = PDF::loadView('ots.report', array('Ots' => $Ots));
		// return $pdf->download('report.pdf');
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

		return date('D', strtotime($end));
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

	static public function getTotals(){

		$UserId = Auth::user()->id;
		$ots = User::find($UserId)->ots;

		$tots = 0;
		$etots = 0;
		$ntots = 0;
		$wtots = 0;
		$counter = 0 ;

		foreach ($ots as $ot) {
			$diff = OtsController::getHoursWorked($ot->starttime, $ot->endtime);
		
			if(str_contains($diff, '1/2'))
			{
				$diff = Str::words($diff, 1);
				$tots = $tots + intval($diff) + 0.5;

						if ($ot->endtime->isWeekend()) {
							$wtots = $wtots + intval($diff) + 0.5;
							$counter = $counter - 1;
					}
					

			}
			else{
				$diff = Str::words($diff, 1);
				$tots = $tots + intval($diff);
					if ($ot->endtime->isWeekend()) {
					$wtots = $wtots + intval($diff);
			}
			}
			$counter = $counter + 1;
		}
		$etots = $counter * 5;
		$ntots = $tots - $etots - $wtots;
		$atots = array(
			'tots' => $tots,
			'etots' => $etots,
			'ntots' => $ntots,
			'wtots'	=> $wtots
			);
		return $atots;

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
				return View::make('ots.report')->with('Ots', $Ots);	}

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
