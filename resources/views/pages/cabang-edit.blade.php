@extends('app')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/cabang"><i class="fa fa-share-alt"></i>Master Cabang</a></li>
    <li class="active">Edit</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h1><i class='fa fa-share-alt'></i>Edit Cabang</h1>
                <hr>
            </div>
            <div class="box-body" width="50%">
            @if ($errors->has())
                @foreach ($errors->all() as $error)
                <div class='bg-danger alert'>{!! $error !!}</div>
                @endforeach
            @endif

            {!! Form::open(['role' => 'form', 'url' => '/cabang/edit/'.$cabang->idcabang]) !!}

                <div class='form-group'>
                    {!! Form::label('nama', 'Nama') !!}
                    {!! Form::text('nama', $cabang->nama, ['placeholder' => 'Nama', 'class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('alamat', 'Alamat') !!}
                    {!! Form::text('alamat', $cabang->alamat, ['placeholder' => 'Alamat Cabang', 'class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('telp', 'Telephone') !!}
                    {!! Form::text('telp', $cabang->telp, ['placeholder' => 'Telephone Cabang', 'class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $('input[name="telp"]').inputmask("999[9] 9999-999[99]");
</script>
@endsection