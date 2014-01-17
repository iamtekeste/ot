@extends('layouts.default')
<div class="row">
  
</div>
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
          <tr>  
            <td>001</td>  
            <td>Rammohan </td>  
            <td>Reddy</td>  
            <td>A+</td>
            <td>87</td>
            <td>
                <table class="hours">
                        <tr>
                          <td>5</td>
                          <td>7</td>
                          <td>9</td>
                          <td>12</td>
                        </tr>
                </table>  
            </td>
            <td></td>
            <td></td>
          </tr>  
        </tbody>  
      </table>