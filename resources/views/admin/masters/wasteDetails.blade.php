<x-admin.layout>
    <x-slot name="title">Waste Details</x-slot>
    <x-slot name="heading">Waste Details</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Waste Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="collection_center">collection Center<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="collection_center" name="collection_center" type="text" placeholder="Enter collection center"> --}}
                                    <select class="form-select" name="collection_center" id="collection_center">
                                        <option value="">select Plant Name</option>
                                         @foreach ($collectionCenters as $collection)
                                            <option value="{{$collection->p_name}}">{{$collection->p_name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid collection_center_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="inspector_name">Inspector Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="inspector_name" name="inspector_name" type="text" placeholder="Enter inspector name">
                                    <span class="text-danger is-invalid inspector_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="total_garbage_collected">Total Garbage Collected<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <input class="form-control" id="total_garbage_collected" name="total_garbage_collected" type="number" placeholder="Enter Total Garbage Collected"   min="0"
                                    max="1000"
                                    step="0.01">
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-control" id="weight_unit" name="total_garbage" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid total_garbage_collected_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date">Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date" name="date" type="date" placeholder="Enter date">
                                    <span class="text-danger is-invalid date_err"></span>
                                </div>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Segregation</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Waste Type</th>
                                                <th>Waste Sub-Type1</th>
                                                <th>Waste Sub-Type2</th>
                                                <th>Volume</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="addMoreSegregationButton">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="SegregationTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-right"><strong>Total Volume</strong></td>
                                                <td id="totalVolume" class="text-center">
                                                    <input type="text" id="totalVolumeField" class="form-control" readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
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
                            <h4 class="card-title">Edit Waste Details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="collection_center">Collection Center<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="collection_center" name="collection_center" type="text" placeholder="Enter Collection Center"> --}}
                                    <select class="form-select" name="collection_center" id="collection_center">
                                        <option value="">select Plant Name</option>
                                         @foreach ($collectionCenters as $collection)
                                            <option value="{{$collection->p_name}}">{{$collection->p_name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid collection_center_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="inspector_name">Inspector Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="inspector_name" name="inspector_name" type="text" placeholder="Enter Inspector Name">
                                    <span class="text-danger is-invalid inspector_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="total_garbage_collected">Total Garbage Collected<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                    <input class="form-control" id="total_garbage_collected" name="total_garbage_collected" type="number" placeholder="Enter Total Garbage Collected"   min="0"
                                    max="1000"
                                    step="0.01">
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-control" id="weight_unit" name="total_garbage" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid total_garbage_collected_err"></span>
                                </div>
                                    <span class="text-danger is-invalid total_garbage_collected_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date">Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date" name="date" type="date" placeholder="Enter date">
                                    <span class="text-danger is-invalid date_err"></span>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Segregation</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Waste Type</th>
                                                <th>Waste Sub-Type1</th>
                                                <th>Waste Sub-Type2</th>
                                                <th>Volume</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="editMoreSegregationButton">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="editSegregationTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-right"><strong>Total Volume</strong></td>
                                                <td id="totalVolume" class="text-center">
                                                    <input type="text" id="editTotalVolumeField" class="form-control " readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
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
                                        <th>Collection Center</th>
                                        <th>Inspector Name</th>
                                        <th>Total Garbage Collected</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($WasteDetails as $Waste)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$Waste->collection_center}}</td>
                                        <td>{{$Waste->inspector_name}}</td>
                                        <td>{{$Waste->total_garbage_collected}}</td>
                                        <td>{{$Waste->date}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Waste" data-id="{{ $Waste->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Waste" data-id="{{ $Waste->id }}"><i data-feather="trash-2"></i></button>
                                                {{-- <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $Waste->id }}"><i data-feather="eye"  data-id="{{ $Waste->id }}"  data-bs-toggle="modal" data-bs-target=".vehicalModel"></i></button> --}}
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $Waste->id }}"><i data-feather="eye"  data-id="{{ $Waste->id }}"  data-bs-toggle="modal" data-bs-target=".wastedetails"></i></button>
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
        <div class="modal fade wastedetails" tabindex="-1" role="dialog" aria-labelledby="wastedetailsLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h5 class="modal-title" id="wastedetailsLabel">Waste Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body" id="stockData">
                            <!-- First Table: Main Data -->
                            <div id="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Collection Center</th>
                                            <th>Inspector Name</th>
                                            <th>Total Garbage Collected</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody id="wastedetailsModel">
                                        <!-- Data will be injected here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Second Table: Additional Details -->
                            <div id="additional-info-table" class="mt-4">
                                <h5 class="modal-title">Segregation</h5>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Waste Type</th>
                                            <th>Waste Sub-Type1</th>
                                            <th>Waste Sub-Type2</th>
                                            <th>Volume</th>
                                        </tr>
                                    </thead>
                                    <tbody id="SegregationModel">
                                        <!-- Additional data will be injected here -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total Volume</strong></td>
                                            <td id="totalViewVolume"></td> <!-- Total Volume will be displayed here -->
                                        </tr>
                                    </tfoot>
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
            url: '{{ route('waste-details.store') }}',
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
                            window.location.href = '{{ route('waste-details.index') }}';
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
        var url = "{{ route('waste-details.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.WasteDetails.id);
                    $("#editForm select[name='collection_center']").val(data.WasteDetails.collection_center);
                    $("#editForm input[name='inspector_name']").val(data.WasteDetails.inspector_name);
                    $("#editForm input[name='total_garbage_collected']").val(data.WasteDetails.total_garbage_collected);
                    $("#editForm input[name='date']").val(data.WasteDetails.date);

                      // Dynamically generate vehicle details rows
                      let Segregation = "";
                      let totalVolum = 0;
                      $.each(data.Segregation, function(key, value) {

                        let wastetypeOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller
                       @foreach($WasteTypeDetails as $WasteType)
                       wastetypeOptions += `<option value="{{ $WasteType->id }}" ${value['waste_type'] == "{{ $WasteType->id }}" ? 'selected' : ''}>{{ $WasteType->value }}</option>`;
                       @endforeach

                        // Append HTML for each row dynamically
                        Segregation += `
                            <tr id="editRow${key}">
                                <td>
                                     <select name="waste_type[]" class="form-select AddFormWasteType" required>
                                     <option value="">Select WasteType</option>
                                    ${wastetypeOptions}
                                   </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control editWasteSubType1" name="waste_sub_type1[]" value="${value['waste_sub_type1']}" required />
                                </td>
                                <td>
                                    <input type="text" class="form-control editWasteSubType2" required name="waste_sub_type2[]" value="${value['waste_sub_type2']}" />
                                </td>
                                <td>
                                   <div class="input-group">
                               <!-- Input field for volume -->
                                 <input
                                 type="number"
                                 class="form-control editVolume"
                                 name="volume[]"
                                 value="${value['volume']}"
                                placeholder="Enter volume"
                               required
                            />
                          <!-- Kilogram unit display -->
                          <span class="input-group-text">Kg</span>
                        </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                        totalVolum = totalVolum + parseInt(value['volume']);
                    });

                    // Append the generated HTML to the vehicle table body
                    $('#editTotalVolumeField').val(totalVolum)
                    $('#editSegregationTableBody').html(Segregation);

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
{{-- add more Segregation in edit --}}
<script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreSegregationButton', function() {
        let value = {
            waste_type: '',      // Default empty value or dynamically populated
            waste_sub_type1: '',   // Default empty value or dynamically populated
            waste_sub_type2: '',
            volume: ''    // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                 <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select waste type</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->id }}">{{ $WasteType->value}}</option>
                                  @endforeach
                                </select>
                </td>
                <td>
                    <input type="text" class="form-control editWasteSubType1" name="waste_sub_type1[]" value="${value['waste_sub_type1']}" required />
                </td>
                <td>
                    <input type="text" class="form-control editWasteSubType2" name="waste_sub_type2[]" value="${value['waste_sub_type2']}" required />
                </td>
                 <td>
                    <input type="number" class="form-control editvolume" name="volume[]" value="${value['volume']}" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#editSegregationTableBody').append(html);
        editRowCounter++;
    });

    $('body').on('click', '.removeRow', function () {
        let rowId = $(this).data('id');
        $(`#editRow${rowId}`).remove();
        calculateTotalVolumeEdit(); // Recalculate the total volume after removing a row
    });

    // Event to recalculate the total volume when any volume field is updated
    $('body').on('input', 'input[name="volume[]"]', function () {
        calculateTotalVolumeEdit();
    });

    function calculateTotalVolumeEdit() {
        let totalVolume = 0;
        // Iterate through each volume field and sum up the values
        $('input[name="volume[]"]').each(function () {
            let volume = parseFloat($(this).val());
            if (!isNaN(volume)) {
                totalVolume += volume;
            }
        });
        // Update the total volume field
        $('#editTotalVolumeField').val(totalVolume.toFixed(2)); // Display total volume with 2 decimal places
    }
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
            var url = "{{ route('waste-details.update', ":model_id") }}";
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
                                window.location.href = '{{ route('waste-details.index') }}';
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
            title: "Are you sure to delete this Waste Details?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('waste-details.destroy', ":model_id") }}";

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

{{-- Add More form for Segregation --}}
<script>
    $(document).ready(function () {
        let SegregationRowCount = 1; // Counter for unique row IDs

        // Automatically show the first row when the page loads
        let html = `<tr id="SegregationRow${SegregationRowCount}">
                        <td>
                             <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select waste type</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->id }}">{{ $WasteType->value}}</option>
                                  @endforeach
                                </select>
                        </td>
                        <td>
                            <input type="text" name="waste_sub_type1[]" class="form-control" placeholder="Enter waste sub type1" required>
                        </td>
                        <td>
                            <input type="text" name="waste_sub_type2[]" class="form-control" placeholder="Enter waste sub type2" required>
                        </td>
                         <td>
                            <div class="input-group">
                                <!-- Input field for volume -->
                                <input
                                    type="number"
                                    name="volume[]"
                                    class="form-control volumeInput"
                                    placeholder="Enter volume"
                                    required
                                />
                                <!-- Kilogram unit display -->
                                <span class="input-group-text">Kg</span>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removeSegregationRow" data-id="${SegregationRowCount}">Remove</button>
                        </td>
                    </tr>`;
        $('#SegregationTableBody').append(html); // Append the first row to the table body
        SegregationRowCount++; // Increment the row counter for unique IDs

        // Add More Button Functionality (now only for adding extra rows after initial load)
        $('#addMoreSegregationButton').on('click', function () {
            let html = `<tr id="SegregationRow${SegregationRowCount}">
                            <td>
                                  <select name="waste_type[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select waste type</option>
                                  @foreach($WasteTypeDetails as $WasteType)
                                     <option value="{{ $WasteType->Main_Prefix }}">{{ $WasteType->value}}</option>
                                  @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="waste_sub_type1[]" class="form-control" placeholder="Enter waste sub type1" required>
                            </td>
                            <td>
                                <input type="text" name="waste_sub_type2[]" class="form-control" placeholder="Enter waste sub type2" required>
                            </td>
                                                        <td>
                                <div class="input-group">
                                    <!-- Input field for volume -->
                                    <input
                                        type="number"
                                        name="volume[]"
                                        class="form-control volumeInput"
                                        placeholder="Enter volume"
                                        required
                                    />
                                    <!-- Kilogram unit display -->
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removeSegregationRow" data-id="${SegregationRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#SegregationTableBody').append(html); // Append the new row to the table body
            SegregationRowCount++; // Increment the row counter for unique IDs
        });

        // Remove Row Functionality
        $('body').on('click', '.removeSegregationRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#SegregationRow${rowId}`).remove(); // Remove the corresponding row
            calculateTotalVolume(); // Recalculate total volume after removal
        });

        // Event listener to calculate total volume when the volume input field is updated
        $('body').on('input', '.volumeInput', function () {
            calculateTotalVolume(); // Recalculate total volume whenever a volume input changes
        });

        // Function to calculate and update the total volume
        function calculateTotalVolume() {
            let totalVolume = 0;
            // Iterate through each volume field and sum up the values
            $('input[name="volume[]"]').each(function () {
                let volume = parseFloat($(this).val());
                if (!isNaN(volume)) {
                    totalVolume += volume;
                }
            });
            // Update the total volume field
            $('#totalVolumeField').val(totalVolume.toFixed(2)); // Display total volume with 2 decimal places
        }
    });
</script>

{{-- views --}}
<script>
    $('body').on('click', '.view-element', function () {
        var model_id = $(this).data("id");
        var url = "{{ route('waste-details.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function (data) {
                // Check if data is correct
                console.log(data);

                if (data.result === 1) {
                    // Populate First Table: Waste Details
                    let mainDataHtml = `
                        <tr>
                            <td>${data.WasteDetails.collection_center || 'N/A'}</td>
                            <td>${data.WasteDetails.inspector_name || 'N/A'}</td>
                            <td>${data.WasteDetails.total_garbage_collected || 'N/A'}</td>
                            <td>${data.WasteDetails.date || 'N/A'}</td>
                        </tr>
                    `;
                    $('#wastedetailsModel').html(mainDataHtml);

                    // Populate Second Table: Segregation Data
                    let segregationHtml = '';
                    let totalVolume = 0;

                    // Check if Segregation exists
                    if (data.Segregation && Array.isArray(data.Segregation)) {
                        $.each(data.Segregation, function (key, value) {
                            let volume = parseFloat(value.volume) || 0; // Ensure numeric volume
                            totalVolume += volume;

                            segregationHtml += `
                                <tr>
                                    <td>${value?.waste_type?.value || 'N/A'}</td>
                                    <td>${value.waste_sub_type1 || 'N/A'}</td>
                                    <td>${value.waste_sub_type2 || 'N/A'}</td>
                                    <td>${volume.toFixed(2)}</td>
                                </tr>
                            `;
                        });
                    } else {
                        segregationHtml = '<tr><td colspan="4">No segregation data available.</td></tr>';
                    }

                    $('#SegregationModel').html(segregationHtml);
                    $('#totalViewVolume').html(totalVolume)
                    $('#totalVolume').text(totalVolume.toFixed(2)); // Display Total Volume
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


