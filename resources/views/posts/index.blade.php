<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Advance Progress || Blog</title>
  @include('ecogreen-statics.header')
</head>
<body>

<div class="boxed_wrapper">


<div class="top-bar">
    <div class="container">
        <div class="clearfix">
          @include('ecogreen-statics.topbar')
        </div>


    </div>
</div>

<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
          @include('ecogreen-statics.thememenu')
        </div>
   </div>
</section>




<div class="inner-banner has-base-color-overlay text-center" style="background: url(images/background/4.jpg);">
    <div class="container">
        <div class="box">
            <h1>Advance Progress &mdash; Blog</h1>
        </div>
    </div>
</div>
<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <ul class="list-inline link-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('/blog') }}">blog</a>
                </li>

                <li>
                    All Posts
                </li>
            </ul>
        </div>
    </div>
</div>



<section class="all-blog blog-section sec-padd">
    <div class="container">
        <div class="row" id="posts-grid">
          @if (sizeof($posts) > 8)
          @php $max = 9 @endphp
          @else
          @php $max = sizeof($posts) @endphp
          @endif
          @for($index = 0; $index < $max; $index++)
            <article class="col-md-3 col-sm-6 col-xs-12">
                <div class="default-blog-news wow fadeInUp animated animated" style="visibility: visible; animation-name: fadeInUp;">
                    <figure class="img-holder">
                        <a href="{{url('blog/'.$posts[$index]->permalink)}}"><img src="images/blog/1.jpg" alt="News"></a>
                        <figcaption class="overlay">
                            <div class="box">
                                <div class="content">
                                    <a href="blog-details.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                    <div class="lower-content">
                        <div class="date">{{ date('F jS Y',strtotime($posts[$index]->updated_at)) }}</div>
                        <div class="post-meta">{{ $posts[$index]->author }}</div>
                        <a href="{{url('blog/'.$posts[$index]->permalink)}}"><h4>{{ $posts[$index]->title}}</h4></a>
                        <div class="text">
                          {!! $posts[$index]->summary !!}
                        </div>
                    </div>
                </div>

            </article>
            @endfor


        </div>
      @if(sizeof($posts) > 8)
        @php $total = floor(sizeof($posts) / 4) @endphp
        @if($total > 5)
        @php $total = 5 @endphp
        <ul class="page_pagination center" id="blog-grid-nav">
        <!--<li><a href="#" class="tran3s"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>-->
        <li><a href="#" class="active tran3s">1</a></li>
          @for($pagenum = 1; $pagenum <= $total; $pagenum++)
         <li><a href="#" class="tran3s">{{ $pagenum }}</a></li>
         @endfor
        <li><a href="#" class="tran3s"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        </ul>
        @else
        <ul class="page_pagination center" id="blog-grid-nav">
            <li><a href="#" class="active tran3s">1</a></li>
            @for($pagenum = 1; $pagenum <= $total; $pagenum++)
            <li><a href="#" class="tran3s">{{ $pagenum }}</a></li>
            @endfor
        </ul>
        @endif
      @endif
    </div>
</section>

@include('ecogreen-statics.footer')

</div>

</body>
</html>
