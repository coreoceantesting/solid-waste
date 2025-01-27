<x-admin.layout>
    <x-slot name="title">Vehicle Target</x-slot>
    <x-slot name="heading">Vehicle Target</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Vehicle Target</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="target_from_date">Target From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="target_from_date" name="target_from_date" type="date" placeholder="Enter Target From Date">
                                    <span class="text-danger is-invalid target_from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="target_to_date">Target To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="target_to_date" name="target_to_date" type="date" placeholder="Enter target_to_date">
                                    <span class="text-danger is-invalid target_to_date_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Vehicle Target Details</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Number</th>
                                            <th>Beat Number</th>
                                            <th>Garbage Volume</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="addMoreVehicleTargetButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="VehicleTargetTableBody">
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
                            <h4 class="card-title">Edit Vehicle Target</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="target_from_date">Target From Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="target_from_date" name="target_from_date" type="date" placeholder="Enter Target From Date">
                                    <span class="text-danger is-invalid target_from_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="target_to_date">Target To Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="target_to_date" name="target_to_date" type="date" placeholder="Enter Target To Date">
                                    <span class="text-danger is-invalid target_to_date_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Vehicle Target Details</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Number</th>
                                            <th>Beat Number</th>
                                            <th>Garbage Volume</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="editVehicleTargetButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="editVehicleTargetTableBody">
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
                                        <th>SR.NO</th>
                                        <th>Target From Date</th>
                                        <th>Target To Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($VehicleTarget as $Vehicle)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $Vehicle->target_from_date }}</td>
                                            <td>{{ $Vehicle->target_to_date }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit VehicleTarget" data-id="{{ $Vehicle->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete VehicleTarget" data-id="{{ $Vehicle->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View VehicleTarget" data-id="{{ $Vehicle->id }}"><i data-feather="eye"  data-id="{{ $Vehicle->id }}"  data-bs-toggle="modal" data-bs-target=".vehicletarget"></i></button>
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
      <div class="modal fade vehicletarget" tabindex="-1" role="dialog" aria-labelledby="vehicletargetLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="vehicletargetLabel">Vehicle Target</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="stockData">
                        <!-- First Table: Main Data -->
                        <div id="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Target From Date</th>
                                        <th>Target To Date</th>
                                    </tr>
                                </thead>
                                <tbody id="vehicletargetModel">
                                    <!-- Data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Second Table: Additional Details -->
                        <div id="additional-info-table" class="mt-4">
                            <h5>Vehicle Target Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vehicle Number</th>
                                        <th>Beat Number</th>
                                        <th>Garbage Volume</th>
                                    </tr>
                                </thead>
                                <tbody id="vehicletargetdetailsModel">
                                    <!-- Additional data will be injected here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.layout>


{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('vehicle-target.store') }}',
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
                            window.location.href = '{{ route('vehicle-target.index') }}';
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
        var url = "{{ route('vehicle-target.edit', ":model_id") }}";


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
                    $("#editForm input[id='edit_model_id']").val(data.VehicleTarget.id);
                    $("#editForm input[name='target_from_date']").val(data.VehicleTarget.target_from_date);
                    $("#editForm input[name='target_to_date']").val(data.VehicleTarget.target_to_date);


                        // Dynamically generate vehicle details rows
                        let VehicleTarget = "";
                        $.each(data.VehicleTargetDetail, function(key, value) {
                            let VehicleNumberOptions = ''; // Variable to hold vehicle type options

                        // Loop through VehicleType data dynamically from the controller
                        @foreach($vehicles as $vehi)
                            VehicleNumberOptions += `<option value="{{ $vehi->Vehicle_number }}" ${value['vehicle_number'] == {{ $vehi->Vehicle_number }} ? 'selected' : ''}>{{ $vehi->Vehicle_number }}</option>`;
                        @endforeach

                        let BeatNumberOptions = ''; // Variable to hold vehicle type options

// Loop through VehicleType data dynamically from the controller
                        @foreach($Ward as $Wa)
                        BeatNumberOptions += `<option value="{{ $Wa->beat_number }}" ${value['beat_number'] == {{ $Wa->beat_number }} ? 'selected' : ''}>{{ $Wa->beat_number }}</option>`;
                        @endforeach


                        // Append HTML for each row dynamically
                        VehicleTarget += `
                            <tr id="editRow${key}">
                                <td>
                                 <select name="vehicle_number[]" class="form-select AddFormvehicleNumber" required>
                                        <option value="">Select vehicleNumber</option>
                                        ${VehicleNumberOptions}
                                    </select>
                                </td>
                                <td>
                                      <select name="beat_number[]" class="form-select AddFormvBeatNumber" required>
                                        <option value="">Select BeatNumber</option>
                                        ${BeatNumberOptions}
                                    </select>
                                </td>
                                 <td>
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            name="garbage_volumne[]"
                                            class="form-control volumeInput"
                                            placeholder="Enter volume"
                                            required
                                        >
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                    });

                    // Append the generated HTML to the vehicle table body
                    $('#editVehicleTargetTableBody').html(VehicleTarget);

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

{{-- add more vehicle details in edit --}}
<script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editVehicleTargetButton', function() {
        let value = {
            vehicle_number: '',      // Default empty value or dynamically populated
            beat_number: '',   // Default empty value or dynamically populated
            garbage_volumne: '',    // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                    <select name="vehicle_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                 <option value="">Select VehicleNumber</option>
                                @foreach($vehicles as $vehi)
                               <option value="{{ $vehi->Vehicle_number }}">{{ $vehi->Vehicle_number }}</option>
                            @endforeach
                          </select>
                </td>
                <td>
                  <select name="beat_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                 <option value="">Select beatNumber</option>
                                @foreach($Ward as $Wa)
                               <option value="{{ $Wa->beat_number }}">{{ $Wa->beat_number }}</option>
                            @endforeach
                          </select>
                </td>
                <td>
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            name="garbage_volumne[]"
                                            class="form-control volumeInput"
                                            placeholder="Enter volume"
                                            required
                                        >
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#editVehicleTargetTableBody').append(html);
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
            var url = "{{ route('vehicle-target.update', ":model_id") }}";
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
                                window.location.href = '{{ route('vehicle-target.index') }}';
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
            title: "Are you sure to delete this Vehicle Target?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('vehicle-target.destroy', ":model_id") }}";

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
{{-- Add form for vehicle target details --}}
<script>
    $(document).ready(function () {
        let vehicletargetRowCount = 1; // Counter for unique row IDs

        // Automatically add the first row when the page loads
        let initialHtml = `<tr id="vehicletargetRow${vehicletargetRowCount}">
                                <td>
                                    <select name="vehicle_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                    <option value="">Select VehicleNumber</option>
                                    @foreach($vehicles as $vehi)
                                    <option value="{{ $vehi->Vehicle_number }}">{{ $vehi->Vehicle_number }}</option>
                                @endforeach
                                </select>
                                </td>
                                <td>
                                    <select name="beat_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                    <option value="">Select beatNumber</option>
                                    @foreach($Ward as $Wa)
                                <option value="{{ $Wa->beat_number }}">{{ $Wa->beat_number }}</option>
                                @endforeach
                                </select>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input
                                            type="number"
                                            name="garbage_volumne[]"
                                            class="form-control volumeInput"
                                            placeholder="Enter volume"
                                            required
                                        >
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removevehicletargetRow" data-id="${vehicletargetRowCount}">Remove</button>
                                </td>
                            </tr>`;
        $('#VehicleTargetTableBody').append(initialHtml); // Append the first row to the table body
        vehicletargetRowCount++; // Increment the row counter for unique IDs

        // Add More Button Functionality
        $('#addMoreVehicleTargetButton').on('click', function () {
            let html = `<tr id="vehicletargetRow${vehicletargetRowCount}">
                            <td>
                                <select name="vehicle_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                    <option value="">Select VehicleNumber</option>
                                    @foreach($vehicles as $vehi)
                                <option value="{{ $vehi->Vehicle_number }}">{{ $vehi->Vehicle_number }}</option>
                                @endforeach
                            </select>
                            </td>
                            <td>
                                <select name="beat_number[]" class="form-select AddFormSelectVehicleNumber" required>
                                    <option value="">Select beatNumber</option>
                                    @foreach($Ward as $Wa)
                                <option value="{{ $Wa->beat_number }}">{{ $Wa->beat_number }}</option>
                                @endforeach
                            </select>
                            </td>
                            <td>
                                <input type="number" name="garbage_volumne[]" class="form-control" placeholder="Enter garbage volume" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removevehicletargetRow" data-id="${vehicletargetRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#VehicleTargetTableBody').append(html); // Append the new row to the table body
            vehicletargetRowCount++; // Increment the row counter for unique IDs
        });

        // Remove Row Functionality
        $('body').on('click', '.removevehicletargetRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#vehicletargetRow${rowId}`).remove(); // Remove the corresponding row
        });
    });
</script>

{{-- view --}}
<script>
    $('body').on('click', '.view-element', function () {
        var model_id = $(this).data("id");
        var url = "{{ route('vehicle-target.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function (data) {
                if (data.result === 1) {
                    // Populate the First Table: Vehicle Target Dates
                    let mainDataHtml = `
                        <tr>
                            <td>${data.VehicleTarget.target_from_date || 'N/A'}</td>
                            <td>${data.VehicleTarget.target_to_date || 'N/A'}</td>
                        </tr>
                    `;
                    $('#vehicletargetModel').html(mainDataHtml); // Corrected ID

                    // Populate the Second Table: Vehicle Target Details
                    let VehicleTargetDetailHtml = '';
                    if (Array.isArray(data.VehicleTargetDetail) && data.VehicleTargetDetail.length > 0) {
                        $.each(data.VehicleTargetDetail, function (key, value) {
                            VehicleTargetDetailHtml += `
                                <tr>
                                    <td>${value.vehicle_number || 'N/A'}</td>
                                    <td>${value.beat_number || 'N/A'}</td>
                                    <td>${value.garbage_volumne || 'N/A'}</td> <!-- Fixed typo -->
                                </tr>
                            `;
                        });
                    } else {
                        VehicleTargetDetailHtml = `<tr><td colspan="3" class="text-center">No data available</td></tr>`;
                    }
                    $('#vehicletargetdetailsModel').html(VehicleTargetDetailHtml); // Corrected ID
                } else {
                    swal("Error!", data.message || "Data not found.", "error");
                }
            },
            error: function () {
                swal("Error!", "Something went wrong while fetching the data.", "error");
            },
            complete: function () {
                $('#preloader').css('opacity', '0').css('visibility', 'hidden');
            },
        });
    });
</script>
