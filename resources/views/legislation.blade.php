<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Advance progress | Advance progress</title>
	@include('ecogreen-statics.header')
</head>
<body>


<section class="theme_menu ">
    <div class="container">
        <div class="row">
					@include('ecogreen-statics.thememenu')
        </div>
   </div>
</section>
@if (sizeof($legislation)!=0)
  @foreach($legislation as $l)
  <tr>
    <td>{{$l->mleg_id}}</td>
    <div class ="title"> {$l->title_of_model_legislation}}
      <p>{$l->summary}}
  </tr>
  @endforeach
@else
<section class ="legislation">

  </div>
  <div class = "summary">
  </div>
   {$l->category}}
