@extends('templates.page')

@section('title')
Donate
@endsection

@section('breadcrumb')
Donate
@endsection

@section('content')


{!! Form::open() !!}
{!! Form::label('amount','How much would you like to donate? ') !!}
<div class="row">
  <div class="col-md-5">
    {!! Form::text('amount-us', null, ['class'=>'form-control','id'=>'amt']) !!}
  </div>
  <div class="col-md-5">
    <div id="stripe"></div>
  </div>
</div>
{!! Form::close() !!}


@endsection
