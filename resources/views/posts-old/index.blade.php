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

  <article>

    <div class="row">
      <h3><a href="{{url('blog/'.$post->permalink)}}">{{ $post->title}}</a></h3>
      <h6>{{ date('F jS Y',strtotime($post->updated_at)) }}</h6>
      <h6>{{ $post->author }}</h6>
    </div>

    <div class="row">
      <div class="col-md-12">
      @if(sizeof($imginfo)!=0)
        @for($i=0;$i < sizeof($imginfo['match']);$i++)
          @php $post->body = str_replace($imginfo['match'][$i],'<div class="img-'.$imginfo['align'][$i].'"><img src="'. url($imginfo['url'][$i]) . '" alt="'.$imginfo['alt'][$i].'" class="img-rounded img-blog-right"><br><div class="caption-blog"><small>'.$imginfo['alt'][$i].'</small></div></div>', $post->body) @endphp
        @endfor
      @endif

      @if(sizeof($linkinfo)!=0)
        @for($i=0;$i < sizeof($linkinfo['match']);$i++)
          @php $post->body = str_replace($linkinfo['match'][$i],'<a href="'. url($linkinfo['href'][$i]) . '" target="_blank">'.$linkinfo['text'][$i].'</a>', $post->body) @endphp
        @endfor
      @endif

      {!! $post->body !!}
    </div>
    </div>
    <div class="row">
      Keywords: 
    @foreach (explode(',',$post->keywords) as $kw)
    <a href="{{ url('blog/keywords/'. str_replace(' ','-', $kw)) }}">{{ $kw }}</a>&nbsp;
    @endforeach

  </div>

  </article>

  @endforeach


<!-- need to test for number of blog entries -->
@if(sizeof($post) !=0)
<nav class="blog-nav">
  @if(sizeof($post) > 5)
  <a href="blog/1">Next</a>
  @endif
</nav>
@endif

@endsection

@section('sub-block-1')
@endsection
