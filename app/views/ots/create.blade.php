@extends('layouts.default')
<?php
Use Carbon\Carbon;
$start = Carbon::now('EAT')->setTime(17, 0, null);
$now = Carbon::now('EAT');
$ehour = $now->hour;//subHours(12);
$shour = $start->hour - 12;
$ehour = date('h', strtotime($now ));

//echo $ehour;
?>
@section('content')

    {{ Form::open(array('route' => 'ots.store', 'class' => 'form-inline', 'role' => 'form')) }}
    
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Eod Status</legend>
      <div class="form-group">

           <label for="beod" class="col-sm-2 control-label">BEod</label>

    <div class="col-sm-10">
         <select name = "beod" class="form-control col-xs-2" id="beod">
          <option value = "Ok">Ok</option>
          <option value = "Not Ok!">Not Ok!</option>
        </select>   
   </div>
</div>
      <div class="form-group">

   <label for="eod" class="col-sm-2 control-label">Eod</label>

    <div class="col-sm-10">
         <select name = "eod" class="form-control" id="eod">
          <option value = "Ok">Ok</option>
          <option value = "Not Ok!">Not Ok!</option>
        </select>   
   </div>

  </div>

  <div class="form-group">

   <label for="aeod" class="col-sm-2 control-label">AEod</label>

    <div class="col-sm-10">
         <select name = "aeod" class="form-control">
          <option value = "Ok">Ok</option>
          <option value = "Not Ok!">Not Ok!</option>
        </select>   
   </div>

  </div>
  </fieldset>

 <fieldset class="scheduler-border">
    <legend class="scheduler-border">Start Time</legend>
    <div class="form-group">

   <label for="starth" class="col-sm-2 control-label">Hour</label>

    <div class="col-sm-10">
           {{Form::selectRange('shour' , 1 , 12, $start->hour-12, array('class'=>'form-control'));}}
   </div>

  </div>
    <div class="form-group">

   <label for="startm" class="col-sm-2 control-label">Minute</label>

    <div class="col-sm-10">
           {{Form::selectRange('sminute' , 1 , 60, 0, array('class'=>'form-control'));}}
   </div>

  </div>

  <div class="radio">
  <label>
       <input type="radio" name="sradios" id="pm" value="PM" checked>
      PM  
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="sradios" id="am" value="AM">
      AM
  </label>
</div>
</fieldset>


<fieldset class="scheduler-border">
    <legend class="scheduler-border">End Time</legend>
    <div class="form-group">

   <label for="endh" class="col-sm-2 control-label">Hour</label>

    <div class="col-sm-10">
           {{Form::selectRange('ehour' , 1 , 12, $ehour, array('class'=>'form-control'));}}
   </div>

  </div>
    <div class="form-group">

   <label for="endm" class="col-sm-2 control-label">Minute</label>

    <div class="col-sm-10">
           {{Form::selectRange('eminute' , 1 , 60, $now->minute, array('class'=>'form-control'));}}
   </div>

  </div>

  <div class="form-group">
     <div class="radio">
  <label>
       <input type="radio" name="eradios" id="pm" value="PM">
      PM  
  </label>
</div>

<div class="radio">
  <label>
    <input type="radio" name="eradios" id="am" value="AM" checked>
      AM
  </label>
</div>
  </div>
</fieldset>
</br>
        
        <button class="btn btn-lg btn-success btn-block" type="submit">Add OT</button></br>
        <a href="/ots/create"> 
           <button type="button" class="btn btn-danger btn-lg btn"> Or cancel</button>
        </a>

{{ Form::close() }}

@stop