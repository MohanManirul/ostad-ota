
@push('per_page_meta')
    <title>Team Create</title>
@endpush


@push('per_page_css')
    <style>
        .w-15 {
            width: 15% !important;
        }
    </style>
@endpush



<div class="modal fade " id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Team</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row"> 

                                <!-------- Name -------->                       
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="name" class="form-control">
                                </div>

                                 <!-------- Designation -------->                          
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Designation') }}</label><span class="require-span">*</span>                                    
                                    <input type="text" id="designation"  class="form-control"></input>
                                </div>

                                <!-------- Facebook -------->     
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Facebook') }}</label>                                  
                                    <input type="text"  id="facebook"  class="form-control"></input>
                                </div>

                                <!-------- Twitter -------->  
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Twitter') }}</label>                                  
                                    <input type="text"  id="twitter"  class="form-control"></input>
                                </div>

                                <!-------- Instagram -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Instagram') }}</label>                                  
                                    <input type="text"  id="instagram"  class="form-control"></input>
                                </div>

                                <!-------- Linkedin -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Linkedin') }}</label>                                  
                                    <input type="text"  id="linkedin"  class="form-control"></input>
                                </div>

                                 <!-------- Image -------->
                                <br/>
                                <img class="w-15"  id="newImg" src="{{asset('assets/images/default.jpg')}}"/>
                                <br/> 

                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Image') }}</label><span class="require-span">*</span>
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="teamImage">                                
                                </div> 
                                
                                <!-------- Sequence -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Sequence') }}</label><span class="require-span">*</span>                                    
                                    <input type="number" id="sequence" class="form-control">
                                </div>

                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="AddTeam()" id="save-btn" class="btn btn-success" >Add</button>
                </div>
            </div>
    </div>
</div>


@push('per_page_js')
    <script>
        async function  AddTeam() {
        
            try{
                var guard = "{{ guardCheck() }}"
    
                let name = document.getElementById('name').value;
                let designation = document.getElementById('designation').value;    
                let facebook = document.getElementById('facebook').value;
                let twitter = document.getElementById('twitter').value;
                let instagram = document.getElementById('instagram').value;
                let linkedin = document.getElementById('linkedin').value;
                let sequence = document.getElementById('sequence').value;
                let teamImage = document.getElementById('teamImage').files[0];

                if( name.length ===0 ){

                    errorToast("Name is required");
                }
                else if(designation.length===0){
                    errorToast("Designation Required !")
                }
                else if(sequence.length===0){
                    errorToast("Sequence Required !")
                }
                else if(!teamImage){
                    errorToast("Image Required !")
                }

                else{
                    
                    let formData = new FormData();
                    formData.append('name',name)
                    formData.append('designation',designation)
                    formData.append('facebook',facebook)
                    formData.append('twitter',twitter)
                    formData.append('instagram',instagram)
                    formData.append('linkedin',linkedin)
                    formData.append('sequence',sequence)
                    formData.append('image',teamImage)

                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }
                    // console.log(PostBody)
                    // debugger
                    showLoader(); 
                    let res = await axios.post(`/${guard}dashboard/teams/store`,formData,config)
                    // console.log(res);
                    // debugger
                    hideLoader();
                    if(res.status===200 && res.data['msg']==='success'){  
                        
                        successToast(res.data['msg']);
                        document.getElementById("save-form").reset();
                        $("#create-modal").modal('hide');
                        await getTeamList();
                                    
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