

 
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>All Hosting Plan</h4>
                        </div> 
                        <div class="align-items-center col">   
                            @if(can('add_hosting_plans') || (request()->header('role') == 'superadmin'))                                 
                                <button data-bs-toggle="modal"  data-bs-target="#create-modal" class="btn btn-success float-end  m-0 ">Add Hosting Plan</button>
                            @endif                
                          
                        </div>
                    </div>
                    <hr class="bg-secondary"/>
                    <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Plan Name</th>
                            <th>Price</th>
                            <th>Sequence</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="tableList">

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('per_page_js')

    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

    <script>

        getHostingPlanList()
        
        async function  getHostingPlanList() {

            var guard = "{{ guardCheck() }}"

            let res = await axios.get(`/${guard}dashboard/hosting-plans/hosting-plan-data`);
             console.log(res.data);
            let tableList=$("#tableList");
            let tableData=$("#tableData");
    
            tableData.DataTable().destroy();
            tableList.empty();           
            res.data['data'].map(function (item,index) {
                let row=`<tr>
                        <td>${index+1}</td>
                        <td>${item['plan_name']}</td>                      
                        <td>${item['plan_price']}</td>                      
                        <td>${item['sequence']}</td>                      
                        <td>
                            @if(can('add_team') || (request()->header('role') == 'superadmin')) 
                                <button data-id="${item['id']}" class="btn btn-success editBtn btn-sm ">Edit</button>                           
                            @endif
                        </td>
                        </tr>`
                tableList.append(row)
            })
        
         
            $('.editBtn').on('click', async function () {                
                let id= $(this).data('id');
                await FillHostingPlanUpUpdateForm(id)                
                $("#update-modal").modal('show');
            })
     
            new DataTable('#tableData',{
                order:[[0,'desc']],
                lengthMenu:[10,15,20,30]
            });
        
        }

        
        </script>
@endpush