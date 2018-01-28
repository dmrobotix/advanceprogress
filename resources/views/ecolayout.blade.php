<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Advance progress | Advance progress</title>
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

<!--Start rev slider wrapper-->
<section class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>

            <li data-transition="fade">
                <img src="{{ asset('images/Communityeating20481.jpg') }}"  alt="" width="1920" height="888" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

                <div class="tp-caption  tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="top" data-voffset="260"
                    data-transform_idle="o:1;"
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;"
                    data-splitin="none"
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="700">
                    <div class="slide-content-box">
                        <h1>Get Ready</h1>
                        <h3>TO ENACT PROGRESS</h3>
                        <p>by working with us to draft progressive legislation</p>
                    </div>
                </div>
                <div class="tp-caption tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="top" data-voffset="480"
                    data-transform_idle="o:1;"
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                    data-splitin="none"
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="2300">
                    <div class="slide-content-box">
                        <div class="button">
                            <!--<a class="thm-btn" href="#">read more</a>-->
                        </div>
                    </div>
                </div>
                <div class="tp-caption tp-resizeme"
                    data-x="left" data-hoffset="200"
                    data-y="top" data-voffset="480"
                    data-transform_idle="o:1;"
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                    data-splitin="none"
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="2600">
                    <div class="slide-content-box">
                        <div class="button">
                            <!--<a class="thm-btn style-3" href="cause.html">Get Involved</a>-->
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!--End rev slider wrapper-->

<section class="why-chooseus sec-padd3">
    <div class="container">
			<div class="section-title center">
					<h2>We are a group of volunteer lawyers, students, activists,
						veterans and independent media journalists looking to
						<span class="thm-color">develop progressive policy and model
							legislation</span> that will protect working families, the
							environment, minorities and the oppressed.</h2>
			</div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item">
                    <div class="inner-box">
                        <!--icon-box-->
                        <div class="icon_box">
                            <span class="icon-shapes"></span>
                        </div>
                        <a href="3"><h4>Mission</h4></a>
                    </div>
                    <div class="text"><p>To develop progressive policy and model legislation designed to protect and advance the welfare of working families, minorities, underserved communities and the environment at the state and local level.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item">
                    <div class="inner-box">
                        <!--icon-box-->
                        <div class="icon_box">
                            <span class="icon-star"></span>
                        </div>
                        <a href="#"><h4>Vision</h4></a>
                    </div>
                    <div class="text"><p>To make progressive policy and model legislation available for elected representatives and activists at the state and local level.</p></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="item">
                    <div class="inner-box">
                        <!--icon-box-->
                        <div class="icon_box">
                            <span class="icon-people-1"></span>
                        </div>
                        <a href="#"><h4>Values</h4></a>
                    </div>
                    <div class="text"><p>Shared prosperity and equal justice for all.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about sec-padd1">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <figure class="img-box">
                    <img src="images/resource/8.jpg" alt="">
                </figure>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="content">
                    <h2>Our Process</h2>
                    <div class="text">
                        <p>Once you identify a key issue, please get in touch.
						              We can take a look at local ordinances and procedures. We can
						              examine the best policy alternatives and implementation for your
						              community.</p>
                    </div>

                    <div class="link"><button type="button" class="thm-btn style-2" style="margin-top:15px;" data-toggle="modal" data-target="#contact">Contact Us</button></div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="service">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-6 col-x-12">
                <div class="service-item center">
                    <div class="icon-box">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h4>Drafting</h4>
                    <p>Drafting and creating model legislation implementing our progressive principles.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-x-12">
                <div class="service-item center">
                    <div class="icon-box">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h4>Policy</h4>
                    <p>Providing policy analysis and research for various progressive policy ideas.</p>
                </div>
					  </div>
            <div class="col-md-3 col-sm-6 col-x-12">
                <div class="service-item center">
                    <div class="icon-box">
                        <i class="fab fa-leanpub"></i>
                    </div>
                    <h4>Education</h4>
                    <p>Providing a downloadable library of model legislation for your progressive causes locally. </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-x-12">
                <div class="service-item center">
                    <div class="icon-box">
                        <i class="fas fa-download"></i>
                    </div>
                    <h4>Model Legislation</h4>
										<p>Providing a downloadable library of model legislation for your progressive causes locally. </p>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="border-bottom"></div>

@include('ecogreen-statics.footer')

	<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contact">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="contact">Write to Advance Progress</h4>
			</div>
			<div class="modal-body">
				{!! Form::open() !!}
				<div class="form-group">
				{!! Form::label('lb-name', 'Name'); !!}
				{!! Form::text('name', null, ['class' => 'form-control']); !!}
				</div>
				<div class="form-group">
				{!! Form::label('lb-email', 'E-Mail Address'); !!}
				{!! Form::text('email', null, ['class' => 'form-control']); !!}
				</div>
				<div class="form-group">
				{!! Form::label('lb-message', 'Message'); !!}
				{!! Form::textarea('message', null, ['class' => 'form-control']); !!}
				</div>
				{!! Form::hidden('form', 'media'); !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit('Send Message',['class' => 'btn btn-info']); !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	</div>

</div>

</body>
</html>
