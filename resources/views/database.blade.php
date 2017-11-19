@extends('templates.main')

@section('heading')
Model Legislation
@endsection

@section('subheading')
Database
@endsection

@section('content')
A list of our stored legislation.
@endsection

@section('content2')
<table class="table">
  <caption>A list of our stored legislation.</caption>
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Category</th>
      <th>Text</th>
      <th>Summary</th>
    </tr>
  </thead>
  <tbody>
    @foreach($legislation as $l)
    <tr>
      <td>{{$l->mleg_id}}</td>
      <td>{{$l->title_of_model_legislation}}</td>
      <td>{{$l->category}}</td>
      <td>{{$l->text_of_model_legislation}}</td>
      <td>{{$l->summary}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

@section('sub-block-2')
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Category</th>
      <th>Text</th>
      <th>Summary</th>
    </tr>
  </thead>
  <tbody>
    @foreach($legislation as $l)
    <tr>
      <td>{{$l->mleg_id}}</td>
      <td>{{$l->title_of_model_legislation}}</td>
      <td>{{$l->category}}</td>
      <td>{{$l->text_of_model_legislation}}</td>
      <td>{{$l->summary}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
