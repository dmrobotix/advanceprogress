<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
  @include('ecogreen-statics.header')
  @yield('maps')
</head>
<body>


	@include('bulma.navmenu')





<div class="breadcumb-wrapper">
    <div class="container">
        <div class="pull-left">
            <ul class="list-inline link-list">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li>
                    @yield('breadcrumb')
                </li>
            </ul>
        </div>
        <div class="pull-right">

        </div>
    </div>
</div>


<section class="about sec-padd2">
    <div class="container">
        <div class="section-title center">
					@yield('center')
				 </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                @yield('left-side')
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="content">
									@yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
<div class="border-bottom"></div>
@include('ecogreen-statics.footer')
</div>

</body>
</html>
