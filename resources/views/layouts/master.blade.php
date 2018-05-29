<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @include('bulma.leap-includes')
</head>
<body>
@include('bulma.navmenu')
<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                @yield('page-title')
            </h1>
            <h2 class="subtitle">
                @yield('page-subtitle')
            </h2>
        </div>
    </div>
</section>



@yield('main-content')


</body>

</html>