
@push('per_page_css')
    <style>
        .float-start,
        .float-end {
            display: inline-block;
            width: 50%; /* Adjust the width as needed */
        }

        .float-start {
            text-align: left;
        }

        .float-end {
            text-align: right;
        }
    </style>
@endpush


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    
                    <h4>Sign Up</h4> 
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">

                            <!--- email --->
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="Email" class="form-control" type="email"/>
                            </div>

                            <!--- mobile number --->
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label><span class="require-span">*</span>
                                <input id="mobileNumber" placeholder="Mobile Number" class="form-control" type="text"/>
                            </div>   

                            <!--- pawssword --->
                            <div class="col-md-4 p-2">
                                <label>Password</label><span class="require-span">*</span>
                                <input id="password" placeholder="Password" class="form-control" type="password"/>
                            </div>

                            <!--- confirm pawssword --->
                            <div class="col-md-4 p-2">
                                <label>Confirm Password</label><span class="require-span">*</span>
                                <input id="cpassword" placeholder="Confirm Password" class="form-control" type="password"/>
                            </div>

                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn btn-success mt-3 w-100">Complete</button>
                            </div>
                            <label for="">Wait I've an Account !<a href="{{ route('loginPage') }}"><span class="badge bg-warning text-dark">Login</span></a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('per_page_js')    

    <script>


    async function onRegistration() {

            try{
                let email = document.getElementById('email').value;
                let mobileNumber = document.getElementById('mobileNumber').value;
                let password = document.getElementById('password').value;
                let cpassword = document.getElementById('cpassword').value;
                
                if(email.length===0){
                errorToast('Email is required')
                }
                else if(mobileNumber.length===0){
                    errorToast('Mobile Number is required')
                }
                else if(password.length===0){
                    errorToast('Password is required')
                }
                else if(cpassword.length===0){
                    errorToast('Confirm Password is required')
                }
                else if(password !== cpassword){
                    errorToast("Confirm Password is do't match ")
                }
             
                else{

                    let PostBody = {
                        email:email,
                        phone:mobileNumber,
                        password:password
                    }

                    showLoader();  
                    let res = await axios.post(`/student/registration`,PostBody);   
                    hideLoader()

                    
                    if(res.status===200 && res.data['msg']==='success'){
                    
                        // debugger; 
                        successToast(res.data['msg']);
                        //wait 2 second for display success message
                        
                        setTimeout(() => {
                            window.location.href =`/student/login`;;                   
                        }, 2000);
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
@endpush