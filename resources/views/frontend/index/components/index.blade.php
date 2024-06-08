    {{-- Banner --}}
    <section class="position-relative">
        <div class="banner bg-holder bg-overlay-black-20 text-dark"
            style="background-image: url(images/2.jpg); height:100vh width:100%">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-12 text-start position-relative">
                        <h1 class="text-dark"><span class="text-white"> Welcome to ShareTrip!
                            </span> </h1>
                        <p class="lead mb-4 mb-lg-5 fw-normal text-white">Find Flights, Hotels, Visa & Holidays </p>
                        <div class="flight-search-field">
                            <div class="flight-search-item">

                                <div class="form-group  flight-search-trip d-flex align-items-center p-1 mb-1">

                                    <span class="d-flex align-items-center me-4">
                                        <input type="radio" id="oneWay" name="trip">
                                        <label for="oneWay" class="ms-1">One Way</label>
                                    </span>
                                    <span class="d-flex align-items-center me-4"><input type="radio" id="round"
                                            name="trip">
                                        <label for="round" class="ms-1">Round Trip</label>
                                    </span>

                                    <span class="d-flex align-items-center me-4">
                                        <input type="radio" id="multi" name="trip" class="pe-2">
                                        <label for="multi" class="ms-1">Multi City</label>
                                    </span>


                                </div>

                                <form class="form row p-1 mb-1">
                                    <div class="col-lg-3">
                                        <div class="form-group p-1">
                                            <div class="d-flex">
                                                <label for="from" class="form-label">From</label>

                                            </div>
                                            <div class="position-relative right-icon">

                                                <select name="from" id="from" type="text"
                                                    class="form-control" name="flight_title"
                                                    placeholder="Town, city or postcode">
                                                    <option value="dhaka">Dhaka</option>
                                                    <option value="cox'sBazar">Cox's Bazar</option>
                                                    <option value="newYork">New York</option>
                                                    <option value="dazhou">Dazhou</option>
                                                    <option value="saranac">Saranac</option>
                                                    <option value="chittagong">Chittagong</option>

                                                </select>

                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group p-1">
                                            <div class="d-flex">
                                                <label for="where" class="form-label">Where</label>

                                            </div>
                                            <div class="position-relative right-icon">

                                                <select name="where" id="where" class="form-control"
                                                    name="flight_title" placeholder="Town, city or postcode">
                                                    <option value="dhaka">Dhaka</option>
                                                    <option value="cox'sBazar">Cox's Bazar</option>
                                                    <option value="newYork">New York</option>
                                                    <option value="dazhou">Dazhou</option>
                                                    <option value="saranac">Saranac</option>
                                                    <option value="chittagong">Chittagong</option>

                                                </select>

                                            </div>




                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group m-1">
                                            <div class="d-flex">
                                                <label class="form-label">Date</label>

                                            </div>
                                            <div class="position-relative right-icon">
                                                <input type="date" class="form-control p-2" name="flight_date"
                                                    placeholder="11/06/2024-14/06/2024">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-12">
                                        <div class="form-group form-action ">
                                            <a href="{{ route('flight-list') }}" type="submit"
                                                class="btn bg-primary btn-sm"><i class="fas fa-search"></i>
                                                Find flights</a>
                                        </div>
                                    </div>
                                </form>

                                <div class="form-group  flight-search-trip d-flex align-items-center p-1">

                                    <span class="d-flex align-items-center me-4">
                                        <input type="radio" id="regular" name="fare">
                                        <label for="regular" class="ms-1">Regular Fare</label>
                                    </span>
                                    <span class="d-flex align-items-center me-4"><input type="radio" id="student"
                                            name="fare">
                                        <label for="student" class="ms-1">Student Fare</label>
                                    </span>



                                </div>
                            </div>
                        </div>
                        <div class="flight-tag mt-4">
                            <ul class="">
                                <li class="text-white">Trending Keywords :</li>
                                <li><a href="#">Automotive,</a></li>
                                <li><a href="#">Education,</a></li>
                                <li><a href="#">Health and Care Engineering</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="banner-shape" xmlns="http://www.w3.org/2000/svg" width="100%" height="100"
            viewBox="0 0 1920 100">
            <path class="cls-1" fill="#ffffff" d=" M0,80S480,0,960,0s960,80,960,80v20H0V80Z" />
        </svg>
    </section>
    <!--==== Banner -->

    <!--====Browse-flight -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="browse-flight d-flex">
                        <h3 class="mb-3">Browse flights</h3>
                        <div class="justify-content-center flex-fill">
                            <ul class="nav nav-tabs nav-tabs-02 justify-content-center d-flex mb-3 mb-md-0"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Industry</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Department</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact"
                                        role="tab" aria-controls="contact" aria-selected="false">Location</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flight-found mb-3">
                            <span class="badge badge-lg bg-primary">24123</span>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row mt-4 mt-md-5">
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Accountancy</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Apprenticeships</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Banking</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Charity &amp; Voluntary</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Construction &amp; Property</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Customer Service</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Education</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Energy</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Engineering</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Estate Agency</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Financial Services</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">FMCG</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">General Insurance</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Graduate Training &amp; Internships</h6>
                                                    <span class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Health &amp; Medicine</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Hospitality &amp; Catering</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Human Resources</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">IT &amp; Telecoms</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Legal</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Leisure &amp; Tourism</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Manufacturing</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Marketing &amp; PR</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Media, Digital &amp; Creative</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Motoring &amp; Automotive</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Public Sector</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Purchasing</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Retail</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Scientific</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Security &amp; Safety</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Strategy &amp; Consultancy</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mt-4 mt-md-5">
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Manufacturing</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Marketing &amp; PR</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Media, Digital &amp; Creative</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Motoring &amp; Automotive</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Public Sector</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Purchasing</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Retail</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Scientific</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Security &amp; Safety</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Strategy &amp; Consultancy</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Accountancy</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Apprenticeships</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Banking</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Charity &amp; Voluntary</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Construction &amp; Property</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Customer Service</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Education</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Energy</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Engineering</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Estate Agency</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Financial Services</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">FMCG</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">General Insurance</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Graduate Training &amp; Internships</h6>
                                                    <span class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Health &amp; Medicine</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Hospitality &amp; Catering</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Human Resources</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">IT &amp; Telecoms</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Legal</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Leisure &amp; Tourism</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mt-4 mt-md-5">
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Wellesley Rd, London</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Needham, MA</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">New Castle, PA</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Park Avenue, Mumbai</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Green Lanes, London</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Ormskirk Rd, Wigan</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Taunton, London</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Botchergate, Carlisle</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Paris, Île-de-France</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Union St, New Delhi</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 border-end mb-3 mb-md-0">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Canyon Village, Ramon</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Fairfield Dr, Granger</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Lynch Lane, Weymouth</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Burry Port, Surat</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">North Miles Street Glasgow</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Lafayette Lane PA</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Mayfair Ave. Astoria, NY</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">South St. Edison, NJ</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Ohio Drive Huntsville, AL</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Salisbury, MD</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="category-style-02">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#">
                                                    <h6 class="category-title">Eastpointe, MI</h6> <span
                                                        class="category-count">32761</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Hanover Street Annapolis</h6> <span
                                                        class="category-count">23703</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Tanglewood Rd. Joliet, IL</h6> <span
                                                        class="category-count">20321</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Valley Stream, NY</h6> <span
                                                        class="category-count">9042</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Walt Whitman St. MA</h6> <span
                                                        class="category-count">5728</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">301 Glenlake St. NC</h6> <span
                                                        class="category-count">5578</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Young Ave. Bridgeport, CT</h6> <span
                                                        class="category-count">4399</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">2 Maiden St. OH</h6> <span
                                                        class="category-count">3350</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Surrey Avenue Euless, TX</h6> <span
                                                        class="category-count">2948</span>
                                                </a></li>
                                            <li><a href="#">
                                                    <h6 class="category-title">Branch Dr. Odenton, MD</h6> <span
                                                        class="category-count">2638</span>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===   Browse-flight -->
    <!--===== Browse listing  -->
    <section class="space-ptb bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="browse-flight d-flex">
                        <h3 class="mb-3">Browse Listing </h3>
                        <div class="justify-content-center flex-fill">
                            <ul class="nav nav-tabs nav-tabs-02 justify-content-center d-flex mb-3 mb-md-0"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="flights-tab" data-bs-toggle="tab" href="#flights"
                                        role="tab" aria-controls="flights" aria-selected="true">Latest
                                        flights</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Resumes-tab" data-bs-toggle="tab" href="#Resumes"
                                        role="tab" aria-controls="Resumes" aria-selected="false">Latest
                                        Resumes</a>
                                </li>
                            </ul>
                        </div>
                        <div class="flight-found mb-3">
                            <span class="badge badge-lg bg-primary">24123</span>
                            <h6 class="ms-3 mb-0">flight Found</h6>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="flights" role="tabpanel"
                            aria-labelledby="flights-tab">
                            <div class="row">
                                <div class="col-lg-12 mb-4 mb-sm-0">
                                    <div class="flight-list">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/17.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Marketing and
                                                            Communications</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Fast Systems Consultants</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Wellesley Rd,
                                                            London</li>
                                                        <li><i class="fas fa-filter pe-1"></i>Automotive flights</li>
                                                        <li><a class="freelance" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Freelance</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>1M
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4 mb-sm-0">
                                    <div class="flight-list">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/18.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Payroll and Office
                                                            Administrator</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Pendragon Green Ltd</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Needham, MA</li>
                                                        <li><i class="fas fa-filter pe-1"></i>IT & Telecoms</li>
                                                        <li><a class="part-time" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Part-time</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>1H
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-0 mb-sm-0">
                                    <div class="flight-list">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/19.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Data Entry
                                                            Administrator</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Wight Sound Hearing LLC</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>New Castle, PA
                                                        </li>
                                                        <li><i class="fas fa-filter pe-1"></i>Banking</li>
                                                        <li><a class="temporary" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Temporary</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>2D
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Resumes" role="tabpanel" aria-labelledby="Resumes-tab">
                            <div class="row">
                                <div class="col-lg-12 mb-4 mb-sm-0">
                                    <div class="flight-list">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/14.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Receptionist
                                                            Office
                                                            Administrator</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Tan Electrics Ltd</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Park Avenue,
                                                            Mumbai</li>
                                                        <li><i class="fas fa-filter pe-1"></i>Charity & Voluntary</li>
                                                        <li><a class="freelance" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Full-time</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>3M
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-4 mb-sm-0">
                                    <div class="flight-list">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/15.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Payroll and Office
                                                            Administrator</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Fleet Home Improvements
                                                                Pvt</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Green Lanes,
                                                            London</li>
                                                        <li><i class="fas fa-filter pe-1"></i>Accountancy (Qualified)
                                                        </li>
                                                        <li><a class="part-time" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Part-Time</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>6D
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="flight-list ">
                                        <div class="flight-list-logo">
                                            <img class="img-fluid" src="images/svg/16.svg" alt="">
                                        </div>
                                        <div class="flight-list-details">
                                            <div class="flight-list-info">
                                                <div class="flight-list-title">
                                                    <h5 class="mb-0"><a href="flight-detail.html">Personal Shopping
                                                            Receptionist</a></h5>
                                                </div>
                                                <div class="flight-list-option">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <span>via</span>
                                                            <a href="employer-detail.html">Bright Sparks PLC</a>
                                                        </li>
                                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Botchergate,
                                                            Carlisle</li>
                                                        <li><i class="fas fa-filter pe-1"></i>Customer Service</li>
                                                        <li><a class="part-time" href="#"><i
                                                                    class="fas fa-suitcase pe-1"></i>Part-Time</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flight-list-favourite-time">
                                            <a class="flight-list-favourite order-2" href="#"><i
                                                    class="far fa-heart"></i></a>
                                            <span class="flight-list-time order-1"><i class="far fa-clock pe-1"></i>1W
                                                ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 justify-content-center d-flex mt-4 mt-md-5">
                        <a class="btn btn-primary btn-lg" href="#">View More flights</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===== Browse-flight -->

    <!--=========flight-list -->
    <section class="space-ptb bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-02 text-center">
                        <h2 class="text-white ">Easiest Way to Use</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="step-number"><span>01</span></div>
                        <div class="feature-info-icon step-01">
                            <img class="img-fluid" src="images/step/01.png" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Browse flights</h5>
                            <p class="text-white mb-0">Create an account and access your saved settings on any device.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="step-number"><span>02</span></div>
                        <div class="feature-info-icon step-02">
                            <img class="img-fluid" src="images/step/02.png" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Find Your Vacancy</h5>
                            <p class="text-white mb-0">Don't just find. Be found. Put your CV in front of great
                                employers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-step feature-step-01 text-center">
                        <div class="step-number"><span>03</span></div>
                        <div class="feature-info-icon step-03">
                            <img class="img-fluid" src="images/step/03.png" alt="">
                        </div>
                        <div class="feature-info-content">
                            <h5 class="text-primary">Submit Resume</h5>
                            <p class="text-white mb-0">Your next career move starts here. Choose flight from thousands
                                of
                                companies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-02 text-center">
                        <h2>Top Companies</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="employers-grid mb-4 mb-lg-0">
                        <div class="employers-list-logo">
                            <img class="img-fluid" src="images/svg/01.svg" alt="">
                        </div>
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0"><a href="employer-detail.html">Trophy and Sons</a></h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Green Lanes, London</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-sm btn-primary" href="#">25 Open Position</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="employers-grid mb-4 mb-lg-0">
                        <div class="employers-list-logo">
                            <img class="img-fluid" src="images/svg/02.svg" alt="">
                        </div>
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0"><a href="employer-detail.html">Rippin LLC</a></h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Park Avenue, Mumbai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-sm btn-primary" href="#">20 Open Position</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="employers-grid mb-4 mb-md-0">
                        <div class="employers-list-logo">
                            <img class="img-fluid" src="images/svg/03.svg" alt="">
                        </div>
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0"><a href="employer-detail.html">Lawn Hopper</a></h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Needham, MA</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-sm btn-primary" href="#">35 Open Position</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="employers-grid">
                        <div class="employers-list-logo">
                            <img class="img-fluid" src="images/svg/04.svg" alt="">
                        </div>
                        <div class="employers-list-details">
                            <div class="employers-list-info">
                                <div class="employers-list-title">
                                    <h5 class="mb-0"><a href="employer-detail.html">Trout Design Ltd</a></h5>
                                </div>
                                <div class="employers-list-option">
                                    <ul class="list-unstyled">
                                        <li><i class="fas fa-map-marker-alt pe-1"></i>Wellesley Rd, London</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="employers-list-position">
                            <a class="btn btn-sm btn-primary" href="#">30 Open Position</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Companies -->

    <!--Testimonial-item-02 -->
    <section class="bg-light space-ptb overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-02 text-center">
                        <h2>Clients Say About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-7">
                    <div class="owl-carousel testimonial-center owl-nav-bottom-center" data-nav-arrow="false"
                        data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1"
                        data-space="0" data-autoheight="true">
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-content">
                                    <p><i class="fas fa-quote-left quotes"></i>The Flifgt database has been one of our
                                        current sources for recruitment, backed by a very experienced team who would go
                                        out of their way to make sure that requests are taken ahead. </p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="images/avatar/01.jpg"
                                            alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Michael Bean</h6>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-content">
                                    <p><i class="fas fa-quote-left quotes"></i>Portal is very user-friendly in terms of
                                        searching for resumes and flight postings. Also, they have an excellent database
                                        to
                                        search for resumes. As far as services are involved, it's terrific! </p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="images/avatar/02.jpg"
                                            alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Anne Smith</h6>
                                        <span>Project Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-item-02">
                                <div class="testimonial-content">
                                    <p><i class="fas fa-quote-left quotes"></i>Flifgt is an excellent flight portal. We
                                        value the resumes received through this channel. Magic Search and Power search
                                        are handy tools. We are delighted with their service.</p>
                                </div>
                                <div class="testimonial-author">
                                    <div class="testimonial-avatar avatar avatar-lg">
                                        <img class="img-fluid rounded-circle" src="images/avatar/04.jpg"
                                            alt="">
                                    </div>
                                    <div class="testimonial-name">
                                        <h6 class="mb-1">Felica Queen</h6>
                                        <span>Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial-item-02 -->

    <!-- Why You Choose -->
    <section class="space-ptb">
        <div class="container">
            <div class="row align-self-center">
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="section-title-02">
                                <h2>Why You Choose flight Among Other flight Site?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="feature-info mb-4">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-team"></i>
                                    </div>
                                    <div class="feature-info-content">
                                        <h5 class="text-black mb-3">Best talented people</h5>
                                        <p>If success is a process with a number of defined steps.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="feature-info mb-4">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-chat"></i>
                                    </div>
                                    <div class="feature-info-content">
                                        <h5 class="text-black mb-3">Easy to communicate</h5>
                                        <p>Having clarity of purpose and a clear picture of what you desire.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="feature-info mb-lg-0 mb-4">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-flight-3"></i>
                                    </div>
                                    <div class="feature-info-content">
                                        <h5 class="text-black mb-3">Easy to find candidate</h5>
                                        <p>Introspection is the trick. Understand what you want.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="feature-info mb-lg-0 mb-4">
                                    <div class="feature-info-icon mb-3">
                                        <i class="flaticon-flight-2"></i>
                                    </div>
                                    <div class="feature-info-content">
                                        <h5 class="text-black mb-3">Global recruitment option</h5>
                                        <p>There are basically six key areas to higher achievement.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div>
                        <img class="img-fluid rounded" src="images/about/about-09.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Why You Choose -->

    <!--Flifgt-Counter -->
    <section class="bg-dark">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter my-4">
                        <div class="counter-icon">
                            <i class="flaticon-curriculum"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer text-white" data-to="1227" data-speed="10000">1227</span>
                            <label class="mb-0 text-white">flights Posted</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter my-4">
                        <div class="counter-icon">
                            <i class="flaticon-resume"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="123" data-speed="10000">123</span>
                            <label class="mb-0 text-white">flights Filled</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter my-4">
                        <div class="counter-icon">
                            <i class="flaticon-suitcase"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="170" data-speed="10000">170</span>
                            <label class="mb-0 text-white">Companies</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter my-4">
                        <div class="counter-icon">
                            <i class="flaticon-users"></i>
                        </div>
                        <div class="counter-content">
                            <span class="timer mb-1 text-white" data-to="127" data-speed="10000">127</span>
                            <label class="mb-0 text-white">Members</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Flifgt-Counter -->

    <!--Blog -->
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title-02 text-center">
                        <h2>News, Tips & Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="blog-post text-center">
                        <div class="blog-post-image">
                            <img class="img-fluid" src="images/blog/01.jpg" alt="">
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-details">
                                <div class="blog-post-category">
                                    <a class="mb-1" href="#">Recruitment</a>
                                </div>
                                <div class="blog-post-title">
                                    <h5><a href="#">How women can push for pay equality</a></h5>
                                </div>
                            </div>
                            <div class="blog-post-footer pb-4 pb-lg-0">
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-clock"></i>20 Jan 2020</a>
                                </div>
                                <div class="blog-post-author">
                                    <span>By<a href="#"><img src="images/avatar/01.jpg" alt="">John
                                            Doe</a></span>
                                </div>
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-comment"></i>(3)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-lg-0 mb-4">
                    <div class="blog-post text-center">
                        <div class="blog-post-image">
                            <img class="img-fluid" src="images/blog/02.jpg" alt="">
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-details">
                                <div class="blog-post-category">
                                    <a class="mb-1" href="#">Advice</a>
                                </div>
                                <div class="blog-post-title">
                                    <h5><a href="#">How to sell yourself in a flight interview</a></h5>
                                </div>
                            </div>
                            <div class="blog-post-footer pb-4 pb-lg-0">
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-clock"></i>25 March 2020</a>
                                </div>
                                <div class="blog-post-author">
                                    <span>By <a href="#"><img src="images/avatar/02.jpg" alt="">Alice
                                            Williams</a></span>
                                </div>
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-comment"></i>(2)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-post text-center">
                        <div class="blog-post-image">
                            <img class="img-fluid" src="images/blog/03.jpg" alt="">
                        </div>
                        <div class="blog-post-content">
                            <div class="blog-post-details">
                                <div class="blog-post-category">
                                    <a class="mb-1" href="#">Career</a>
                                </div>
                                <div class="blog-post-title">
                                    <h5><a href="#">flight interview tips for older workers</a></h5>
                                </div>
                            </div>
                            <div class="blog-post-footer pb-0">
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-clock"></i>30 March 2020</a>
                                </div>
                                <div class="blog-post-author">
                                    <span>By<a href="#"><img src="images/avatar/03.jpg" alt="">Paul
                                            Flavius</a></span>
                                </div>
                                <div class="blog-post-time">
                                    <a href="#"><i class="far fa-comment"></i>(5)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
