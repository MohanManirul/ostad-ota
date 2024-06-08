Header -->
<header class="header bg-white">
    <nav class="navbar navbar-static-top navbar-expand-lg header-sticky">
        <div class="container-fluid">
            <button id="nav-icon4" type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target=".navbar-collapse">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img class="img-fluid" src="images/logo.svg" alt="">
            </a>
            <div class="navbar-collapse collapse justify-content-start">
                <ul class="nav navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Home<i class="fas fa-chevron-down fa-xs"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="active"><a class="dropdown-item" href="{{ route('home') }}">Home</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
            <div class="add-listing ">
                <div class=" d-inline-block me-4 ">
                    <a href="login.html" class="btn btn-white btn-sm"><i class="far fa-user pe-2 "></i>Sign in</a>
                </div>
                <a class="btn btn-white btn-sm" href="post-a-flight.html"> <i class="fas fa-plus-circle"></i>Login</a>
            </div>
        </div>
    </nav>
</header>
<!--=================================
Header -->
