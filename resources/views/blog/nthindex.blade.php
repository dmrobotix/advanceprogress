@extends('templates.main')

@section('heading')
Blog
@endsection

@section('subheading')
BLOG
@endsection

@section('content')
@foreach ($posts as $post)
<!-- need to make this scrollable -->
<section class="blog-main">
  <article>
    <div>
      <h3>{{ $post->updated_at }}</h3>
      <h6>{{ date('F jS Y',strtotime($post->updated_at)) }}</h6>
      <h6>{{ $post->author }}</h6>
    </div>

    <div>
      {{ $post->post }}
    </div>
  </article>
  @endforeach
</section>

<!-- need to test for number of blog entries -->
@if(sizeof($post) !=0)
<nav class="blog-nav">
  @if($total > 0)
  <a href="url{{blog/{$page-1}}}">Previous</a> | <a href="url{{blog/{$page+1}}}">Next</a>
  @endif
</nav>
@endif

@endsection

@section('sub-block-1')
@endsection
