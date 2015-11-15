@extends('layouts/bootstrap_css')
@section('content')


    <div class="col-md-12">

        <div class="col-md-offset-3">
            @if(isset($msg))
                <b>{!! $msg !!}</b>
            @endif
        </div>
        <div class="col-md-6">
            {!! Form::open(array('url' => 'Users/login','method' => 'post')) !!}

            {!! Form::hidden('_token',csrf_token()) !!}

            <div class="form-group">
                {!! Form::label('email','User Email') !!}<br/>
                {!! Form::email('email','',array('class'=>'form-control')) !!}<br/>
            </div>
            <div class="form-group">
                {!! Form::label('password','Password') !!}<br/>
                {!! Form::password('password', '',array('class'=>'form-control')) !!}<br/>
            </div>
            {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
            {!! link_to('registration', 'Register', array('class' => 'btn btn-default')) !!}
            {!! Form::close() !!}
        </div>
     <div class="col-md-offset-3"></div>

    </div>


@endsection
