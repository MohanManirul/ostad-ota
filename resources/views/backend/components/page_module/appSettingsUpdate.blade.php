
@push('per_page_meta')
    <title>App Settings</title>
@endpush


@push('per_page_css')
    <style>
        .w-15 {
            width: 15% !important;
        }
    </style>
@endpush

 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>App Settings</h4>
                        </div>
                    </div>
                    <hr class="bg-secondary"/>  
                    <div class="modal-body">
                        <form id="update-form">
                            <div class="container">
                                <div class="row"> 
    
                                    <!------ Address ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Address') }}</label><span class="require-span">*</span>
                                        <input type="text" id="locationUpdate" class="form-control">                                    
                                    </div> 
    
                                    <!------ Email ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Email') }}</label><span class="require-span">*</span>                                    
                                        <input type="email" id="emailUpdate"  class="form-control"></input>
                                    </div>
    
                                    <!------ Mobile ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Mobile') }}</label><span class="require-span">*</span>                                    
                                        <input type="text" id="mobileUpdate"  class="form-control"></input>
                                    </div>
    
                                    <!------ Facebook ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Facebook') }}</label>
                                        <input type="text" id="facebookUpdate" class="form-control">                                    
                                    </div>  
    
                                    <!------ Twitter ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Twitter') }}</label>
                                        <input type="text" id="twitterUpdate" class="form-control">                                    
                                    </div>  
    
                                    <!------ Instagram ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Instagram') }}</label>
                                        <input type="text" id="instagramUpdate" class="form-control">                                    
                                    </div>  
    
                                    <!------ Linkedin ----->
                                    <div class="col-6 mb-2 form-group">
                                        <label for="">{{ __('Linkedin') }}</label>
                                        <input type="text" id="linkedinUpdate" class="form-control">                                    
                                    </div>  
    
                                    <!------ Logo ----->
                                  <br/>
                                    <div class="col-6 mb-2 form-group">
                                        <img class="w-15" id="logoOldImg" src="{{asset('assets/images/default-logo.png')}}"/>
                                        <br/>
                                        <label class="form-label mt-2">Logo</label>
                                        <input oninput="logoOldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="logoImgUpdate">
                                    </div>
    
                                    <!------ FavIcon ----->
                                    
                                    <div class="col-6 mb-2 form-group">
                                        <img class="w-15" id="favOldImg" src="{{asset('assets/images/default-fav.jpg')}}"/>
                                        <br/>
                                        <label class="form-label mt-2">FavIcon</label>
                                        <input oninput="favOldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="favIconImgUpdate">
                                        
                                    </div> 
    
                                    <input type="text" class="d-none" id="updateID">
                                    <input type="text" class="d-none" id="filePath">                                 
                                    
                                </div>
                            </div>
                        </form>                   
                    </div>
                        <button onclick="AppSettingsUpdate()" id="save-btn" class="btn btn-success" >Update</button>
                            
                </div>
            </div>
        </div>
    </div>
</div>

@push('per_page_js')

    <script>

    getAppSettingsUpUpdateForm()
    async function getAppSettingsUpUpdateForm(){
        var guard = "{{ guardCheck() }}"
        
        let res = await axios.get(`/${guard}dashboard/app-settings/appSettings-data`)
        
        if (res.data['data'] !== null) {

        document.getElementById('updateID').value = res.data['data']['id']
        document.getElementById('locationUpdate').value = res.data['data']['location']
        document.getElementById('emailUpdate').value = res.data['data']['email']
        document.getElementById('mobileUpdate').value = res.data['data']['mobile']
        document.getElementById('twitterUpdate').value = res.data['data']['twitter']
        document.getElementById('facebookUpdate').value = res.data['data']['facebook']
        document.getElementById('instagramUpdate').value = res.data['data']['instagram']
        document.getElementById('linkedinUpdate').value = res.data['data']['linkedin']
        document.getElementById('logoOldImg').value = res.data['data']['logo']
        document.getElementById('favOldImg').value = res.data['data']['fav_icon']
 
        document.getElementById("logoOldImg").src="{{ asset('assets/images') }}/" +  res.data['data']['logo'];
        document.getElementById("favOldImg").src= "{{ asset('assets/images') }}/" + res.data['data']['fav_icon'];

        }

    }

    async function AppSettingsUpdate(){

    
        try{
            var guard = "{{ guardCheck() }}"

            let updateID = document.getElementById('updateID').value;           
            let locationUpdate = document.getElementById('locationUpdate').value;
            let emailUpdate = document.getElementById('emailUpdate').value;  
            let mobileUpdate = document.getElementById('mobileUpdate').value; 
            let twitterUpdate = document.getElementById('twitterUpdate').value;  
            let facebookUpdate = document.getElementById('facebookUpdate').value;  
            let instagramUpdate = document.getElementById('instagramUpdate').value;  
            let linkedinUpdate = document.getElementById('linkedinUpdate').value; 

            let logoImgUpdate = document.getElementById('logoImgUpdate').files[0];
            let favIconImgUpdate = document.getElementById('favIconImgUpdate').files[0];

            let logoOldImgfilePath = document.getElementById("logoOldImg").src;
            let favOldIconImgfilePath = document.getElementById("favOldImg").src;
    
        
            if( locationUpdate.length ===0 ){        
                errorToast("location is required");
            }
            else if( emailUpdate.length === 0 ){
                errorToast("email is required");
            }
            else if( mobileUpdate.length === 0 ){
                errorToast("mobile is required");
            }
            else{ 
                
                let formData = new FormData();
                formData.append('id',updateID)
                formData.append('location',locationUpdate)
                formData.append('email',emailUpdate)
                formData.append('mobile',mobileUpdate)
                formData.append('facebook',facebookUpdate)
                formData.append('twitter',twitterUpdate)
                formData.append('instagram',instagramUpdate)
                formData.append('linkedin',linkedinUpdate)
                formData.append('logo',logoImgUpdate)
                formData.append('fav_icon',favIconImgUpdate)
                formData.append('logoOldImgfilePath',logoOldImgfilePath)
                formData.append('favOldIconImgfilePath',favOldIconImgfilePath)
                
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
            
                showLoader();
                let res = await axios.post(`/${guard}dashboard/app-settings/update`,formData,config)
                
                console.log(res.data)
                hideLoader();
                
                if(res.status===200 && res.data['msg']==='success'){  
                    
                    successToast(res.data['msg']);                       
                    location.reload();
                                
                }
                    else{
                        errorToast(res.data['error']);
                    }
                } 
            }
            catch(e){
                errorToast(e.response.data.message);
            location.reload()
            unauthorized(e.response.status)
        }    

        }



    

    </script>


@endpush