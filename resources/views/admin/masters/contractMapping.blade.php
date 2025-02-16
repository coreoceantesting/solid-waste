<x-admin.layout>
    <x-slot name="title">Contract Mapping</x-slot>
    <x-slot name="heading">Contract Mapping</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add ContractMapping</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_number">Contract Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_number" name="contract_number" type="text" placeholder="Enter Contract Number">
                                    <span class="text-danger is-invalid contract_number_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_name">Contract Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_name" name="contract_name" type="text" placeholder="Enter Contract Name">
                                    <span class="text-danger is-invalid contract_name_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contact_number">Contact Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact_number" name="contact_number" maxlength="10" type="text" placeholder="Enter contact Number">
                                    <span class="text-danger is-invalid contact_number_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_date">Contract Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_date" name="contract_date" type="Date" placeholder="Enter Contract Date" onkeydown="return false;">
                                    <span class="text-danger is-invalid contract_date_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="expiry_date">Expiry Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="expiry_date" name="expiry_date" type="Date" placeholder="Enter Expiery Date" onkeydown="return false;">
                                    <span class="text-danger is-invalid expiry_date_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Task Mapping</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Zone</th>
                                            <th>Ward</th>
                                            <th>Colony</th>
                                            <th>Society</th>
                                            <th>Task</th>
                                            <th>Waste Type</th>
                                            <th>Garbage Volume</th>
                                            <th>Beat Number</th>
                                            <th>Employee Count</th>
                                            <th>Vehicle Count</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="addtaskmapping">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="taskmappingBody">
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
                            <h4 class="card-title">Edit ContractMapping</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_number">Contract Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_number" name="contract_number" type="text"  placeholder="Enter contract number">
                                    <span class="text-danger is-invalid contract_number_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_name">Contract Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_name" name="contract_name" type="text"  placeholder="Enter Contract Name">
                                    <span class="text-danger is-invalid contract_name_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contact_number">Contact Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contact_number" name="contact_number" type="text" maxlength="10" placeholder="Enter Contact Number">
                                    <span class="text-danger is-invalid contact_number_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="contract_date">Contract Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="contract_date" name="contract_date" type="Date" placeholder="Enter Contract Date" onkeydown="return false;">
                                    <span class="text-danger is-invalid contract_date_err"></span>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label" for="expiry_date">Expiry Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="expiry_date" name="expiry_date" type="Date" placeholder="Enter Expiry Date" onkeydown="return false;">
                                    <span class="text-danger is-invalid expiry_date_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Task Mapping</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Zone</th>
                                            <th>Ward</th>
                                            <th>Colony</th>
                                            <th>Society</th>
                                            <th>Task</th>
                                            <th>Waste Type</th>
                                            <th>Garbage Volume</th>
                                            <th>Beat Number</th>
                                            <th>Employee Count</th>
                                            <th>Vehicle Count</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="editmoretaskmapping">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="edittaskmappingBody">
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
                                        <th>Contract Number</th>
                                        <th>Contract Name</th>
                                        <th>contact Number</th>
                                        <th>contract Date</th>
                                        <th>Expiry  Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ContractMapping as $Contract)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$Contract->contract_number}}</td>
                                        <td>{{$Contract->contract_name}}</td>
                                        <td>{{$Contract->contact_number}}</td>
                                        <td>{{$Contract->contract_date}}</td>
                                        <td>{{$Contract->expiry_date}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Designation" data-id="{{ $Contract->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Designation" data-id="{{ $Contract->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $Contract->id }}"><i data-feather="eye"  data-id="{{ $Contract->id }}"  data-bs-toggle="modal" data-bs-target=".contractMapping"></i></button>
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
            <div class="modal fade contractMapping" tabindex="-1" role="dialog" aria-labelledby="contractMappingLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h5 class="modal-title" id="contractMappingLabel">Contract Mapping</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body" id="stockData">
                                <!-- First Table: Main Data -->
                                <div id="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Contract Number</th>
                                                <th>Contract Name</th>
                                                <th>Contact Number</th>
                                                <th>Contract Date</th>
                                                <th>Expiry Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ContractMappingModel">
                                            <!-- Data will be injected here -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Second Table: Additional Details -->
                                <div id="additional-info-table" class="mt-4">
                                        <h5 class="modal-title" id="contractMappingLabel">Task Mapping</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Zone</th>
                                                <th>Ward</th>
                                                <th>Colony</th>
                                                <th>Society</th>
                                                <th>Task</th>
                                                <th>Waste Type</th>
                                                <th>Garbage Volume</th>
                                                <th>Beat Number</th>
                                                <th>Employee Count</th>
                                                <th>Vehicle Count</th>
                                            </tr>
                                        </thead>
                                        <tbody id="TaskMappingModel">
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
            url: '{{ route('contract-mapping.store') }}',
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
                            window.location.href = '{{ route('contract-mapping.index') }}';
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
        var url = "{{ route('contract-mapping.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.ContractMapping.id);
                    $("#editForm input[name='contract_number']").val(data.ContractMapping.contract_number);
                    $("#editForm input[name='contract_name']").val(data.ContractMapping.contract_name);
                    $("#editForm input[name='contact_number']").val(data.ContractMapping.contact_number);
                    $("#editForm input[name='contract_date']").val(data.ContractMapping.contract_date);
                    $("#editForm input[name='expiry_date']").val(data.ContractMapping.expiry_date);

                    // Dynamically generate vehicle details rows
                   let taskmapping = "";
                   let count = 0;
                   $.each(data.TaskMapping, function(key, value) {
                   let CapacityOfVehicleOptions = ''; // Variable to hold vehicle type options
                   // Loop through VehicleType data dynamically from the controller
                   //
                   @foreach($CapacityOfVehicle as $Capacity)
                   CapacityOfVehicleOptions += `<option value="{{ $Capacity->waste_types }}" ${value['waste_type'] == "{{ $Capacity->waste_types }}" ? 'selected' : ''}>{{ $Capacity->waste_types }}</option>`;
                  @endforeach

                 let BeatNumberOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller
                 @foreach($Ward as $Wa)
                 BeatNumberOptions += `<option value="{{ $Wa->id }}" ${value['beat_number'] == "{{ $Wa->id }}" ? 'selected' : ''}>{{ $Wa->beat_number }}</option>`;
                 @endforeach

             // Append HTML for each row dynamically

                let ZoneOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller
                 @foreach($ZoneDetails as $Zone)
                 ZoneOptions += `<option value="{{ $Zone->id }}" ${value['zone'] == "{{ $Zone->id}}" ? 'selected' : ''}>{{ $Zone->value }}</option>`;
                 @endforeach


                let wastetypeOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller

                 @foreach($WasteTypeDetails as $WasteType)
                 wastetypeOptions += `<option value="{{ $WasteType->id}}" ${value['waste_type'] == "{{ $WasteType->id }}" ? 'selected' : ''}>{{ $WasteType->value }}</option>`;
                 @endforeach

             //
             taskmapping += `
             <tr id="editRow${key}">
             <td>
                <select name="zone[]" class="form-select AddFormZone" required>
                    <option value="">--Select zone--</option>
                    <option value="">ALL</option>
                    ${ZoneOptions}
                </select>
             </td>
             <td>
                <input type="text" class="form-control editWard" required name="ward[]" value="${value['ward']}" required />
             </td>
             <td>
                <input type="text" class="form-control editColony" required name="colony[]" value="${value['colony']}" required />
             </td>
             <td>
                <input type="text" class="form-control editSociety" required name="society[]" value="${value['society']}" required />
             </td>
             <td>
                <input type="text" class="form-control editTask" required name="task[]" value="${value['task']}" required />
             </td>
            <td>
                  <select name="waste_type[]" class="form-select AddFormWasteType" required>
                    <option value="">--Select WasteType--</option>
                    <option value="">ALL</option>
                    ${wastetypeOptions}
                </select>
             </td>
             <td>
                <div class="input-group">
                <input type="number" class="form-control editGarbageVolume" required name="garbage_volume[]" value="${value['garbage_volume']}" required/>
                 <span class="input-group-text">Kg</span>
                 </div>
             </td>
             <td>
                  <select name="beat_number[]" class="form-select AddFormBeatNumber" required>
                    <option value="">--Select WasteType--</option>
                    ${BeatNumberOptions}
                </select>
             </td>
             <td>
                <input type="number" class="form-control editEmployeeCount" required name="employee_count[]" value="${value['employee_count']}" required/>
             </td>
             <td>
                <input type="number" class="form-control editVehicleCount" required name="vehicle_count[]" value="${value['vehicle_count']}" required/>
             </td>
             <td>
                <button type="button" class="btn btn-danger removeRow ${(count==0)?'d-none':''}" data-id="${key}">Remove</button>
            </td>
        </tr>
     `;
     count++;
    });

// Append the generated HTML to the vehicle table body
  $('#edittaskmappingBody').html(taskmapping);
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
{{-- add more Task Maping in edit --}}
 <script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editmoretaskmapping', function() {
        let value = {
            zone: '',      // Default empty value or dynamically populated
            ward: '',   // Default empty value or dynamically populated
            colony: '',    // Default empty value or dynamically populated
            society: '',      // Default empty value or dynamically populated
            task: '',   // Default empty value or dynamically populated
            waste_type: '',
            garbage_volume: '',    // Default empty value or dynamically populated
            beat_number: '',      // Default empty value or dynamically populated
            employee_count: '',   // Default empty value or dynamically populated
            vehicle_count: '',
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                    <select name="zone[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">--Select zone--</option>
                                  @foreach($ZoneDetails as $Zone)
                                     <option value="{{ $Zone->id }}">{{ $Zone->value}}</option>
                                  @endforeach
                     </select>
                </td>
                 <td>
                    <input type="text" class="form-control editward" name="ward[]" value="${value['ward']}" required />
                </td>
                 <td>
                    <input type="text" class="form-control editcolony" name="colony[]" value="${value['colony']}" required />
                </td>
                 <td>
                    <input type="text" class="form-control editsociety" name="society[]" value="${value['society']}" required />
                </td>
                <td>
                    <input type="text" class="form-control edittask" name="task[]" value="${value['task']}" required />
                </td>
                <td>
                    <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">--Select waste type--</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->id }}">{{ $WasteType->value}}</option>
                                  @endforeach
                     </select>
                </td>
                <td>
                     <div class="input-group">
                    <input type="number" class="form-control editGarbageVolume" name="garbage_volume[]" value="${value['garbage_volume']}" required />
                    <span class="input-group-text">Kg</span>
                     </div>
                </td>
                <td>
                      <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required/>
                                    <option value="">--Select Beat Number--</option>
                                  @foreach($Ward as $Wa)
                                     <option value="{{ $Wa->id }}">{{ $Wa->beat_number}}</option>
                                  @endforeach
                     </select>
                </td>
                <td>
                    <input type="number" class="form-control editEmployeeCount" name="employee_count[]" value="${value['employee_count']}" required />
                </td>
                <td>
                    <input type="number" class="form-control editVehicleCount" name="vehicle_count[]" value="${value['vehicle_count']}" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#edittaskmappingBody').append(html);
        editRowCounter++;
    });

    // Event to remove a vehicle row (fixed event binding)/
    // $('body').on('click', '.removeRow', function() {
    //     let rowId = $(this).data('id');
    //     $(`#editRow${rowId}`).remove();
    // });


     // Add More Button functionality (after the default row)
       $('#editmoretaskmapping').on('click', function () {
            appendVehicleRow(); // Add a new row when the button is clicked
        });

        // Event to remove a vehicle row
        $('body').on('click', '.removeRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            const rowCount = $('#edittaskmappingBody tr').length; // Get the total number of rows in the table

            // Ensure at least one row remains
            if (rowCount > 1) {
                $(`#editRow${rowId}`).remove(); // Remove the corresponding row
            }
        });
</script>

{{-- <script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editmoretaskmapping', function() {
        let value = {
            zone: '',      // Default empty value or dynamically populated
            ward: '',      // Default empty value or dynamically populated
            colony: '',    // Default empty value or dynamically populated
            society: '',   // Default empty value or dynamically populated
            task: '',      // Default empty value or dynamically populated
            waste_type: '',
            garbage_volume: '',    // Default empty value or dynamically populated
            beat_number: '',      // Default empty value or dynamically populated
            employee_count: '',   // Default empty value or dynamically populated
            vehicle_count: '',
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                    <select name="zone[]" class="form-select AddFormSelectzone" required>
                        <option value="">Select zone</option>
                        @foreach($ZoneDetails as $Zone)
                            <option value="{{ $Zone->id }}">{{ $Zone->value }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control editward" name="ward[]" value="${value['ward']}" required />
                </td>
                <td>
                    <input type="text" class="form-control editcolony" name="colony[]" value="${value['colony']}" required />
                </td>
                <td>
                    <input type="text" class="form-control editsociety" name="society[]" value="${value['society']}" required />
                </td>
                <td>
                    <input type="text" class="form-control edittask" name="task[]" value="${value['task']}" required />
                </td>
                <td>
                    <select name="waste_type[]" class="form-select AddFormSelectzone" required>
                        <option value="">Select waste type</option>
                        @foreach($WasteTypeDetails as $WasteType)
                            <option value="{{ $WasteType->id }}">{{ $WasteType->value }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="input-group">
                        <input type="number" class="form-control editGarbageVolume" name="garbage_volume[]" value="${value['garbage_volume']}" required />
                        <span class="input-group-text">Kg</span>
                    </div>
                </td>
                <td>
                    <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required>
                        <option value="">Select Beat Number</option>
                        @foreach($Ward as $Wa)
                            <option value="{{ $Wa->id }}">{{ $Wa->beat_number }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control editEmployeeCount" name="employee_count[]" value="${value['employee_count']}" required />
                </td>
                <td>
                    <input type="number" class="form-control editVehicleCount" name="vehicle_count[]" value="${value['vehicle_count']}" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;

        // Append the new row to the table body
        $('#edittaskmappingBody').append(html);
        editRowCounter++;
    });

    // Event to remove a vehicle row (fixed event binding)
    $('body').on('click', '.removeRow', function() {
        let rowId = $(this).data('id');

        // Check if the row has been edited before allowing removal
        let isRowEdited = $(`#editRow${rowId}`).find('input, select').toArray().some(input => $(input).val() !== '');

        if (isRowEdited) {
            // If the row has been edited, allow removal
            $(`#editRow${rowId}`).remove();
        } else {
            // If not edited, you may show an alert or prevent removal
            alert('You need to edit this row before removing it.');
        }
    });

</script>
 --}}


<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('contract-mapping.update', ":model_id") }}";
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
                                window.location.href = '{{ route('contract-mapping.index') }}';
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
            title: "Are you sure to delete this Contract Mapping?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('contract-mapping.destroy', ":model_id") }}";

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
{{-- Add more functionality in task mapping  --}}
{{-- <script>
    $(document).ready(function () {
        let taskRowCount = 1; // Counter for unique row IDs
        let defaultRowAdded = false; // Flag to check if default row is already added

        // Function to append the default or new task row
        function appendTaskRow() {
            let html = `<tr id="taskRow${taskRowCount}">
                            <td>
                                <select name="zone[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select zone</option>
                                  @foreach($ZoneDetails as $Zone)
                                     <option value="{{ $Zone->id }}">{{ $Zone->value}}</option>
                                  @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="ward[]" class="form-control" placeholder="Enter ward" required/>
                            </td>
                            <td>
                                <input type="text" name="colony[]" class="form-control" placeholder="Enter colony" required />
                            </td>
                            <td>
                                <input type="text" name="society[]" class="form-control" placeholder="Enter society" required />
                            </td>
                            <td>
                                <input type="text" name="task[]" class="form-control" placeholder="Enter task" required />
                            </td>
                            <td>
                                <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select waste type</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->id }}">{{ $WasteType->value}}</option>
                                  @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="input-group">
                                <input type="number" name="garbage_volume[]" class="form-control" placeholder="Enter Garbage Volume" required/>
                                <span class="input-group-text">Kg</span>
                                </div>
                            </td>
                             <td>
                                <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required/>
                                    <option value="">Select Beat Number</option>
                                  @foreach($Ward as $Wa)
                                     <option value="{{ $Wa->id }}">{{ $Wa->beat_number}}</option>
                                  @endforeach
                             </select>
                            </td>
                            <td>
                                <input type="number" name="employee_count[]" class="form-control" placeholder="Enter Employee Count" required/>
                            </td>
                            <td>
                                <input type="number" name="vehicle_count[]" class="form-control" placeholder="Enter vehicle Count" required/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removetaskRow" data-id="${taskRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#taskmappingBody').append(html); // Append the new row to the table body
            taskRowCount++; // Increment the row counter for unique IDs
        }

        // Initially add the first row by default when the page loads
        if (!defaultRowAdded) {
            appendTaskRow(); // Add the default row initially
            defaultRowAdded = true; // Set the flag to true to prevent adding more rows by default
        }

        // Add More Button functionality (after the default row)
        $('#addtaskmapping').on('click', function () {
            appendTaskRow(); // Add a new row when the button is clicked
        });

        // Remove Row functionality
        $('body').on('click', '.removetaskRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#taskRow${rowId}`).remove(); // Remove the corresponding row
        });
    });
</script> --}}
<script>
    $(document).ready(function () {
        let taskRowCount = 1; // Counter for unique row IDs
        let defaultRowAdded = false; // Flag to check if default row is already added

        // Function to append the default or new task row
        function appendTaskRow() {
            let html = `<tr id="taskRow${taskRowCount}">
                            <td>
                                <select name="zone[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">--Select zone--</option>
                                    <option value="">ALL</option>
                                  @foreach($ZoneDetails as $Zone)
                                     <option value="{{ $Zone->id }}">{{ $Zone->value}}</option>
                                  @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="ward[]" class="form-control" placeholder="Enter ward" required/>
                            </td>
                            <td>
                                <input type="text" name="colony[]" class="form-control" placeholder="Enter colony" required />
                            </td>
                            <td>
                                <input type="text" name="society[]" class="form-control" placeholder="Enter society" required />
                            </td>
                            <td>
                                <input type="text" name="task[]" class="form-control" placeholder="Enter task" required />
                            </td>
                            <td>
                                <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">--Select waste type--</option>
                                    <option value="">ALL</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->id }}">{{ $WasteType->value}}</option>
                                  @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="input-group">
                                <input type="number" name="garbage_volume[]" class="form-control" placeholder="Enter Garbage Volume" required/>
                                <span class="input-group-text">Kg</span>
                                </div>
                            </td>
                             <td>
                                <select name="beat_number[]" class="form-select AddFormSelectBeatNumber" required/>
                                    <option value="">--Select Beat Number--</option>
                                    <option value="">ALL</option>
                                  @foreach($Ward as $Wa)
                                     <option value="{{ $Wa->id }}">{{ $Wa->beat_number}}</option>
                                  @endforeach
                             </select>
                            </td>
                            <td>
                                <input type="number" name="employee_count[]" class="form-control" placeholder="Enter Employee Count" required/>
                            </td>
                            <td>
                                <input type="number" name="vehicle_count[]" class="form-control" placeholder="Enter vehicle Count" required/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removetaskRow" data-id="${taskRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#taskmappingBody').append(html); // Append the new row to the table body
            taskRowCount++; // Increment the row counter for unique IDs


            $('#taskmappingBody tr:first .removetaskRow').hide();
        }

        // Initially add the first row by default when the page loads
        if (!defaultRowAdded) {
            appendTaskRow(); // Add the default row initially
            defaultRowAdded = true; // Set the flag to true to prevent adding more rows by default
        }

        // Add More Button functionality (after the default row)
        $('#addtaskmapping').on('click', function () {
            appendTaskRow(); // Add a new row when the button is clicked
        });

        // Remove Row functionality
        $('body').on('click', '.removetaskRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            const rowCount = $('#taskmappingBody tr').length; // Get the total number of rows in the table

            // Ensure at least one row remains
            if (rowCount > 1) {
                $(`#taskRow${rowId}`).remove(); // Remove the corresponding row
            }
        });
    });
</script>
{{-- view --}}
<script>
    $(document).on('click', '.view-element', function() {
        var model_id = $(this).data("id"); // Correct way to access data-id
        var url = "{{ route('contract-mapping.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                newMaterialRequest: 'new'
            },
            beforeSend: function() {
                $('#preloader').css({
                    opacity: '0.5',
                    visibility: 'visible'
                });
            },
            success: function(response) {
                if (response.result === 1) {
                    // Populate the First Table (Main Data)
                    let mainDataHtml = `
                        <tr>
                            <td>${response.ContractMapping.contract_number || 'N/A'}</td>
                            <td>${response.ContractMapping.contract_name || 'N/A'}</td>
                            <td>${response.ContractMapping.contact_number || 'N/A'}</td>
                            <td>${response.ContractMapping.contract_date || 'N/A'}</td>
                            <td>${response.ContractMapping.expiry_date || 'N/A'}</td>
                        </tr>
                    `;
                    $('#ContractMappingModel').html(mainDataHtml);

                    // Populate the Second Table (Additional Details)
                    if (response.TaskMapping && response.TaskMapping.length > 0) {
                        let additionalDetailsHtml = '';
                        $.each(response.TaskMapping, function(index, task) {
                            additionalDetailsHtml += `
                                <tr>
                                    <td>${task?.zone?.value || 'N/A'}</td>
                                    <td>${task.ward || 'N/A'}</td>
                                    <td>${task.colony || 'N/A'}</td>
                                    <td>${task.society || 'N/A'}</td>
                                    <td>${task.task || 'N/A'}</td>
                                    <td>${task?.waste_type?.value || 'N/A'}</td>
                                    <td>${task.garbage_volume || 'N/A'}</td>
                                    <td>${task?.beat_number?.beat_number || 'N/A'}</td>
                                    <td>${task.employee_count || 'N/A'}</td>
                                    <td>${task.vehicle_count || 'N/A'}</td>
                                </tr>
                            `;
                        });
                        $('#TaskMappingModel').html(additionalDetailsHtml);
                    } else {
                        $('#TaskMappingModel').html('<tr><td colspan="10" class="text-center">No task data available</td></tr>');
                    }
                } else {
                    swal("Error!", response.message || "Unknown error occurred", "error");
                }
            },
            error: function(xhr) {
                swal("Error!", "Failed to fetch data. Please try again.", "error");
            },
            complete: function() {
                $('#preloader').css({
                    opacity: '0',
                    visibility: 'hidden'
                });
            }
        });
    });
</script>
<script>
    function validateEmployeeName(input) {
        // Replace any non-alphabet or non-space characters with an empty string
        input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
    }
    </script>
<script>


