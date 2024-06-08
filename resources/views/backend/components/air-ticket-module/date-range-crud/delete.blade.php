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



<div class="modal fade " id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Delete Flight</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">


                            <!----- Name ------>
                            <div class="col-12 mb-2 form-group">
                                <label for="">{{ __('Name') }}</label><span class="require-span">*</span>
                                <input type="text" id="nameUpdate" class="form-control" />
                            </div>

                            <!----- Date ------>
                            <div class="col-12 mb-2 form-group">
                                <label for="">{{ __('Date') }}</label><span class="require-span">*</span>
                                <input type="text" id="flightOperatingDateUpdate" class="form-control" />
                            </div>

                            <!----- Image ------>
                            <!----- Image ------>
                            <div class="col-12 mb-2 form-group">
                                <br />
                                <img class="w-15" id="oldImg" src="{{ asset('assets/images/default.jpg') }}" />
                                <br />
                                <label class="form-label mt-2">Image</label>
                                <input oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                    class="form-control" id="ImgUpdate">
                            </div>

                            <input type="text" class="d-none" id="updateID">
                            <input type="text" class="d-none" id="filePath">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn btn-danger" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="UpdateFlight()" id="save-btn" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</div>


@push('per_page_js')
    <script>
        //date range picker js start
        $(function() {
            $('#flightOperatingDateUpdate').daterangepicker({
                minDate: moment(),
                maxDate: moment().add(7, 'days'),
                locale: {
                    format: 'DD/MM/YYYY' // Correct format for d/m/y
                }

            });
        });
    </script>


    <script>
        async function FillUpdateForm(id, filePath) {

            var guard = "{{ guardCheck() }}"

            document.getElementById('updateID').value = id;
            document.getElementById('filePath').value = filePath;
            document.getElementById('oldImg').src = filePath;

            showLoader();
            let res = await axios.post(`/${guard}dashboard/custom_module/flights/edit`, {
                id: id
            })
            console.log(res.data);
            hideLoader();

            document.getElementById('nameUpdate').value = res.data['data']['name'];

            // Extract date strings
            let startDateStr = res.data['data']['start_date'];
            let endDateStr = res.data['data']['end_date'];

            // Function to convert date from 'YYYY-MM-DD' to 'DD/MM/YYYY'
            function convertDate(dateStr) {
                let [year, month, day] = dateStr.split("-");
                return `${day}/${month}/${year}`;
            }

            // Convert start and end dates
            let formattedStartDate = convertDate(startDateStr);
            let formattedEndDate = convertDate(endDateStr);

            // Set the value of the input field
            document.getElementById('flightOperatingDateUpdate').value = `${formattedStartDate} - ${formattedEndDate}`;


        }


        async function UpdateFlight() {
            try {
                var guard = "{{ guardCheck() }}"

                let updateID = document.getElementById('updateID').value;
                let nameUpdate = document.getElementById('nameUpdate').value;
                let flightOperatingDateUpdate = document.getElementById('flightOperatingDateUpdate').value;

                let filePath = document.getElementById('filePath').value;
                let ImgUpdate = document.getElementById('ImgUpdate').files[0];

                // console.info(updateID + nameUpdate + filePath + ImgUpdate + flightOperatingDateUpdate)

                if (nameUpdate.length === 0) {

                    errorToast("Flight Name is required");
                } else if (!flightOperatingDateUpdate) {
                    errorToast("Flight Operating Date Required !")
                } else if (!ImgUpdate) {
                    errorToast("Image Required !")
                } else {


                    let formData = new FormData();
                    formData.append('id', updateID)
                    formData.append('name', nameUpdate)
                    formData.append('flightOperatingDateUpdate', flightOperatingDateUpdate)
                    formData.append('image', ImgUpdate)
                    formData.append('file_path', filePath)

                    const config = {
                        headers: {
                            'content-type': 'multipart/form-data'
                        }
                    }
                    showLoader();

                    let res = await axios.post(`/${guard}dashboard/custom_module/flights/update`, formData, config)

                    if (res.status === 200 && res.data['msg'] === 'success') {

                        hideLoader();
                        successToast(res.data['msg']);

                        await getFlightList();
                        $("#update-modal").modal('hide');

                    } else {
                        errorToast(res.data['error']);
                    }
                }
            } catch (e) {
                errorToast(e.response.data.message);
                location.reload()
                unauthorized(e.response.status)
            }

        }
    </script>
@endpush
