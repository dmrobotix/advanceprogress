@extends('templates.main')

@section('heading')
Donate
@endsection

@section('subheading')
Help Us
@endsection

@section('content')
@if ($result != 0)
<h1>{{$result}}</h1>
@else
<form action="/donate" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="{{$stripe_key}}"
          data-description="Access for a year"
          data-amount="50.00"
          data-locale="auto"></script>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endif
@endsection
