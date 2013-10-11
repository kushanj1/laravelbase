@extends('layouts.master')

@section('title')
@parent
:: Register
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h2>Register New User</h2>
</div>

{{ Form::open(array('url' => 'register', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="control-group {{{ $errors->has('fullname') ? 'error' : '' }}}">
        {{ Form::label('fullname', 'fullname', array('class' => 'control-label')) }}

        <div class="controls">
            {{ Form::text('fullname', Input::old('fullname')) }}
            {{ $errors->first('fullname') }}
        </div>
	</div>

    <!-- Email -->
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        {{ Form::label('email', 'E-Mail', array('class' => 'control-label')) }}

        <div class="controls">
            {{ Form::text('email', Input::old('email')) }}
            {{ $errors->first('email') }}
        </div>
    </div>

    <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Password', array('class' => 'control-label')) }}

        <div class="controls">
            {{ Form::password('password') }}
            {{ $errors->first('password') }}
        </div>
    </div>

    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Login', array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}
@stop
