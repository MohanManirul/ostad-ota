
@push('per_page_css')

    <style>
        .w-15 {
            width: 15% !important;
        }
    </style>
@endpush



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Profile</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
   
        <div class="row">
            <div class="col">

                <div class="h-100">
                    <div class="row mb-3 pb-1">
                     
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                               
                                    <div class="justify-content-center">
                                        
                                            <div class="card animated fadeIn w-100 p-3">
                                                <div class="card-body">
                                                   
                                                    <div class="container-fluid m-0 p-0">
                                                        <div class="row m-0 p-0">
                                
                                                            <!--- email --->
                                                            <div class="col-md-4 p-2">
                                                                <label>Email Address</label>
                                                                <input id="email" placeholder="Email" class="form-control" type="email" readonly/>
                                                            </div>
                                
                                                            <!--- mobile number --->
                                                            <div class="col-md-4 p-2">
                                                                <label>Mobile Number</label>
                                                                <input id="mobileNumber" placeholder="Mobile Number" class="form-control" type="text"/>
                                                            </div>

                                                            <!--- Name --->
                                                            <div class="col-md-4 p-2">
                                                                <label>Name</label>
                                                                <input id="name" placeholder="Name" class="form-control" type="text"/>
                                                            </div>

                                                             <!----- Profile Image ------>  
                                                             <div class="col-4 mb-2 form-group">
                                                                <br/>
                                                                <img class="w-15" id="profileOldImg" src="{{asset('frontend/assets/static_images/dummyMan.jpg')}}"/>
                                                                <br/>
                                                                <label class="form-label mt-2">Image</label>
                                                                <input oninput="profileOldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="profileImgUpdate">
                                                            </div>

                                                            <input type="text" class="d-none" id="updateID">
                                                            <input type="text" class="d-none" id="filePath"> 
                                
                                                        </div>
                                                        <div class="row m-0 p-0">
                                                            <div class="col-md-4 p-2">
                                                                <button onclick="onUpdate()" class="btn btn-success mt-3 w-100">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                              
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                  
                    </div>
                    <!--end row-->

        </div>

    </div>
    <!-- container-fluid -->
</div>




@push('per_page_js')    

    <script>

        ProfileDetails()
        async function ProfileDetails() {

                try{
                    let res = await axios.get("/student/dashboard/profile-data");
                  
                    if (res.data['data'] !== null) {
                        
                        document.getElementById('updateID').value = res.data['data']['id']
                        document.getElementById('email').value = res.data['data']['email']
                        document.getElementById('mobileNumber').value = res.data['data']['phone']
                        document.getElementById('name').value = res.data['data']['name']
                        document.getElementById('profileOldImg').value = res.data['data']['image']

                        document.getElementById("profileOldImg").src="{{ asset('frontend/assets/static_images') }}/" +  res.data['data']['image'];

                        }
                    
                }catch(e){ 
                    errorToast(e.response.data.message);               
                    unauthorized(e.response.status)
                }

                        
            }


    //update profile
    async function onUpdate() {
        
        try{

            let mobileNumber = document.getElementById('mobileNumber').value;
            let name = document.getElementById('name').value;

            let profileImgUpdate = document.getElementById('profileImgUpdate').files[0];
            let profileOldImgfilePath = document.getElementById("profileOldImg").src;
          
            if(mobileNumber.length===0){
            errorToast('Phone Number  is required')
            }
            else if(name.length===0){
                errorToast('Name is required')
            }
        
            else{

                let formData = new FormData();
              
                formData.append('phone',mobileNumber)
                formData.append('name',name)
                formData.append('image',profileImgUpdate)
                
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                showLoader();  
                let res = await axios.post(`/student/dashboard/profile-update`,formData,config);  
               
                hideLoader()

                
                if(res.status===200 && res.data['msg']==='success'){
                
                    // debugger; 
                    successToast(res.data['msg']);
                    
                }
                else{
                    errorToast(res.data['msg']);
                }
            } 
        }catch(e){ 
            errorToast(e.response.data.message);               
            unauthorized(e.response.status)
        }

                
    }



    </script>
@endpush