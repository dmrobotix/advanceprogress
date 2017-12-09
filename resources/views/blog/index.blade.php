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
      <h3>{{ $post->title}}</h3>
      <h6>{{ $post->updated_at }}</h6>
      <h6>{{ $post->author }}</h6>
    </div>

    <div>
      {{ $post->post }}
    </div>
  </article>
  @endforeach
</section>

<!-- need to test for number of blog entries -->
<nav class="blog-nav">
  Previous | Next
</nav>
@endsection

@section('sub-block-1')
@endsection
