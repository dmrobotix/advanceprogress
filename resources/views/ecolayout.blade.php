<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Advance progress | Advance progress</title>
	@include('ecogreen-statics.header')
</head>
<body>

@include('ecogreen-statics.thememenu')

<!-- Start Hero Wrapper> -->
	<header id="hero-intro">
	  <div id="hero-content">
	    <h1>Get Ready to Advance Progress</h1>
	    <h3>Help Us Win the Fight locally</h3>
	    <a href="#" class="button">Join Us</a>
	  </div>

</header>
<!--End hero Wrapper-->
<section class ="new-stuff">
 <h1> Our Latest Project </h1>


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
