<div class="col-md-3">
    <div class="main-logo">
        <a href="{{ url('/') }}"><img src="{{ url('images/leaplogo-notext-625px.png') }}" alt=""></a>
    </div>
</div>
<div class="col-md-9 menu-column">
    <nav class="menuzord" id="main_menu">
       <ul class="menuzord-menu">
            @guest
            <li><a href="{{ url('/') }}">Home</a></li>
            @else
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="/database">Our Database</a></li>
            <li><a href="/donate">Donate</a></li>
            <li><a href="/about">About Us</a></li>
            <li><a href="/resources">Resources</a></li>
            <li><a href="{{ url('/services')}}">Services</a>
                <ul class="dropdown">
                  <li><a href="{{url('/map')}}">Map</a>
                </ul>
            </li>
            @endguest
        </ul>
    </nav>
</div>
<div class="right-column">
    <div class="right-area">
        <div class="nav_side_content">
          @guest
          @else
            <div class="search_option">
                <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
                <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                    <input type="text" placeholder="Search...">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
           </div>
           @endguest
       </div>
    </div>
</div>
