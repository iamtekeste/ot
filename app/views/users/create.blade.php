@extends('layouts.default')
<div class="container">
  {{ Form::open(array('route' => 'users.store', 'class' => 'form-signin', 'role' => 'form')) }}

        <h2 class="form-signin-heading">Please sign up</h2>
        <input type="text" name ="name" class="form-control" placeholder="Name" required autofocus></br>

        <input type="text" name ="email" class="form-control" placeholder="Email address" required autofocus></br>

        <input type="password" name ="password" class="form-control" placeholder="Password" required></br>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button></br>
                <a href="/login" class="navbar-link">or Login</a>

{{ Form::close() }}

</div> <!-- /container -->