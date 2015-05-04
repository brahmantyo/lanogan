@extends('app')

@section('content-header')
<h1>
User Manager
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/user"><i class="fa fa-dashboard"></i>User Manager</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
 
<div class='col-lg-4 col-lg-offset-4'>
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    <h1><i class='fa fa-user'></i> Edit User</h1>
 
    {!! Form::model($user, ['role' => 'form', 'url' => '/user/' . $user->id, 'method' => 'PUT']) !!}
 
    <div class='form-group'>
        {!! Form::label('first_name', 'First Name') !!}
        {!! Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('last_name', 'Last Name') !!}
        {!! Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('level', 'Level') !!}
        {!! Form::select('level', array_merge(array($user->level => $user->level),['SUPER'=>'SUPER','MANAGER'=>'MANAGER','STAFF'=>'STAFF']), $user->level) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('photo', 'Photo') !!}
        <img src="{{ asset($user->photo) }}" class="user-image" alt="User Image"/>
        {!! Form::file('photo', ['class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
    </div>
 
    <div class='form-group'>
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
 
    {!! Form::close() !!}
 
</div>
 
@endsection