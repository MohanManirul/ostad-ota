


<div class="modal fade " id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Update Hosting Plan</h6>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                        <div class="container">
                            <div class="row"> 

                                <!-------- Plan Name -------->                       
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Plan Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="plan_nameUpdate" class="form-control">
                                </div>

                                 <!-------- Plan Price -------->                          
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Plan Price') }}</label><span class="require-span">*</span>                                    
                                    <input type="text" id="plan_priceUpdate"  class="form-control"></input>
                                </div>

                                <!-------- Storage -------->     
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Storage') }}</label>                                  
                                    <input type="text"  id="storageUpdate"  class="form-control"></input>
                                </div>

                                <!-------- Data Transfer -------->  
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Data Transfer') }}</label>                                  
                                    <input type="text"  id="data_transferUpdate"  class="form-control"></input>
                                </div>

                                <!-------- Server Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Server Type') }}</label>                                  
                                    <input type="text"  id="server_typeUpdate"  class="form-control"></input>
                                </div>

                                <!-------- No Of Websites -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Websites') }}</label>                                  
                                    <input type="text"  id="no_of_websitesUpdate"  class="form-control"></input>
                                </div>

                                <!-------- Panel Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Panel Type') }}</label>                                  
                                    <input type="text"  id="panel_typeUpdate"  class="form-control"></input>
                                </div>

                                <!-------- SSL Type -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('SSL Type') }}</label>                                  
                                    <input type="text"  id="ssl_typeUpdate"  class="form-control"></input>
                                </div>

                                <!-------- BackUp Policy -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('BackUp Policy') }}</label>                                  
                                    <input type="text"  id="backup_policyUpdate"  class="form-control"></input>
                                </div>

                                <!-------- No Of Sub Domains -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Sub Domains') }}</label>                                  
                                    <input type="text"  id="no_of_sub_domainsUpdate"  class="form-control"></input>
                                </div>
                                

                                <!-------- No Of Email Accounts -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Email Accounts') }}</label>                                  
                                    <input type="text"  id="no_of_email_accountsUpdate"  class="form-control"></input>
                                </div>
                                

                                <!-------- No Of Email databases -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('No Of Email databases') }}</label>                                  
                                    <input type="text"  id="no_of_databasesUpdate"  class="form-control"></input>
                                </div>
                                
                                <!-------- Sequence -------->
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Sequence') }}</label><span class="require-span">*</span>                                    
                                    <input  type="number" id="sequenceUpdate" class="form-control">
                                </div>
                                <input type="text" class="d-none" id="updateID">   
                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="UpdateHostingPlan()" id="save-btn" class="btn btn-success" >Update</button>
                </div>
            </div>
    </div>
</div>

@push('per_page_js')
    


    <script>

        async function FillHostingPlanUpUpdateForm(id){
        
        var guard = "{{ guardCheck() }}"
            document.getElementById('updateID').value=id;
    
            showLoader();
            let res = await axios.post(`/${guard}dashboard/hosting-plans/hosting-plan-data-by-id`,{id:id})
            console.log(res.data);
            hideLoader();
            document.getElementById('plan_nameUpdate').value=res.data['data']['plan_name'];
            document.getElementById('plan_priceUpdate').value = res.data['data']['plan_price'];
            document.getElementById('storageUpdate').value = res.data['data']['storage'];
            document.getElementById('data_transferUpdate').value = res.data['data']['data_transfer'];
            document.getElementById('server_typeUpdate').value = res.data['data']['server_type'];
            document.getElementById('no_of_websitesUpdate').value = res.data['data']['no_of_websites'];
            document.getElementById('panel_typeUpdate').value = res.data['data']['panel_type'];
            document.getElementById('ssl_typeUpdate').value = res.data['data']['ssl_type'];
            document.getElementById('backup_policyUpdate').value = res.data['data']['backup_policy'];
            document.getElementById('no_of_sub_domainsUpdate').value = res.data['data']['no_of_sub_domains'];
            document.getElementById('no_of_email_accountsUpdate').value = res.data['data']['no_of_email_accounts'];
            document.getElementById('no_of_databasesUpdate').value = res.data['data']['no_of_databases'];
            document.getElementById('sequenceUpdate').value = res.data['data']['sequence'];



    }


    async function UpdateHostingPlan(){
        
        try{
            var guard = "{{ guardCheck() }}"

            let updateID = document.getElementById('updateID').value;
            let plan_nameUpdate = document.getElementById('plan_nameUpdate').value;  
            let plan_priceUpdate = document.getElementById('plan_priceUpdate').value;  
            let storageUpdate = document.getElementById('storageUpdate').value; 
            let data_transferUpdate = document.getElementById('data_transferUpdate').value;  
            let server_typeUpdate = document.getElementById('server_typeUpdate').value;  
            let no_of_websitesUpdate = document.getElementById('no_of_websitesUpdate').value;  
            let panel_typeUpdate = document.getElementById('panel_typeUpdate').value; 
            let ssl_typeUpdate = document.getElementById('ssl_typeUpdate').value; 
            let backup_policyUpdate = document.getElementById('backup_policyUpdate').value; 
            let no_of_sub_domainsUpdate = document.getElementById('no_of_sub_domainsUpdate').value; 
            let no_of_email_accountsUpdate = document.getElementById('no_of_email_accountsUpdate').value; 
            let no_of_databasesUpdate = document.getElementById('no_of_databasesUpdate').value; 
            let sequenceUpdate = document.getElementById('sequenceUpdate').value; 

            if( plan_name.length ===0 ){                 
                    errorToast("Plan Name is required");
                }
                else if(plan_price.length===0){
                    errorToast("Plan Price Required !")
                }
            else{ 
            
                let formData = new FormData();
                formData.append('id',updateID)
                formData.append('plan_name',plan_nameUpdate)
                formData.append('plan_price',plan_priceUpdate)
                formData.append('storage',storageUpdate)
                formData.append('data_transfer',data_transferUpdate)
                formData.append('server_type',server_typeUpdate)
                formData.append('no_of_websites',no_of_websitesUpdate)
                formData.append('panel_type',panel_typeUpdate)
                formData.append('ssl_type',ssl_typeUpdate)
                formData.append('backup_policy',backup_policyUpdate)
                formData.append('no_of_sub_domains',no_of_sub_domainsUpdate)
                formData.append('no_of_email_accounts',no_of_email_accountsUpdate)
                formData.append('no_of_databases',no_of_databasesUpdate)
                formData.append('sequence',sequenceUpdate)

                showLoader();
                let res = await axios.post(`/${guard}dashboard/hosting-plans/update`,formData)
                console.log(res.data)
                hideLoader();
                if(res.status===200 && res.data['msg']==='success'){  
                    
                    successToast(res.data['msg']);                       
                    $("#update-modal").modal('hide');                
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