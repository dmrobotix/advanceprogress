@extends('templates.page')

@section('title')
Donate
@endsection

@section('breadcrumb')
Donate
@endsection

@section('left-side')
Advance Progress aims to be fully grassroots funded. Our goal is to reach 1,800 small donors pledging $5 to $15 per month. This funding source allows us to do our work without being compromised by the corporate money other think tanks rely on. 
@endsection

@section('content')
@if (session('status'))
    <div class="alert alert-info">
        {{ session('status') }}
    </div>
@endif
{!! Form::open() !!}
{!! Form::hidden('test', 'testing') !!}
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
