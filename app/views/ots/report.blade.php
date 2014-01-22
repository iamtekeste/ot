@extends('layouts.default')
@section('header')
<div class="row ttl"><h2>
  LIB International Bank (S.C)
</h2>
<h3>
  HEAD OFFICE-ICT                   
</h3>
<h3>
  Delta Bank Project
</h3>
<h3>
  Follow up Sheet for Overtime
</h3>
</div>
<div class="row">
  <div class="col-xs-12">
        <h4><span>Employee Name</span></h4>
  </div>
</div>
@stop
@section('content')
<div class="row header">  
  <div class="col-xs-1 hdc hdch">S. No</div>  
  <div class="col-xs-1 hdc hdch">Day</div>  
  <div class="col-xs-1 hdc hdch">Date</div>  
  <div class="col-xs-1 hdc hdch">Range of time</div>  
  <div class="col-xs-1 hdc hdch">Total No of Hours Worked</div>  
  <div class="col-xs-4 hdc">
      <div class="row">
          <div class="col-xs-12">
            Distribution of Worked Time
          </div>
     </div>

    <div class="row">
        <div class="col-xs-3 ihdc">Evening</div>  
        <div class="col-xs-3 ihdc">Night</div>  
        <div class="col-xs-3 ihdc">Weekend</div>  
        <div class="col-xs-3 ihdcr">Holiday</div> 
    </div>

    <div class="row">
    <div class="col-xs-3 ihdc">5p.m-10p.m</div>  
    <div class="col-xs-3 ihdc">10p.m-6a.m</div>  
    <div class="col-xs-3 ihdc">8a.m-6a.m</div>  
    <div class="col-xs-3 ihdcr">8a.m-6a.m</div> 
    </div>

     <div class="row">
    <div class="col-xs-3 ihdc">1.25</div>  
    <div class="col-xs-3 ihdc">1.50</div>  
    <div class="col-xs-3 ihdc">2.00</div>  
    <div class="col-xs-3 ihdcr">2.50</div> 
    </div>

  </div>  
  <div class="col-xs-2 hdc  hdch">Signature of Employee</div>  
  <div class="col-xs-1 ihdcr hdch">Remark</div>  
</div>
<?php
$total = 0;
?>
@foreach ($Ots as $ot)
<div class="row">  
  <div class="col-xs-1 ihdc ihdch">{{$ot->endtime->day}}</div>  
  <div class="col-xs-1 ihdc ihdch">{{OtsController::getDay($ot->endtime)}}</div>  
  <div class="col-xs-1 ihdc ihdch">{{date("j-M-y", strtotime($ot->endtime))}}</div>  
  <div class="col-xs-1 ihdc">{{OtsController::getRange($ot->starttime, $ot->endtime)}}</div>  
  <div class="col-xs-1 ihdc ihdch">{{$totalHours = OtsController::getHoursWorked($ot->starttime, $ot->endtime)}}</div>  
  <div class="col-xs-4">
    <div class="row">
     @if ($ot->endtime->isWeekDay())
        <div class="col-xs-3 ihdc ihdch">5</div>
        @if(str_contains($totalHours, '1/2'))  
          <div class="col-xs-3 ihdc ihdch">{{$totalHours-5}} <i> 1/2</i></div>
        @else
         <div class="col-xs-3 ihdc ihdch">{{$totalHours}}</div>
        @endif
        <div class="col-xs-3 ihdc ihdch"> </div>  
        <div class="col-xs-3 ihdc ihdch"> </div>  
     @elseif($ot->endtime->isWeekend())
        <div class="col-xs-3 ihdc ihdch"> </div>  
        <div class="col-xs-3 ihdc ihdch">  </div> 
        <div class="col-xs-3 ihdc ihdch">{{$totalHours}}</div>  
        <div class="col-xs-3 ihdc ihdch"> </div> 
    @else
           <div class="col-xs-3 ihdc ihdch"> </div>  
        <div class="col-xs-3 ihdc ihdch">  </div> 
        <div class="col-xs-3 ihdc ihdch"></div>  
        <div class="col-xs-3 ihdc ihdch"> {{$totalHours}}</div> 
     @endif
    </div>
    </div>
  <div class="col-xs-2  ihdc ihdch"> </div>  
  <div class="col-xs-1 ihdcr"> </div>  
</div>
@endforeach
<?php
  $atots = OtsController::getTotals();
?>
<div class="row">
    <div class="col-xs-4 ihdc ihdch tots">Total</div>
    <div class="col-xs-1 ihdc ihdch">{{$atots['tots']}} </div>  
    <div class="col-xs-1 ihdc ihdch">{{$atots['etots']}} </div>  
    <div class="col-xs-1 ihdc ihdch"> {{$atots['ntots']}}</div>  
    <div class="col-xs-1 ihdc ihdch"> {{$atots['wtots']}}</div>  
    <div class="col-xs-1 ihdc ihdch"> </div>  
    <div class="col-xs-1 ihdc ihdch"> </div>  
    <div class="col-xs-1 ihdc ihdch"> </div>  
    <div class="col-xs-1 ihdc ihdcr"> </div>  
</div>
@stop
@section('footer')
<div class="row">
  <div class="col-xs-6">
        <h4><span>Checked</span></h4>
  </div><div class="col-xs-6">
        <h4><span>Approved</span></h4>
  </div>
</div>
@stop
@section('foter')
<div class="row">
  <div class="col-xs-6">
        <h4><span>Checked by</span></h4>
  </div>
   <div class="col-xs-6">
        <h4><span>Approved by</span></h4>
  </div>
</div>
@stop