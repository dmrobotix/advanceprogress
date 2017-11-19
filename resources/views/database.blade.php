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

@section('sub-block-2')
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Category</th>
      <th>Summary</th>
    </tr>
  </thead>
  <tbody>
    @if (sizeof($legislation)!=0)
      @foreach($legislation as $l)
      <tr>
        <td>{{$l->mleg_id}}</td>
        <td>{{$l->title_of_model_legislation}}</td>
        <td>{{$l->category}}</td>
        <td><a href="legislation/{{$l->mleg_id }}">{{$l->summary}}</a></td>
      </tr>
      @endforeach
    @else
    No legislation found.
    @endif
  </tbody>
</table>
@endsection
