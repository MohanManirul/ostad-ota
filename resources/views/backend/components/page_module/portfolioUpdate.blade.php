


<div class="modal fade " id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Portfolio</h6>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                        <div class="container">
                            <div class="row"> 

                                <!------name----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="nameUpdate" class="form-control">                                    
                                </div> 

                                <!------Descriptions----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Descriptions') }}</label><span class="require-span">*</span>                                    
                                    <textarea  id="descriptionsUpdate"  class="form-control"></textarea>
                                </div>

                                <!------Url----->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Url') }}</label><span class="require-span">*</span>
                                    <input type="text" id="urlUpdate" class="form-control">                                    
                                </div>  

                                <!------image----->
                                <br/>
                                <img class="w-15" id="oldImg" src="{{asset('assets/images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])"  type="file" class="form-control" id="portfolioImgUpdate">
                               
                                <!------Sequence----->
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

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'descriptionsUpdate',{
        stylesSet: [
            { name: 'Times New Roman Font', element: 'span', styles: { 'font-family': 'Times New Roman, Times, serif' } },
            { name: 'SutonnyMJ Regular Font', element: 'span', styles: { 'font-family': 'Kalpurush, Arial, sans-serif' } },
            { name: 'SutonnyMJ Font', element: 'span', styles: { 'font-family': 'SutonnyMJ, Arial, sans-serif' } },
        ]
    });
</script>

<script>

    async function FillPortfolioUpUpdateForm(id,filePath){

    var guard = "{{ guardCheck() }}"
        document.getElementById('updateID').value=id;
        document.getElementById('filePath').value=filePath;
        document.getElementById('oldImg').src=filePath;
 
        showLoader();
        let res = await axios.post(`/${guard}dashboard/portfolios/portfolio-data-by-id`,{id:id})
        console.log(res.data);
        hideLoader();

        document.getElementById('nameUpdate').value=res.data['data']['name'];
        document.getElementById('descriptionsUpdate').value = res.data['data']['descriptions'];
        document.getElementById('urlUpdate').value = res.data['data']['url'];
        document.getElementById('sequenceUpdate').value = res.data['data']['sequence'];


}

 
async function UpdatePortfolio(){
    
    try{
        var guard = "{{ guardCheck() }}"

        let updateID = document.getElementById('updateID').value;
        let nameUpdate = document.getElementById('nameUpdate').value;  
        let urlUpdate = document.getElementById('urlUpdate').value;  
        let sequenceUpdate = document.getElementById('sequenceUpdate').value;  
        let descriptionsUpdate = CKEDITOR.instances.descriptionsUpdate.getData();
        let filePath=document.getElementById('filePath').value;
        
        let portfolioImgUpdate = document.getElementById('portfolioImgUpdate').files[0];

        if( nameUpdate.length ===0 ){        
            errorToast("Name is required");
        }
        else if( descriptionsUpdate.length === 0 ){
            errorToast("Description is required");
        }
        else if( urlUpdate.length === 0 ){
            errorToast("Url is required");
        }
        else if(!portfolioImgUpdate){
            errorToast("Image Required !")
        }
        else if( sequenceUpdate.length === 0 ){
            errorToast("Sequence is required");
        }
        else{ 

            let formData = new FormData();
            formData.append('id',updateID)
            formData.append('name',nameUpdate)
            formData.append('descriptions',descriptionsUpdate)
            formData.append('url',urlUpdate)
            formData.append('sequence',sequenceUpdate)
            formData.append('image',portfolioImgUpdate)
            formData.append('file_path',filePath)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            showLoader();
            let res = await axios.post(`/${guard}dashboard/portfolios/update`,formData,config)
            console.log(res.data)
            hideLoader();
            if(res.status===200 && res.data['msg']==='success'){  
                
                successToast(res.data['msg']);
                       
                await getPortfolioList();
                $("#update-modal").modal('hide');                
                            
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