<div class="theme-main-menu sticky-menu theme-menu-one">
    <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
            <a href="index.html">
                <img src="{{asset('img/icon.png')}}" alt="" style="width:30%;">
            </a>
        </div>
        <nav id="mega-menu-holder" class="navbar navbar-expand-lg">
            <div  class="nav-container">
                <button class="navbar-toggler">
                    <span></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <div class="d-lg-flex align-items-center">
                        <ul class="navbar-nav">
                            <li class="nav-item position-static {{request()->is('/') ? 'active' : ''}}">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item position-static {{request()->is('about') ? 'active' : ''}}">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item position-static {{request()->is('about') ? 'active' : ''}}">
                                <a class="nav-link" href="#">Service</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Portfolio</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="portfolio-V1.html" class="dropdown-item">Products</a>
                                    </li>
                                    <li>
                                        <a href="portfolio-V2.html" class="dropdown-item">Projects</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item position-static {{request()->is('about') ? 'active' : ''}}">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> 
        </nav>
    </div>
</div>