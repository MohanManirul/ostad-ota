


<div class="modal fade " id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update About</h6>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                        <div class="container">
                            <div class="row">

                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Descriptions') }}</label><span class="require-span">*</span>                                    
                                    <textarea  id="descriptionsUpdate"  class="form-control"></textarea>
                                </div>
                                <input type="text" class="d-none" id="updateID">                                 
                                
                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="UpdateAbout()" id="save-btn" class="btn btn-success" >Update</button>
                </div>
            </div>
    </div>
</div>




@push('per_page_js')

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

    async function FillAboutUsUpdateForm(id){

    var guard = "{{ guardCheck() }}"
        document.getElementById('updateID').value=id;

        showLoader();
        let res = await axios.post(`/${guard}dashboard/about/about-data-by-id`,{id:id})
        console.log(res.data);
        hideLoader();
        document.getElementById('descriptionsUpdate').value = res.data['data']['descriptions'];

}

  
async function UpdateAbout(){
    try{
        var guard = "{{ guardCheck() }}"

        let updateID = document.getElementById('updateID').value;
        let descriptionsUpdate = CKEDITOR.instances.descriptionsUpdate.getData();
        if( descriptionsUpdate.length ===0 ){
        
            errorToast("Description is required");
        }
        else{ 

            let formData = new FormData();
            formData.append('id',updateID)
            formData.append('descriptions',descriptionsUpdate)

            showLoader();
            let res = await axios.post(`/${guard}dashboard/about/update`,formData)
           
            hideLoader();
            if(res.status===200 && res.data['msg']==='success'){  
                
                successToast(res.data['msg']);                       
                $("#update-modal").modal('hide');
                await getAboutUsList();
             
                            
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