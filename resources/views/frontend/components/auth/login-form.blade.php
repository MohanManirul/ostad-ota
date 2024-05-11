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

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="text-primary">Student Login</h5>
                            </div>
                            <div class="p-2 mt-2">
                               

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" placeholder="User Email" class="form-control" type="email"/>
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                        </div>
                                        <div class="form-group form-focus password-box">
                                            <label for="email" class="form-label">Password</label>
                                            <i id="show-password" class="fas fa-eye show-password"></i>
                                            <i class="fas fa-eye-slash hide-password"></i>
                                            <input type="password" class="form-control floating" name="password" id="password-field">
                                           
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        {{-- <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Next</button> --}}
                                        <button onclick="SubmitLogin()" class="btn btn-success w-100">Sign In</button>                                       
                                    </div>
                                   

                                    <div class="mt-4 text-center">
                                        
                                        <div>
                                            <span class="fs-13 mb-4 title">Sign In with</span>
                                            <button  class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                            <button  class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                            <button  class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                            <button  class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                        </div>
                                       
                                    </div>
                          
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Don't have an account ? <a href="{{ route('RegistrationPage') }}" class="fw-bold text-primary text-decoration-underline"> Signup </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->


@push('per_page_js')


<script>

    async function SubmitLogin() {

        try{
            let email=document.getElementById('email').value;
            let password=document.getElementById('password-field').value;
            
            if(email.length===0){
                errorToast("Email is required");
            }
            else if(password.length===0){
                errorToast("Password is required");
            }
            else{
  
                let PostBody = {
                    "email" : email,
                    "password" : password
                }

                // alert(PostBody.password);
                showLoader();
                let res = await axios.post(`/student/do-login`,PostBody);               
              
                // alert(res.data['msg']);
                hideLoader()

                
                if(res.status===200 && res.data['msg']==='success'){
                
                    successToast(res.data['msg']);
                    if(sessionStorage.getItem("last_location")){
                        window.location.href=sessionStorage.getItem("last_location")
                    }else{
                       //wait 2 second for display success message
                    
                        setTimeout(() => {
                            window.location.href =`/student/dashboard`;                   
                        }, 2000); 
                    }
                    
                }
                else{
                    errorToast(res.data['error']);
                }
            } 
        }catch(e){ 
            
            errorToast(e.response.data.message);               
            unauthorized(e.response.status)
        }
       
                
    }
    
</script>


<script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>

<script>
    $(".show-password").click(function () {
      
        let $this = $(this)
        $this.closest(".password-box").find("#password-field").attr("type", "text")
        $this.closest(".password-box").find(".show-password").hide()
        $this.closest(".password-box").find(".hide-password").show()
    })

    $(".hide-password").click(function () {
        let $this = $(this)
        $this.closest(".password-box").find("#password-field").attr("type", "password")
        $this.closest(".password-box").find(".show-password").show()
        $this.closest(".password-box").find(".hide-password").hide()
    })

</script>

@endpush