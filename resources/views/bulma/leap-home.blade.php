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
    <meta property="og:type" content="website">
    <meta property="og:title" content="Starter Template for bulma">
    <meta property="og:description" content="Bulma is a CSS framework based on Flexbox and built with Sass.">
    <meta property="og:site_name" content="Starter Template for bulma">
</head>
<body>
@include('bulma.navmenu')

<section class="hero is-info is-fullheight" id ="splash">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
                <h1 class="title">
                   The Stateless
                </h1>
                <h2 class="subtitle">
                   American Prisoner's disenfranchisement is a problem. Let's fix it.
                </h2>
                <a href ="{{ url('/project') }}" class="button is-primary">Learn How</a>
            </div>
        </div>
    </div>
</section>
<!--<section class="section">
    <div class="container">
        <div class="heading">
            <h1 class="title">Our Work</h1>
            <h2 class="subtitle">Check out our projects</h2>
            <hr class ="title-line">
        </div>
    </div>
    <div class = "project">
        <div class ="container">
            <div class="container column is-10">
                <div class="section">

                    <div class="card">
                        <div class="card-header"><p class="card-header-title">Let Prisoners Vote</p></div>
                        <div class="card-content">
                            <div class="content">
                                <p>Despite this growing international consensus, however, the United States—the self-proclaimed lighthouse of democracy—significantly abridges the voter franchise. Only in Maine and Vermont can prisoners participate in elections; for the vast majority of the 1.5 million people in federal and state prisons, democracy remains a spectator sport. All told, less than 4,000 prisoners have the right to vote. It is time for this to change
                                </p>

                                <a href ="/project" class="button is-primary">Learn More</a>
                            </div>

                        </div>
                    </div>
                    <br />
                </div>
            </div>

</section> -->

<section class="section">
    <div class="container">
        <div class="heading">
            <h1 class="title">What We Do?</h1>
            <h2 class="subtitle">Draft Policy for the Many, not the few</h2>
            <hr class ="title-line">
        </div>
        <div class = "columns">
            <div class ="column is-primary">
                <h1>Drafting Legislation</h1>
            </div>
            <div class ="column is-primary">
                <h1>Res </h1>
        </div>
    </div>
    </div>
</section>



</body>
</html>



