
@push('per_page_meta')
    <title>Portfolio Create</title>
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
                    <h6 class="modal-title" id="exampleModalLabel">Create Portfolio</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">                        
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="name" class="form-control">
                                </div>                          
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Descriptions') }}</label><span class="require-span">*</span>                                    
                                    <textarea  id="descriptions"  class="form-control"></textarea>
                                </div>
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('URL') }}</label><span class="require-span">*</span>                                    
                                    <input type="text"  id="url"  class="form-control"></input>
                                </div>
                                
                                <br/>
                                <img class="w-15"  id="newImg" src="{{asset('assets/images/default.jpg')}}"/>
                                <br/> 

                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Image') }}</label><span class="require-span">*</span>
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="portfolioImage">                                
                                </div> 
                                
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
                    <button onclick="AddPortfolio()" id="save-btn" class="btn btn-success" >Add</button>
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
        async function  AddPortfolio() {
        
            try{
                var guard = "{{ guardCheck() }}"
                
                
                let name = document.getElementById('name').value;
                let descriptions = CKEDITOR.instances.descriptions.getData();    
                let url = document.getElementById('url').value;
                let sequence = document.getElementById('sequence').value;
                let portfolioImage = document.getElementById('portfolioImage').files[0];

                if( name.length ===0 ){

                    errorToast("Name is required");
                }
                else if(descriptions.length===0){
                    errorToast("Descriptions Required !")
                }
                else if(url.length===0){
                    errorToast("Url Required !")
                }
                else if(sequence.length===0){
                    errorToast("Sequence Required !")
                }
                else if(!portfolioImage){
                    errorToast("Image Required !")
                }

                else{
                    
                    let formData = new FormData();
                    formData.append('name',name)
                    formData.append('descriptions',descriptions)
                    formData.append('url',url)
                    formData.append('sequence',sequence)
                    formData.append('image',portfolioImage)

                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }
                    // console.log(PostBody)
                    // debugger
                    showLoader(); 
                    let res = await axios.post(`/${guard}dashboard/portfolios/store`,formData,config)
                    // console.log(res);
                    // debugger
                    hideLoader();
                    if(res.status===200 && res.data['msg']==='success'){  
                        
                        successToast(res.data['msg']);
                        document.getElementById("save-form").reset();
                        await getPortfolioList();
                        $("#create-modal").modal('hide');
                                    
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