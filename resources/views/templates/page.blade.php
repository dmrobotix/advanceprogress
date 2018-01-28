<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
  @include('ecogreen-statics.header')
  @yield('maps')
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
            <h2>Words About Us</h2>
            <p>We are ECO Green, Our Mission is save water, animals, power energy, natutre and our environment <br>our activities are taken around the world.</p>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                @yield('load-map')
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="content">
                    <h2>Together we can make a difference</h2>
                    <div class="text">
                        <p>When you give to Our Ecogreen, you know your donation is making a difference. Whether you are supporting one of our Signature Programs or our carefully curated list of Gifts That Give More, our professional staff works hard every day <br>to ensure every dollar has impact for the cause of your choice. </p>
                    </div>
                    <h4>Our Partner</h4>
                    <div class="text">
                        <p>We partner with over 320 amazing projects worldwide, and have given over $150 million in cash and product grants to other groups since 2011. We also operate our own dynamic suite of Signature Programs.</p>
                    </div>
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
