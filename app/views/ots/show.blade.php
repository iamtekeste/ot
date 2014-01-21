@extends('layouts.default')
@section('content')
<div class="row show-grid">  
  <div class="col-xs-1 heading">S. No</div>  
  <div class="col-xs-1 heading">Day</div>  
  <div class="col-xs-1 heading">Date</div>  
  <div class="col-xs-1 heading">Range of time</div>  
  <div class="col-xs-1 heading">Total No of Hours Worked</div>  
  <div class="col-xs-4">
    <div class="row">
      <div class="col-xs-12">
        Distribution of Worked Time
      </div>
    </div>
    <div class="row">
    <div class="col-xs-3">Evening</div>  
    <div class="col-xs-3">Night</div>  
    <div class="col-xs-3">Weekend</div>  
    <div class="col-xs-3">Holiday</div> 
    </div>
     <div class="row">
    <div class="col-xs-3">5p.m-10p.m</div>  
    <div class="col-xs-3">10p.m-6a.m</div>  
    <div class="col-xs-3">8a.m-6a.m</div>  
    <div class="col-xs-3">8a.m-6a.m</div> 
    </div>
     <div class="row">
    <div class="col-xs-3">1.25</div>  
    <div class="col-xs-3">1.50</div>  
    <div class="col-xs-3">2.00</div>  
    <div class="col-xs-3">2.50</div> 
    </div>
  </div>  
  <div class="col-xs-2 heading">Signature of Employee</div>  
  <div class="col-xs-1 heading">Remark</div>  
</div>
@foreach ($Ots as $ot)
<div class="row cells">  
  <div class="col-xs-1">{{$ot->endtime->day}}</div>  
  <div class="col-xs-1">{{OtsController::getDay($ot->endtime)}}</div>  
  <div class="col-xs-1">{{date("j-M-y", strtotime($ot->endtime))}}</div>  
  <div class="col-xs-1">{{OtsController::getRange($ot->starttime, $ot->endtime)}}</div>  
  <div class="col-xs-1">{{$totalHours = OtsController::getHoursWorked($ot->starttime, $ot->endtime)}}</div>  
  <div class="col-xs-4">
    <div class="row">
     @if ($ot->endtime->isWeekDay())
        <div class="col-xs-3">5</div>  
        <div class="col-xs-3">{{$totalHours - 5}}</div>
        <div class="col-xs-3"> </div>  
        <div class="col-xs-3"> </div>  
     @else 
        <div class="col-xs-3"> </div>  
        <div class="col-xs-3"> </div> 
        <div class="col-xs-3">{{$totalHours}}</div>  
        <div class="col-xs-3">{{$totalHours}}</div> 
     @endif
    </div>
    </div>
  <div class="col-xs-2"> </div>  
  <div class="col-xs-1"> </div>  
</div>
@endforeach
@stop