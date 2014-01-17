@extends('layouts.default')
<div class="container">

  {{ Form::open(array('route' => 'sessions.store', 'class' => 'form-signin', 'role' => 'form')) }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name ="email" class="form-control" placeholder="Email address" required autofocus></br>
        <input type="password" name ="password" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <a href="/users/create" class="navbar-link">or Sign up</a>
{{ Form::close() }}

</div> <!-- /container -->