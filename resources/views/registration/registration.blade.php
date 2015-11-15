@extends('layouts/bootstrap_css')
@section('content')


 <div class="col-md-12">
  @if ($errors->has())
   <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
     {{ $error }}<br>
    @endforeach
   </div>
  @endif
  <div class="col-md-offset-3"><span style="font-weight: bold; text-align: center">Register as a new user</span ></div>
  <div class="col-md-6">
 {!! Form::open(array('url' => 'registration/store','method' => 'post')) !!}
 {!! Form::hidden('_token',csrf_token()) !!}
 <div class="form-group">
 {!! Form::label('name', 'User Name') !!}<br/>
 {!! Form::text('name', '',array('class'=>'form-control')) !!}<br/>
  </div>
  <div class="form-group">
 {!! Form::label('email','User Email') !!}<br/>
 {!! Form::email('email','',array('class'=>'form-control')) !!}<br/>
   </div>
 <div class="form-group">
 {!! Form::label('password','Password') !!}<br/>
 {!! Form::password('password', '',array('class'=>'form-control')) !!}<br/>
  </div>
 {!! Form::submit('Submit', array('class'  => 'btn btn-primary')) !!}
 {!! link_to('registration/login', 'Login', array('class' => 'btn btn-default')) !!}
 {!! Form::close() !!}
 </div>
  <div class="col-md-offset-3">

  </div>
 </div>
 <div>

 </div>
@endsection
