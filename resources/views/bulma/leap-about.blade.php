
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing - Free Bulma template</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/pages.css')}}">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Starter Template for bulma">
    <meta property="og:description" content="Bulma is a CSS framework based on Flexbox and built with Sass.">
    <meta property="og:site_name" content="Starter Template for bulma">
</head>
<body>
@include('bulma.navmenu')
</body>
<section class="hero is-info is-medium" id ="about">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <h1 class="title">
                    About US
                </h1>
                <h2 class="subtitle">
                    Learn How We can Advance Progress for You
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="section" id ="about">
    <div class="container">
        <div class="heading">
            <h2 class="title is-2">Learn About Us</h2>
            <p class="subtitle is-4">How We Can Help Advance Progress for You</p>
            <hr class ="title-line">
        </div>

        <div class = "project">
            <div class ="columns blue-bg">
                <div class="column">
                    <div class="card" style="height: 100%;">
                        <div class="card-header"><p class="card-header-title">What We Do?</p></div>
                        <div class="card-content">
                            <div class="content">
                                <ul>
                                    <li><strong>Drafting</strong> and creating model legislation implementing our progressive principles </li>
                                    <li><strong>Policy</strong> analysis and research for various progressive policy ideas.</li>
                                    <li><strong>Education</strong> about legislative processes, local government and civics.</li>
                                </ul>
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
                <div class="column">
                    <div class="card" style="height:100%;">
                        <div class="card-header"><p class="card-header-title">Why We Do It?</p></div>
                        <div class="card-content">
                            <div class="content">
                                <ul>
                                    <li><strong>Solving Problems</strong> Activists know the issues, but sometimes need help solving it .</li>
                                    <li><strong>Holding the Powerful Accountable</strong> Legislatures don't work how they are supposed to work</li>
                                    <li><strong>Evening the field</strong> Corporations spend billions, hiring people to draft legislation that works for them.</li>
                                </ul>


                            </div>

                        </div>
                        <br />
                    </div>
                </div>

</section>


