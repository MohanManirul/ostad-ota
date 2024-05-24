
@push('per_page_meta')
    <title>Date Range Picker Crud</title>
@endpush


@push('per_page_css')
    <style>
        .w-15 {
            width: 15% !important;
        }
    </style>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


@endpush



<div class="modal fade " id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Flight</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                        <div class="container">
                            <div class="row">


                                <!----- Name ------>                        
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                    <input type="text" id="name"  class="form-control" />
                                </div>
                                
                                <!----- Date ------>                        
                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Date') }}</label><span class="require-span">*</span>
                                    <input type="text" id="flightOperatingDate" class="form-control" />
                                </div>

                                <!----- Image ------>  
                                <br/>
                                <img class="w-15"  id="newImg" src="{{asset('assets/images/demo-plane.jpeg')}}"/>
                                <br/> 

                                <div class="col-12 mb-2 form-group">
                                    <label for="">{{ __('Image') }}</label><span class="require-span">*</span>
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="Image">                                
                                </div>                               
                              

                            </div>
                        </div>
                    </form>                   
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Add()" id="save-btn" class="btn btn-success" >Add</button>
                </div>
            </div>
    </div>
</div>



@push('per_page_js')


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>

        //date range picker js start
        $(function() {
            $('#flightOperatingDate').daterangepicker({
                minDate: moment(),
                maxDate: moment().add(7, 'days'),               
                locale: {
                    format: 'DD/MM/YYYY' // Correct format for d/m/y
                }
                
            });
        });


        //date range picker js ends

        async function  Add() {
        
            try{
                
                var guard = "{{ guardCheck() }}"                
                
                let name = document.getElementById('name').value;  
                let flightOperatingDate = document.getElementById('flightOperatingDate').value;  
                let Image = document.getElementById('Image').files[0];

           

                if( name.length ===0 ){

                    errorToast("Name is required");
                }
                else if(!flightOperatingDate){
                    errorToast("Flight Operating date is Required !")
                }
                else if(!Image){
                    errorToast("Image is Required !")
                }

                else{

                    
                    let formData = new FormData();
                    formData.append('name',name)
                    formData.append('flightOperatingDate',flightOperatingDate)
                    formData.append('image',Image)

                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }
                    // console.log(PostBody)
                    // debugger
                    showLoader(); 
                    let res = await axios.post(`/${guard}dashboard/custom_module/flights/store`,formData,config)
                    // console.log(res);
                    // debugger
                    if(res.status===200 && res.data['msg']==='success'){  
                        hideLoader();
                        
                        successToast(res.data['msg']);
                        document.getElementById("save-form").reset();
                        $("#create-modal").modal('hide');
                        await getFlightList();
                                    
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