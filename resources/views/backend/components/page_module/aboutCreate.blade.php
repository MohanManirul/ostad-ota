
@push('per_page_meta')
    <title>About Us Create</title>
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
                    <h6 class="modal-title" id="exampleModalLabel">Create About Us</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">                        
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Descriptions') }}</label><span class="require-span">*</span>                                    
                                    <textarea  id="descriptions"  class="form-control"></textarea>
                                </div>                          
                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="AddAboutUs()" id="save-btn" class="btn btn-success" >Add</button>
                </div>
            </div>
    </div>
</div>




@push('per_page_js')

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'descriptions',{
            stylesSet: [
                { name: 'Times New Roman Font', element: 'span', styles: { 'font-family': 'Times New Roman, Times, serif' } },
                { name: 'SutonnyMJ Regular Font', element: 'span', styles: { 'font-family': 'Kalpurush, Arial, sans-serif' } },
                { name: 'SutonnyMJ Font', element: 'span', styles: { 'font-family': 'SutonnyMJ, Arial, sans-serif' } },
            ]
        });
    </script>

<script>
    async function  AddAboutUs() {
    
        try{
            var guard = "{{ guardCheck() }}"

            let descriptions = CKEDITOR.instances.descriptions.getData();  

            
            if(descriptions.length===0){
                errorToast("Descriptions Required !")
            }

            else{

                
                let formData = new FormData();
                formData.append('descriptions',descriptions)

                // console.log(PostBody)
                // debugger
                showLoader(); 
                let res = await axios.post(`/${guard}dashboard/about/store`,formData)
                // console.log(res);
                // debugger
                hideLoader();
                if(res.status===200 && res.data['msg']==='success'){  
                    
                    successToast(res.data['msg']);
                    document.getElementById("save-form").reset();
                    $("#create-modal").modal('hide');
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