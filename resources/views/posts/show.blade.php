<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Advance Progress || Blog &mdash; @yield('title')</title>
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
            <h1>Blog Single Post</h1>
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
                    {{ $post->title }}
                </li>
            </ul>
        </div>
    </div>
</div>



<section class="blog-single-post blog-section">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="post-area">
                    <article class="default-blog-news">
                        <figure class="img-holder">
                            <img src="images/blog/l1.jpg" alt="News">
                        </figure>
                        <div class="lower-content">
                            <div class="date">{{ date('F jS Y',strtotime($post->updated_at)) }}</div>
                            <div class="post-meta">{{ $post->author }}</div>
                            <h4>{{ $post->title }}</h4>
                        </div>
                    </article>
                    <div class="content-box">
                        <div class="text">
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

                        <div class="outer-box">

                            <div class="share-box clearfix">
                                <ul class="tag-box pull-left">
                                    <li>Category: </li>
																		@foreach (explode(',',$post->keywords) as $kw)
                                    <li><a href="{{ url('blog/keywords/'. str_replace(' ','-', $kw)) }}">{{ $kw }}</a></li>
																		@endforeach
																		@auth
																      <br><a href="{{ url("blog/{$post->permalink}/edit") }}">Edit</a>
																    @endauth
                                </ul>
                                <div class="social-box pull-right">
                                <span>Share <i class="fa fa-share-alt"></i></span>
                                <ul class="list-inline social">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-3 col-sm-12">
                <div class="blog-sidebar sec-padd">

                    <div class="popular_news">
                        <div class="section-title style-2">
                            <h4>recent post</h4>
                        </div>

                        <div class="popular-post">
													@if(sizeof($posts) > 3)
													@php $max = 4 @endphp
													@else
													@php $max = sizeof($posts) @endphp
													@endif
													@for($index = 0; $index < $max; $index++)
                            <div class="item">
                                <div class="post-thumb"><a href="{{url('blog/'.$posts[$index]->permalink)}}"><img src="images/blog/thumb3.jpg" alt=""></a></div>
                                <a href="{{url('blog/'.$posts[$index]->permalink)}}"><h4>{{ $posts[$index]->title}}</h4></a>
                                <div class="post-info"><i class="fa fa-calendar"></i>{{ date('F jS Y',strtotime($posts[$index]->updated_at)) }}</div>
                            </div>
													@endfor
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@include('ecogreen-statics.footer')

</div>

</body>
</html>
