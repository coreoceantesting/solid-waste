<x-admin.layout>
    <x-slot name="title">Collection Scheduling</x-slot>
    <x-slot name="heading">Collection Scheduling</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Collection Scheduling</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_type">Vehicle Type<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_type" name="vehicle_type" type="text" placeholder="Enter Vehicle Type"> --}}
                                        <select class="form-select" name="vehicle_type" id="vehicle_type">
                                        <option value="">select vehicle type</option>
                                         @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->Vehicle_Type}}">{{$vehicle->Vehicle_Type}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_number" name="vehicle_number" type="number" placeholder="Enter Vehicle number"> --}}
                                    <select class="form-select" name="vehicle_number" id="vehicle_number">
                                        <option value="">select vehicle number</option>
                                         @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->Vehicle_number}}">{{$vehicle->Vehicle_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schedule_form">Schedule Form<span class="text-danger">*</span></label>
                                    <input class="form-control" id="schedule_form" name="schedule_form" type="date" placeholder="Enter Schedule Form">
                                    <span class="text-danger is-invalid schedule_form_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schedule_to">Schedule To<span class="text-danger">*</span></label>
                                    <input class="form-control" id="schedule_to" name="schedule_to" type="date" placeholder="Enter schedule_to">
                                    <span class="text-danger is-invalid schedule_to_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Recurrence<span class="text-danger">*</span></label>
                                    <div>
                                        <select name="recurrence" class="form-select" id="recurrence">
                                            <option value="">Recurrence Select</option> <!-- Default placeholder option -->
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                        <span class="text-danger is-invalid recurrence_err"></span>
                                    </div>
                                </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Vehicle Information</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Beat Number</th>
                                                <th>Employee Name</th>
                                                <th>Waste Generated Type</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="addMoreVehicleButton">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="vehicleTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Collection Scheduling</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_type">Vehicle Type<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_type" name="vehicle_type" type="text" placeholder="Enter Vehicle Type"> --}}
                                      <select class="form-select" name="vehicle_type" id="vehicle_type">
                                        <option value="">Select vehicle type</option>
                                         @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->Vehicle_Type}}">{{$vehicle->Vehicle_Type}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_number" name="vehicle_number" type="number" placeholder="Enter Vehicle Number"> --}}
                                       <select class="form-select" name="vehicle_number" id="vehicle_number">
                                        <option value="">Select Vehicle Number</option>
                                         @foreach ($vehicles as $vehicle)
                                            <option value="{{$vehicle->Vehicle_number}}">{{$vehicle->Vehicle_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schedule_form">Schedule Form<span class="text-danger">*</span></label>
                                    <input class="form-control" id="schedule_form" name="schedule_form" type="date" placeholder="Enter Engine Number">
                                    <span class="text-danger is-invalid schedule_form_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="schedule_to">Schedule To<span class="text-danger">*</span></label>
                                    <input class="form-control" id="schedule_to" name="schedule_to" type="date" placeholder="Enter Schedule To">
                                    <span class="text-danger is-invalid schedule_to_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Recurrence<span class="text-danger">*</span></label>
                                    <div>
                                        <select name="recurrence" class="form-select" id="recurrence">
                                            <option value="">Recurrence Select</option> <!-- Default placeholder option -->
                                            <option value="daily">Daily</option>
                                            <option value="weekly">Weekly</option>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                        <span class="text-danger is-invalid recurrence_err"></span>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Vehicle Information</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Beat Number</th>
                                                <th>Employee Name</th>
                                                <th>Waste Generated Type</th>
                                                <th>In Time</th>
                                                <th>Out Time</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="editMoreVehicleButton">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="editVehicleTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Schedule Form</th>
                                        <th>Schedule To</th>
                                        <th>Recurrence</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicleSchedulingInformation as $vehicle)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$vehicle->vehicle_type}}</td>
                                        <td>{{$vehicle->vehicle_number}}</td>
                                        <td>{{$vehicle->schedule_form}}</td>
                                        <td>{{$vehicle->schedule_to}}</td>
                                        <td>{{$vehicle->recurrence}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit vehicles" data-id="{{ $vehicle->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete vehicles" data-id="{{ $vehicle->id }}"><i data-feather="trash-2"></i></button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $vehicle->id }}"><i data-feather="eye"  data-id="{{ $vehicle->id }}"  data-bs-toggle="modal" data-bs-target=".vehicalModel"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        {{-- view model --}}
        <div class="modal fade vehicalModel" tabindex="-1" role="dialog" aria-labelledby="vehicalModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title" id="vehicalModelLabel">Collection Scheduling </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body" id="stockData">
                            <!-- First Table: Main Data -->
                            <div id="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Type</th>
                                            <th>Vehicle Number</th>
                                            <th>Schedule From</th>
                                            <th>Schedule To</th>
                                            <th>Recurrence</th>
                                        </tr>
                                    </thead>
                                    <tbody id="VehicleInformationModel">
                                        <!-- Data will be injected here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Table: Additional Details -->
                            <div id="additional-info-table" class="mt-4">
                                    <h5 class="modal-title" id="vehicalModelLabel">Vehicle Information</h5>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Beat Number</th>
                                            <th>Employee Name</th>
                                            <th>Waste Gen Type</th>
                                            <th>In Time</th>
                                            <th>Out Time</th>
                                        </tr>
                                    </thead>
                                    <tbody id="AdditionalVehicleInformationModel">
                                        <!-- Additional data will be injected here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('vehicle-scheduling-information.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('vehicle-scheduling-information.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('vehicle-scheduling-information.edit', ":model_id") }}";
        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                if (!data.error)
                {
                    $("#editForm input[name='edit_model_id']").val(data.vehicleSchedulingInformation.id);
                    $("#editForm select[name='vehicle_type']").val(data.vehicleSchedulingInformation.vehicle_type);
                    $("#editForm select[name='vehicle_number']").val(data.vehicleSchedulingInformation.vehicle_number);
                    $("#editForm input[name='schedule_form']").val(data.vehicleSchedulingInformation.schedule_form);
                    $("#editForm input[name='schedule_to']").val(data.vehicleSchedulingInformation.schedule_to);
                    $("#editForm select[name='recurrence']").val(data.vehicleSchedulingInformation.recurrence);

                      // Dynamically generate vehicle details rows
                    let vehicledetail = "";
                    $.each(data.VehicleInformation, function(key, value) {
                        let beatNumberOptions = ''; // Variable to hold vehicle type options

                        // Loop through VehicleType data dynamically from the controller
                        @foreach($Ward as $Wa)
                            beatNumberOptions+= `<option value="{{ $Wa->beat_number }}" ${value['beat_number'] == "{{ $Wa->beat_number }}" ? 'selected' : ''}>{{ $Wa->beat_number}}</option>`;
                        @endforeach



                        // Append HTML for each row dynamically
                        vehicledetail += `
                            <tr id="editRow${key}">
                                <td>
                                    <select name="beat_number[]" class="form-select AddFormBeatNumber" required>
                                     <option value="">Select BeatNumber</option>
                                    ${beatNumberOptions}
                                   </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control editEmployeeName" name="employee_name[]" value="${value['employee_name']}" required  oninput="validateEmployeeName(this)"/>
                                </td>
                                <td>
                                    <input type="text" class="form-control editWasteGenType" required name="waste_gen_type[]" value="${value['waste_gen_type']}" required oninput="validateEmployeeName(this)"/>
                                </td>
                                <td>
                                    <input type="time" class="form-control editInTime" required name="in_time[]" value="${value['in_time']}" required/>
                                </td>
                                <td>
                                    <input type="time" class="form-control editOutTime" required name="out_time[]" value="${value['out_time']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                    });

                    // Append the generated HTML to the vehicle table body
                    $('#editVehicleTableBody').html(vehicledetail);

                 }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
    });
</script>

{{-- add more vehicleschedulinginformation details in edit --}}

<script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreVehicleButton', function() {
        let value = {
            beat_number: '',
            employee_name: '',
            waste_gen_type: '',
            in_time: '',
            out_time: ''
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                    <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required/>
                                    <option value="">Select Beat Number</option>
                                  @foreach($Ward as $Wa)
                                     <option value="{{ $Wa->beat_number }}">{{ $Wa->beat_number}}</option>
                                  @endforeach
                     </select>
                    </td>
                <td>
                    <input type="text" class="form-control editEmployeeName" name="employee_name[]" value="${value['employee_name']}" required oninput="validateEmployeeName(this)"/>
                </td>
                <td>
                    <input type="text" class="form-control editWasteGenerationType" name="waste_gen_type[]" value="${value['waste_gen_type']}" required oninput="validateEmployeeName(this)" />
                </td>
                <td>
                    <input type="Time" class="form-control editInTime" name="in_time[]" value="${value['in_time']}" required />
                </td>
                <td>
                    <input type="Time" class="form-control editInTime" name="out_time[]" value="${value['out_time']}" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#editVehicleTableBody').append(html);
        editRowCounter++;
    });

    // Event to remove a vehicle row (fixed event binding)
    $('body').on('click', '.removeRow', function() {
        let rowId = $(this).data('id');
        $(`#editRow${rowId}`).remove();
    });
</script>
<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('vehicle-scheduling-information.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('vehicle-scheduling-information.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this Collection Scheduling?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('vehicle-scheduling-information.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
{{-- Add form for Vehicle Information details --}}
<script>
    $(document).ready(function () {
        let vehicleRowCount = 1; // Counter for unique row IDs
        let defaultRowAdded = false; // Flag to check if default row is already added

        // Function to append the default or new vehicle row
        function appendVehicleRow() {
            let html = `<tr id="vehicleRow${vehicleRowCount}">
                            <td>
                               <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required/>
                                    <option value="">Select Beat Number</option>
                                  @foreach($Ward as $Wa)
                                     <option value="{{ $Wa->beat_number }}">{{ $Wa->beat_number}}</option>
                                  @endforeach
                            </select>
                            </td>
                            <td>
                                <input type="text" name="employee_name[]" class="form-control" placeholder="Enter employee name" required oninput="validateEmployeeName(this)">
                            </td>
                            <td>
                                <input type="text" name="waste_gen_type[]" class="form-control" placeholder="Enter waste generated type" required oninput="validateEmployeeName(this)">
                            </td>
                            <td>
                                <input type="time" name="in_time[]" class="form-control" required>
                            </td>
                            <td>
                                <input type="time" name="out_time[]" class="form-control" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removeVehicleRow" data-id="${vehicleRowCount}">Remove</button>
                            </td>
                        </tr>`;
            $('#vehicleTableBody').append(html); // Append the row to the table body
            vehicleRowCount++; // Increment the row counter for unique IDs
        }

        // Add the first row by default when the page loads
        if (!defaultRowAdded) {
            appendVehicleRow(); // Add the default row initially
            defaultRowAdded = true; // Set the flag to true to prevent adding more rows by default
        }

        // Add More Button functionality (after the default row)
        $('#addMoreVehicleButton').on('click', function () {
            appendVehicleRow(); // Add a new row when the button is clicked
        });

        // Remove Row functionality
        $('body').on('click', '.removeVehicleRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#vehicleRow${rowId}`).remove(); // Remove the corresponding row
        });
    });
</script>

{{-- view --}}
<script>
    $('body').on('click', '.view-element', function(){
        var model_id = $(this).attr("data-id");
        var url = "{{ route('vehicle-scheduling-information.show', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                newMaterialRequest: 'new'
            },
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    // First Table HTML for Main Data
                    let mainDataHtml = `
                        <tr>
                            <td>${data.vehicleSchedulingInformation.vehicle_type}</td>
                            <td>${data.vehicleSchedulingInformation.vehicle_number}</td>
                            <td>${data.vehicleSchedulingInformation.schedule_form}</td>
                            <td>${data.vehicleSchedulingInformation.schedule_to}</td>
                            <td>${data.vehicleSchedulingInformation.recurrence}</td>
                        </tr>
                    `;
                    $('#VehicleInformationModel').html(mainDataHtml);

                    // Second Table HTML for Additional Details
                    let additionalDetailsHtml = '';
                    $.each(data.vehicleInformation, function(key, value) {
                        additionalDetailsHtml += `
                            <tr>
                                <td>${value.beat_number}</td>
                                <td>${value.employee_name}</td>
                                <td>${value.waste_gen_type}</td>
                                <td>${value.in_time}</td>
                                <td>${value.out_time}</td>
                            </tr>
                        `;
                    });
                    $('#AdditionalVehicleInformationModel').html(additionalDetailsHtml);

                } else {
                    swal("Error!", data.error, "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });
    });
</script>
<script>
    function validateEmployeeName(input) {
        // Replace any non-alphabet or non-space characters with an empty string
        input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
    }
    </script>

