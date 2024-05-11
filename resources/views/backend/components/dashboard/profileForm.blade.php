@push('per_page_meta')
    <title>test</title>
@endpush

@push('per_page_css')
<style>
    .password-box {
        position: relative;
    }

    .password-box .hide-password {
        display: none;
    }

    .password-box .fas {
        position: absolute;
        top: 61%;
        right: 15px;
        z-index: 10;
        cursor: pointer;
    }
</style>
@endpush

      <!-- auth page content -->
      <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <p class="text-muted">User Profile</p>
                            </div>
                            <div class="p-2 mt-4">
                               

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" placeholder="User Name" class="form-control" type="text"/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" placeholder="User Email" class="form-control" type="text" readonly/>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input id="phone" placeholder="User Phone" class="form-control" type="text"/>
                                    </div>

                                    <div class="mt-4">
                                        <button onclick="ProfileUpdate()" class="btn btn-success w-100">SUpdate</button>                                       
                                    </div>
                          
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>


@push('per_page_js')

@endpush