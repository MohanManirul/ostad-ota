<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>All Flights</h4>
                        </div>
                        <div class="align-items-center col">
                            @if (request()->header('role') == 'superadmin')
                                <button data-bs-toggle="modal" data-bs-target="#create-modal"
                                    class="btn btn-success float-end  m-0 ">Add Flight</button>
                            @endif
                        </div>
                    </div>
                    <hr class="bg-secondary" />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-light">
                                    <th style="width: 10%">No</th>
                                    <th style="width: 30%">Name</th>
                                    <th style="width: 20%"> Image</th>
                                    <th style="width: 20%">Start Date</th>
                                    <th style="width: 20%">End Date</th>
                                    <th style="width: 20%">Action</th>
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
    <script>
        getFlightList()

        async function getFlightList() {

            var guard = "{{ guardCheck() }}"

            let res = await axios.get(`/${guard}dashboard/custom_module/flights/data`);
            let tableList = $("#tableList");
            res.data['data'].map(function(item, index) {
                let row = `<tr>
                            <td>${index+1}</td>
                            <td>${item['name']}</td>
                            <td><img class="rounded avatar-sm" alt="" src="{{ asset('assets/images/${item.image}') }}"></td>                        
                            <td>${item['start_date']}</td>
                            <td>${item['end_date']}</td>
                            <td>
                                <div class="form-row d-flex">
                                    @if (request()->header('role') == 'superadmin')
                                        <button  data-path ="{{ asset('assets/images/${item.image}') }}"  data-id="${item['id']}" class="btn btn-success editBtn btn-sm me-4">Edit</button>
                                         <button  data-path ="{{ asset('assets/images/${item.image}') }}"  data-id="${item['id']}" class="btn btn-danger deleteBtn btn-sm ">Delete</button>                           
                                    @endif                                  
                                </div>
                                
                            </td>
                        </tr>`
                tableList.append(row)
            })


            $('.editBtn').on('click', async function() {
                let id = $(this).data('id');
                let filePath = $(this).data('path');
                await FillUpdateForm(id, filePath)
                $("#update-modal").modal('show');
            })

            $('.deleteBtn').on('click', function() {
                let id = $(this).data('id');
                let path = $(this).data('path');

                $("#delete-modal").modal('show');
                $("#deleteID").val(id);
                $("#deleteFilePath").val(path)

            })


        }
    </script>
@endpush
