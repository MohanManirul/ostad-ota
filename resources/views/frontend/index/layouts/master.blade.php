<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/Flifgt/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Feb 2024 18:20:09 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Flifgt - Board HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flight Tickets Booking Online</title>
    @include('frontend.index.layouts.css')

</head>


<body>

    <!--=================================
    @include('frontend.index.layouts.header')

    @yield('content')
    
    @include('frontend.index.layouts.footer')

    <!--=================================
Back To Top-->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-angle-up"></i>
    </div>
    <!--=================================
Back To Top-->

    <!--=================================
Signin Modal Popup -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header p-4">
                    <h4 class="mb-0 text-center">Login to Your Account</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-register">
                        <fieldset>
                            <legend class="px-2">Choose your Account Type</legend>
                            <ul class="nav nav-tabs nav-tabs-border d-flex" role="tablist">
                                <li class="nav-item me-4">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#candidate" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-users"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Candidate</h6>
                                                <p class="mb-0">Log in as Candidate</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#employer" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex">
                                            <div class="tab-icon">
                                                <i class="flaticon-suitcase"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="mb-0">Employer</h6>
                                                <p class="mb-0">Log in as Employer</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </fieldset>
                        <div class="tab-content">
                            <div class="tab-pane active" id="candidate" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="Email2">Username / Email
                                                Address:</label>
                                            <input type="text" class="form-control" id="Email22">
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input type="password" class="form-control" id="password32">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Sign In</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0 forgot-pass">
                                                <a href="#">Forgot Password?</a>
                                                <p class="mt-1">Don't have account? <a href="register.html">Sign
                                                        Up here</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="employer" role="tabpanel">
                                <form class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="Email2">Username / Email
                                                Address:</label>
                                            <input type="text" class="form-control" id="Email2">
                                        </div>
                                        <div class="form-group col-12 mb-3">
                                            <label class="form-label" for="password2">Password*</label>
                                            <input type="password" class="form-control" id="password2">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary d-grid" href="#">Sign In</a>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="ms-md-3 mt-3 mt-md-0">
                                                <a href="#">Forgot Password?</a>
                                                <div class="form-check mt-2">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="Remember-02">
                                                    <label class="form-check-label" for="Remember-02">Remember
                                                        Password</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-4">
                            <fieldset>
                                <legend class="px-2">Login or Sign up with</legend>
                                <div class="social-login">
                                    <ul class="list-unstyled d-flex mb-0">
                                        <li class="facebook text-center">
                                            <a href="#"> <i class="fab fa-facebook-f me-3 me-md-4"></i>Login
                                                with Facebook</a>
                                        </li>
                                        <li class="twitter text-center">
                                            <a href="#"> <i class="fab fa-twitter me-3 me-md-4"></i>Login with
                                                Twitter</a>
                                        </li>
                                        <li class="google text-center">
                                            <a href="#"> <i class="fab fa-google me-3 me-md-4"></i>Login with
                                                Google</a>
                                        </li>
                                        <li class="linkedin text-center">
                                            <a href="#"> <i class="fab fa-linkedin-in me-3 me-md-4"></i>Login
                                                with Linkedin</a>
                                        </li>
                                    </ul>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=================================
Signin Modal Popup -->

    <!--=================================
Javascript -->
    @include('frontend.index.layouts.js')

</body>

<!-- Mirrored from themes.potenzaglobalsolutions.com/html/Flifgt/index-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Feb 2024 18:20:12 GMT -->

</html>
