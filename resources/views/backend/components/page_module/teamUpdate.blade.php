


<div class="modal fade " id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Team</h6>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                        <div class="container">
                            <div class="row"> 

                                <!------ Name ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="nameUpdate" class="form-control">                                    
                                </div> 

                                <!------ Designation ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Designation') }}</label><span class="require-span">*</span>                                    
                                    <input type="text" id="designationUpdate"  class="form-control"></input>
                                </div>

                                <!------ Facebook ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Facebook') }}</label>
                                    <input type="text" id="facebookUpdate" class="form-control">                                    
                                </div>  

                                <!------ Twitter ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Twitter') }}</label>
                                    <input type="text" id="twitterUpdate" class="form-control">                                    
                                </div>  

                                <!------ Instagram ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Instagram') }}</label>
                                    <input type="text" id="instagramUpdate" class="form-control">                                    
                                </div>  

                                <!------ Linkedin ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Linkedin') }}</label>
                                    <input type="text" id="linkedinUpdate" class="form-control">                                    
                                </div>  

                                <!------ Image ----->
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('assets/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="teamImgUpdate">
                               
                                <!------ Sequence ----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Sequence') }}</label><span class="require-span">*</span>                                    
                                    <input type="number" id="sequenceUpdate" class="form-control">
                                </div>

                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">                                 
                                
                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="UpdatePortfolio()" id="save-btn" class="btn btn-success" >Update</button>
                </div>
            </div>
    </div>
</div>


<script>

    async function FillTeamUpUpdateForm(id,filePath){

    var guard = "{{ guardCheck() }}"
        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=filePath;
        document.getElementById('oldImg').src=filePath;
 
        showLoader();
        let res = await axios.post(`/${guard}dashboard/teams/team-data-by-id`,{id:id})
        console.log(res.data);
        hideLoader();

        document.getElementById('nameUpdate').value=res.data['data']['name'];
        document.getElementById('designationUpdate').value = res.data['data']['designation'];
        document.getElementById('facebookUpdate').value = res.data['data']['facebook'];
        document.getElementById('twitterUpdate').value = res.data['data']['twitter'];
        document.getElementById('instagramUpdate').value = res.data['data']['instagram'];
        document.getElementById('linkedinUpdate').value = res.data['data']['linkedin'];
        document.getElementById('sequenceUpdate').value = res.data['data']['sequence'];


}


async function UpdatePortfolio(){
    
    try{
        var guard = "{{ guardCheck() }}"

        let updateID = document.getElementById('updateID').value;
        let nameUpdate = document.getElementById('nameUpdate').value;  
        let designationUpdate = document.getElementById('designationUpdate').value;  
        let facebookUpdate = document.getElementById('facebookUpdate').value; 
        let twitterUpdate = document.getElementById('twitterUpdate').value;  
        let instagramUpdate = document.getElementById('instagramUpdate').value;  
        let linkedinUpdate = document.getElementById('linkedinUpdate').value;  
        let sequenceUpdate = document.getElementById('sequenceUpdate').value; 
        
        let filePath=document.getElementById('filePath').value;        
        let teamImgUpdate = document.getElementById('teamImgUpdate').files[0];

        if( nameUpdate.length ===0 ){        
            errorToast("Name is required");
        }
        else if( designationUpdate.length === 0 ){
            errorToast("Description is required");
        }
        else if( sequenceUpdate.length === 0 ){
            errorToast("Sequence is required");
        }
        else{ 
           
            let formData = new FormData();
            formData.append('id',updateID)
            formData.append('name',nameUpdate)
            formData.append('designation',designationUpdate)
            formData.append('facebook',facebookUpdate)
            formData.append('twitter',twitterUpdate)
            formData.append('instagram',instagramUpdate)
            formData.append('linkedin',linkedinUpdate)
            formData.append('sequence',sequenceUpdate)
            formData.append('image',teamImgUpdate)
            formData.append('file_path',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            showLoader();
            let res = await axios.post(`/${guard}dashboard/teams/update`,formData,config)
            console.log(res.data)
            hideLoader();
            if(res.status===200 && res.data['msg']==='success'){  
                
                successToast(res.data['msg']);                       
                $("#update-modal").modal('hide');                
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