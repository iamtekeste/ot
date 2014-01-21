<div class="form-group">

   <label for="starth" class="col-sm-2 control-label">Start Hour</label>

    <div class="col-sm-10">
           {{Form::selectRange('shour' , 1 , 12, null, array('class'=>'form-control'));}}
   </div>

  </div>

  <div class="form-group">

   <label for="startm" class="col-sm-2 control-label">Start Minute</label>

    <div class="col-sm-10">
           {{Form::selectRange('sminute' , 1 , 60, null, array('class'=>'form-control'));}}
   </div>

  </div>

<div class="radio">
  <label>
       <input type="radio" name="optionsRadios" id="pm" value="pm" checked>
      PM  
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="am" value="am">
      AM
  </label>
</div>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Start Time</legend>
    <div class="form-group">

   <label for="starth" class="col-sm-2 control-label">Hour</label>

    <div class="col-sm-10">
           {{Form::selectRange('shour' , 1 , 12, null, array('class'=>'form-control'));}}
   </div>

  </div>
    <div class="form-group">

   <label for="startm" class="col-sm-2 control-label">Minute</label>

    <div class="col-sm-10">
           {{Form::selectRange('sminute' , 1 , 60, null, array('class'=>'form-control'));}}
   </div>

  </div>
  <div class="radio">
  <label>
       <input type="radio" name="optionsRadios" id="pm" value="pm" checked>
      PM  
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="optionsRadios" id="am" value="am">
      AM
  </label>
</div>
</fieldset>