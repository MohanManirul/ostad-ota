
@push('per_page_meta')
    <title>Policies Create</title>
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
                    <h6 class="modal-title" id="exampleModalLabel">Create Policies</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row"> 

                                <!-------- Type -------->                       
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Type') }}</label><span class="require-span">*</span>
                                    <input type="text" id="type" class="form-control">
                                </div>

                                 <!-------- Descriptions -------->                          
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Descriptions') }}</label><span class="require-span">*</span>                                    
                                    <input type="text" id="descriptions"  class="form-control"></input>
                                </div>

                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="AddPolicies()" id="save-btn" class="btn btn-success" >Add</button>
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
        async function  AddPolicies() {
        
            try{
                var guard = "{{ guardCheck() }}"
    
                let type = document.getElementById('type').value;
            
                let descriptions = CKEDITOR.instances.descriptions.getData(); 

                if( type.length ===0 ){

                    errorToast("Name is required");
                }
                else if(descriptions.length===0){
                    errorToast("Description Required !")
                }

                else{
                    
                    let formData = new FormData();
                    formData.append('type',type)
                    formData.append('descriptions',descriptions)

                    // console.log(PostBody)
                    // debugger
                    showLoader(); 
                    let res = await axios.post(`/${guard}dashboard/policies/store`,formData)
                    // console.log(res);
                    // debugger
                    hideLoader();
                    if(res.status===200 && res.data['msg']==='success'){  
                        
                        successToast(res.data['msg']);
                        document.getElementById("save-form").reset();
                        $("#create-modal").modal('hide');
                        await getPoliciesList();
                                    
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