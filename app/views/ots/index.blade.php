@extends('layouts.default')
<?php
  use Carbon\Carbon;?>
  @section('content')
 @if ($Ots)
<table class="table">  
        <thead>  
          <tr>  
            <th>S.No</th>  
            <th>Day</th>  
            <th>Date</th>  
            <th>Range of Time</th>  
            <th>Total No of<br>Hours Worked</th>  
            <th>Distribution of Worked Time (OT Rate)
                <table class="nested">
                    <tr>
                      <td><b>Evening</b></td>
                      <td><b>Night</b></td>
                      <td><b>Weekend</b></td>
                      <td><b>Holiday</b></td>
                    </tr>
                    <tr>
                      <td><i>5p.m-<br>10p.m</i></td>
                      <td><i>10p.m-<br>6a.m</i></td>
                      <td><i>8a.m-<br>6a.m</i></td>
                      <td><i>8a.m-<br>6a.m</i></td>
                    </tr>
                    <tr>
                      <td>1.25</td>
                      <td>1.50</td>
                      <td>2.00</td>
                      <td>2.50</td>
                    </tr>
                </table>
            </th>  
            <th>
              Signature<br>of the<br>Employee
            </th>
            <th>Remark</th>
          </tr>  
        </thead>  
        <tbody> 
              @foreach ($Ots as $ot)
                 <tr>  
                      <td>{{$ot->endtime->day}}</td>  
                      <td>{{OtsController::getDay($ot->endtime)}} </td>  
                      <td>{{date("j-M-y", strtotime($ot->endtime))}}</td>  
                      <td>{{OtsController::getRange($ot->starttime, $ot->endtime)}}</td>
                      <td>{{$totalHours = OtsController::getHoursWorked($ot->starttime, $ot->endtime)}}</td>
                      <td>
                          <table class="hours">
                                  <tr>
                                    @if ($ot->endtime->isWeekDay())
                                      <td>5</td>
                                      <td>{{$totalHours - 5}}</td>
                                    @else
                                      <td>{{$totalHours}}</td>
                                     <td>{{$totalHours}}</td>
                                    @endif
                                   
                                  </tr>
                          </table>  
                      </td>
                      <td></td>
                      <td></td>
                    </tr> 
              @endforeach 
               </tbody>  
      </table>
      <a href="/ots/show"> 
                      <button type="button" class="btn btn-primary btn-lg">Generate PDF</button>
                    </a>
         @else 
              <div class="alert alert-warning"> 
                {{"Sorry there is no OT for you!"}}
                {{

                  $dt = Carbon::now('EAT')->setTime(11, 00, 00)->timestamp;
                  $date = Carbon::createFromTimestamp($dt)->setTimezone('EAT');
                  echo $date;

                }}
              </div>
              <div>
                   <a href="/ots/create"> 
                      <button type="button" class="btn btn-primary btn-lg">Add OT</button>
                    </a>
              </div>

        @endif
@stop