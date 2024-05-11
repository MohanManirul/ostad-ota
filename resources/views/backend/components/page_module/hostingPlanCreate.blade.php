
@push('per_page_meta')
    <title>Hosting Plan Create</title>
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
                    <h6 class="modal-title" id="exampleModalLabel">Create Hosting Plan</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row"> 

                                <!-------- Plan Name -------->                       
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Plan Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="plan_name" class="form-control">
                                </div>

                                 <!-------- Plan Price -------->                          
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Plan Price') }}</label><span class="require-span">*</span>                                    
                                    <input type="text" id="plan_price"  class="form-control"></input>
                                </div>

                                <!-------- Storage -------->     
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Storage') }}</label>                                  
                                    <input type="text"  id="storage"  class="form-control"></input>
                                </div>

                                <!-------- Data Transfer -------->  
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Data Transfer') }}</label>                                  
                                    <input type="text"  id="data_transfer"  class="form-control"></input>
                                </div>

                                <!-------- Server Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Server Type') }}</label>                                  
                                    <input type="text"  id="server_type"  class="form-control"></input>
                                </div>

                                <!-------- No Of Websites -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Websites') }}</label>                                  
                                    <input type="text"  id="no_of_websites"  class="form-control"></input>
                                </div>

                                <!-------- Panel Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Panel Type') }}</label>                                  
                                    <input type="text"  id="panel_type"  class="form-control"></input>
                                </div>

                                <!-------- SSL Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('SSL Type') }}</label>                                  
                                    <input type="text"  id="ssl_type"  class="form-control"></input>
                                </div>

                                <!-------- BackUp Policy -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('BackUp Policy') }}</label>                                  
                                    <input type="text"  id="backup_policy"  class="form-control"></input>
                                </div>

                                <!-------- No Of Sub Domains -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Sub Domains') }}</label>                                  
                                    <input type="text"  id="no_of_sub_domains"  class="form-control"></input>
                                </div>
                                

                                <!-------- No Of Email Accounts -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Email Accounts') }}</label>                                  
                                    <input type="text"  id="no_of_email_accounts"  class="form-control"></input>
                                </div>
                                

                                <!-------- No Of Email databases -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Email databases') }}</label>                                  
                                    <input type="text"  id="no_of_databases"  class="form-control"></input>
                                </div>
                                
                                <!-------- Sequence -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Sequence') }}</label><span class="require-span">*</span>                                    
                                    <input  type="number" id="sequence" class="form-control">
                                </div>

                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="AddHostingPlan()" id="save-btn" class="btn btn-success" >Add</button>
                </div>
            </div>
    </div>
</div>


@push('per_page_js')
    <script>
        async function  AddHostingPlan() {
        
            try{
                var guard = "{{ guardCheck() }}"
    
                let plan_name = document.getElementById('plan_name').value;
                let plan_price = document.getElementById('plan_price').value;    
                let storage = document.getElementById('storage').value;
                let data_transfer = document.getElementById('data_transfer').value;
                let server_type = document.getElementById('server_type').value;
                let no_of_websites = document.getElementById('no_of_websites').value;
                let panel_type = document.getElementById('panel_type').value;
                let ssl_type = document.getElementById('ssl_type').value;
                let backup_policy = document.getElementById('backup_policy').value;
                let no_of_sub_domains = document.getElementById('no_of_sub_domains').value;
                let no_of_email_accounts = document.getElementById('no_of_email_accounts').value;
                let no_of_databases = document.getElementById('no_of_databases').value;
                let sequence = document.getElementById('sequence').value;
                
                if( plan_name.length ===0 ){                 
                    errorToast("Plan Name is required");
                }
                else if(plan_price.length===0){
                    errorToast("Plan Price Required !")
                }
                
                else{
                    
                    let formData = new FormData();
                    formData.append('plan_name',plan_name)
                    formData.append('plan_price',plan_price)
                    formData.append('storage',storage)
                    formData.append('data_transfer',data_transfer)
                    formData.append('server_type',server_type)
                    formData.append('no_of_websites',no_of_websites)
                    formData.append('panel_type',panel_type)
                    formData.append('ssl_type',ssl_type)
                    formData.append('backup_policy',backup_policy)
                    formData.append('no_of_sub_domains',no_of_sub_domains)
                    formData.append('no_of_email_accounts',no_of_email_accounts)
                    formData.append('no_of_databases',no_of_databases)
                    formData.append('sequence',sequence)

                    // console.log(PostBody)
                    // debugger
                    showLoader(); 
                    let res = await axios.post(`/${guard}dashboard/hosting-plans/store`,formData)
                    // console.log(res);
                    // debugger
                    hideLoader();
                    if(res.status===200 && res.data['msg']==='success'){  
                        
                        successToast(res.data['msg']);
                        document.getElementById("save-form").reset();
                        $("#create-modal").modal('hide');
                        await getHostingPlanList();
                                    
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