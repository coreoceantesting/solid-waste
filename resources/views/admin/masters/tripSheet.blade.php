<x-admin.layout>
    <x-slot name="title">Trip Sheet</x-slot>
    <x-slot name="heading">Trip Sheet</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Trip Sheet</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="trip_date">Trip Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="trip_date" name="trip_date" type="date" placeholder="Enter Trip Date">
                                    <span class="text-danger is-invalid trip_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="beat_number">Beat Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="beat_number" name="beat_number" type="number" placeholder="Enter Beat Number"> --}}
                                    <select class="form-select" name="beat_number" id="beat_number">
                                        <option value="">select Beat Number</option>
                                         @foreach ($Ward as $Wa)
                                            <option value="{{$Wa->beat_number}}">{{$Wa->beat_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid beat_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_number" name="vehicle_number" type="number" placeholder="Enter Vehicle Number"> --}}
                                    <select class="form-select" name="vehicle_number" id="vehicle_number">
                                        <option value="">select Vehicle Number</option>
                                         @foreach ($vehicles as $vehi)
                                            <option value="{{$vehi->Vehicle_number}}">{{$vehi->Vehicle_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="collection_center">Collection Center<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="collection_center" name="collection_center" type="text" placeholder="Enter Collection Center"> --}}
                                    <select class="form-select" name="collection_center" id="collection_center">
                                        <option value="">select collection center</option>
                                         @foreach ($collectionCenters as $collection)
                                            <option value="{{$collection->p_name}}">{{$collection->p_name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid collection_center_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="in_time">In Time<span class="text-danger">*</span></label>
                                    <input class="form-control" id="in_time" name="in_time" type="time" placeholder="Enter In Time">
                                    <span class="text-danger is-invalid in_time_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="out_time">Out Time<span class="text-danger">*</span></label>
                                    <input class="form-control" id="out_time" name="out_time" type="time" placeholder="Enter Out Time">
                                    <span class="text-danger is-invalid out_time_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="add_entry_weight">Entry Weight <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="add_entry_weight"
                                            name="entry_weight"
                                            type="number"
                                            placeholder="Enter Entry Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="weight_unit" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid entry_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="add_exit_weight">Exit Weight<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="add_exit_weight" name="exit_weight" type="number" placeholder="Enter Exit Weight"> --}}
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="add_exit_weight"
                                            name="exit_weight"
                                            type="number"
                                            placeholder="Enter Exit Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="exit_weight" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid exit_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="add_total_garbage">Total Garbage<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="add_total_garbage" name="total_garbage" type="number" readonly placeholder="Enter Total Garbage"> --}}
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="add_total_garbage"
                                            name="total_garbage"
                                            type="number"
                                            readonly
                                            placeholder="Enter Exit Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="total_garbage" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid total_garbage_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="driver_name">Driver Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="driver_name" name="driver_name" type="text" placeholder="Enter Driver Name">
                                    <span class="text-danger is-invalid driver_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="weight_slip_number">Weight Slip Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="weight_slip_number" name="weight_slip_number" type="number" placeholder="Enter Weight Slip Number">
                                    <span class="text-danger is-invalid weight_slip_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="file_upload">File Upload<span class="text-danger">*</span></label>
                                    <input class="form-control" id="file_upload" name="file_upload" type="file" placeholder="Enter File Upload">
                                    <span class="text-danger is-invalid file_upload_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="waste_segregated">Waste Segregated<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="waste_segregated" name="waste_segregated" type="text" placeholder="Enter Waste Segregated"> --}}
                                    <select name="waste_segregated" id="waste_segregated" class="form-select">
                                        <option value="" >Select Waste Segregated</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid waste_segregated_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Break Up</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Waste Type</th>
                                            <th>Volume</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="addMoreBreakUpButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="BreakUpTableBody">
                                        <!-- Dynamic rows will be appended here -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="1" class="text-right"><strong>Total Volume</strong></td>
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
                            <h4 class="card-title">Edit Trip Sheet</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="trip_date">Trip Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="trip_date" name="trip_date" type="date" placeholder="Enter Trip Date">
                                    <span class="text-danger is-invalid trip_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="beat_number">Beat Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="beat_number" name="beat_number" type="number" placeholder="Enter Beat Number"> --}}
                                     <select class="form-select" name="beat_number" id="beat_number">
                                        <option value="">select Beat Number</option>
                                         @foreach ($Ward as $Wa)
                                            <option value="{{$Wa->beat_number}}">{{$Wa->beat_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid beat_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="vehicle_number" name="vehicle_number" type="number" placeholder="Enter Vehicle Number"> --}}
                                     <select class="form-select" name="vehicle_number" id="vehicle_number">
                                        <option value="">select Vehicle Number</option>
                                         @foreach ($vehicles as $vehi)
                                            <option value="{{$vehi->Vehicle_number}}">{{$vehi->Vehicle_number}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="collection_center">collection center<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="collection_center" name="collection_center" type="text" placeholder="Enter collection center"> --}}
                                    <select class="form-select" name="collection_center" id="collection_center">
                                        <option value="">select collection center</option>
                                         @foreach ($collectionCenters as $collection)
                                            <option value="{{$collection->p_name}}">{{$collection->p_name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid collection_center_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="in_time">In Time<span class="text-danger">*</span></label>
                                    <input class="form-control" id="in_time" name="in_time" type="time" placeholder="Enter In Time">
                                    <span class="text-danger is-invalid in_time_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="out_time">Out Time<span class="text-danger">*</span></label>
                                    <input class="form-control" id="out_time" name="out_time" type="time" placeholder="Enter Out Time">
                                    <span class="text-danger is-invalid out_time_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_entry_weight">Entry Weight <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="add_entry_weight"
                                            name="entry_weight"
                                            type="number"
                                            placeholder="Enter Entry Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="weight_unit" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid entry_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_exit_weight">Exit Weight<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="add_exit_weight" name="exit_weight" type="number" placeholder="Enter Exit Weight"> --}}
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="edit_exit_weight"
                                            name="exit_weight"
                                            type="number"
                                            placeholder="Enter Exit Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="exit_weight" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid exit_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="edit_total_garbage">Total Garbage<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="add_total_garbage" name="total_garbage" type="number" readonly placeholder="Enter Total Garbage"> --}}
                                    <div class="input-group">
                                        <!-- Input field for weight -->
                                        <input
                                            class="form-control"
                                            id="edit_total_garbage"
                                            name="total_garbage"
                                            type="number"
                                            readonly
                                            placeholder="Enter Exit Weight"
                                            min="0"
                                            max="1000"
                                            step="0.01"
                                        >
                                        <!-- Dropdown for selecting weight unit -->
                                        <select class="form-select" id="weight_unit" name="total_garbage" style="max-width: 120px;">
                                         @foreach ($ZoneDetails as $Zone)
                                            <option value="{{$Zone->id}}">{{$Zone->value}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger is-invalid total_garbage_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="driver_name">Driver Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="driver_name" name="driver_name" type="text" placeholder="Enter Driver Name">
                                    <span class="text-danger is-invalid driver_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="weight_slip_number">Weight Slip Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="weight_slip_number" name="weight_slip_number" type="number" placeholder="Enter Weight Slip Number">
                                    <span class="text-danger is-invalid weight_slip_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="file_upload">File Upload<span class="text-danger">*</span></label>
                                        <input class="form-control" id="file_upload" name="file_upload" type="file" placeholder="Enter file upload">
                                        <a id="fileupload" target="_blank" title="View Document">View Doc</a>
                                        <span class="text-danger is-invalid file_upload_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="waste_segregated">Waste Segregated<span class="text-danger">*</span></label>
                                    <select name="waste_segregated" id="waste_segregated" class="form-select">
                                        <option value="" >Select Waste Segregated</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid waste_segregated_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>BreakUp</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Waste type</th>
                                            <th>Volume</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="editMoreBreakUpButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="editBreakUpTableBody">
                                        <!-- Dynamic rows will be appended here -->
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="1" class="text-right"><strong>Total Volume</strong></td>
                                            <td id="totalVolume" class="text-center">
                                                <input type="text" id="editTotalVolumeField" class="form-control" readonly>
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
                                        <th>SR.NO</th>
                                        <th>Trip Date</th>
                                        <th>Beat Number</th>
                                        <th>Vehicle Number</th>
                                        <th>Collection Center</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Entry Weight</th>
                                        {{-- <th>Exit Weight</th> --}}
                                        <th>Total Garbage</th>
                                        {{-- <th>Driver Name</th>
                                        <th>Weight Slip Number</th>
                                        <th>File Upload</th>
                                        <th>Waste Segregated</th> --}}
                                        <th>Action</th> </tr>
                                </thead>
                                <tbody>
                                    @foreach ($TripSheet as $Trip)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $Trip->trip_date }}</td>
                                            <td>{{ $Trip->beat_number }}</td>
                                            <td>{{ $Trip->vehicle_number }}</td>
                                            <td>{{ $Trip->collection_center }}</td>
                                            <td>{{ $Trip->in_time }}</td>
                                            <td>{{ $Trip->out_time }}</td>
                                            {{-- <td>{{ $Trip->entry_weight }}</td> --}}
                                            <td>{{ $Trip->exit_weight }}</td>
                                            {{-- <td>{{ $Trip->total_garbage }}</td>
                                            <td>{{ $Trip->driver_name }}</td>
                                            <td>{{ $Trip->weight_slip_number }}</td>
                                            <td>{{ $Trip->file_upload }}</td> --}}
                                            <td>{{ $Trip->waste_segregated }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit TypesOfFineCharges" data-id="{{ $Trip->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete TypesOfFineCharges" data-id="{{ $Trip->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $Trip->id }}"><i data-feather="eye"  data-id="{{ $Trip->id }}"  data-bs-toggle="modal" data-bs-target=".tripSheet"></i></button>
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
     <div class="modal fade tripSheet" tabindex="-1" role="dialog" aria-labelledby="tripSheetLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="tripSheetLabel">Trip Sheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="stockData">
                        <!-- First Table: Main Data -->
                        <div id="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Trip Date</th>
                                        <th>Beat Number</th>
                                        <th>Vehicle Number</th>
                                        <th>Collection Center</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>Entry Weight</th>
                                        <th>Exit Weight</th>
                                        <th>Total Garbage</th>
                                        <th>Driver Name</th>
                                        <th>Weight Slip Number</th>
                                        <th>File Upload</th>
                                        <th>Waste Segregated</th>
                                    </tr>
                                </thead>
                                <tbody id="tripSheetModel">
                                    <!-- Data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Second Table: Additional Details -->
                        <div id="additional-info-table" class="mt-4">
                            <h5>Break Up</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Waste Type</th>
                                        <th>Volume</th>
                                    </tr>
                                </thead>
                                <tbody id="BreakUpModel">
                                    <!-- Additional data will be injected here -->
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="1" class="text-right"><strong>Total Volume</strong></td>
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
            url: '{{ route('trip-sheet.store') }}',
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
                            window.location.href = '{{ route('trip-sheet.index') }}';
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
        var url = "{{ route('trip-sheet.edit', ":model_id") }}";

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
                    $("#editForm input[id='edit_model_id']").val(data.TripSheet.id);
                    $("#editForm input[name='trip_date']").val(data.TripSheet.trip_date);
                    $("#editForm input[name='beat_number']").val(data.TripSheet.beat_number);
                    $("#editForm select[name='vehicle_number']").val(data.TripSheet.vehicle_number);
                    $("#editForm select[name='collection_center']").val(data.TripSheet.collection_center);
                    $("#editForm input[name='in_time']").val(data.TripSheet.in_time);
                    $("#editForm input[name='out_time']").val(data.TripSheet.out_time);
                    $("#editForm input[name='entry_weight']").val(data.TripSheet.entry_weight);
                    $("#editForm input[name='exit_weight']").val(data.TripSheet.exit_weight);
                    $("#editForm input[name='total_garbage']").val(data.TripSheet.total_garbage);
                    $("#editForm input[name='driver_name']").val(data.TripSheet.driver_name);
                    $("#editForm input[name='weight_slip_number']").val(data.TripSheet.weight_slip_number);
                    $("#editForm select[name='waste_segregated']").val(data.TripSheet.waste_segregated);
                    $('#editForm #fileupload').attr('href', "{{ asset('storage') }}/"+data.TripSheet.file_upload)



                     let BreakUp = "";
                     let totalVolum = 0;
                    $.each(data.BreakUp, function(key, value) {

                        let wastetypeOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller
                       @foreach($WasteTypeDetails as $WasteType)
                       wastetypeOptions += `<option value="{{ $WasteType->id }}" ${value['waste_type'] == "{{ $WasteType->id }}" ? 'selected' : ''}>{{ $WasteType->value }}</option>`;
                       @endforeach


                        BreakUp += `
                            <tr id="editRow${key}">
                                <td>
                                    <select name="waste_type[]" class="form-select AddFormWasteType" required>
                                     <option value="">Select WasteType</option>
                                    ${wastetypeOptions}
                                   </select>
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
                    $('#editBreakUpTableBody').html(BreakUp);


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

{{--  --}}
{{-- add more vehicle details in edit --}}
<script>
    // Global counter for row IDs
    let editBreakupCounter = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreBreakUpButton', function() {
        let value = {
            waste_type: '',      // Default empty value or dynamically populated
            volume: '',   // Default empty value or dynamically populated   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editRow${editBreakupCounter}">
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
                     <input
                     type="number"
                     name="volume[]"
                     class="form-control volumeInput"
                     placeholder="Enter volume"
                     required
                    >
                   <span class="input-group-text">Kg</span>
                   </div>
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editBreakupCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#editBreakUpTableBody').append(html);
        editBreakupCounter++;
    });
    //
    //
    $('body').on('click', '.removeRow', function() {
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
{{--  --}}
<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('trip-sheet.update', ":model_id") }}";
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
                                window.location.href = '{{ route('trip-sheet.index') }}';
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
            title: "Are you sure to delete this Trip Sheet?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('trip-sheet.destroy', ":model_id") }}";

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


{{-- Add form for trip sheet  --}}
<script>
    $(document).ready(function () {
        let tripsheetRowCount = 1; // Counter for unique row IDs

        // Automatically add the first row when the page loads
        let initialHtml = `<tr id="tripsheetRow${tripsheetRowCount}">
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
                                        <input
                                            type="number"
                                            name="volume[]"
                                            class="form-control volumeInput"
                                            placeholder="Enter volume"
                                            required
                                        >
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removetripsheetRow" data-id="${tripsheetRowCount}">Remove</button>
                                </td>
                            </tr>`;
        $('#BreakUpTableBody').append(initialHtml); // Append the first row to the table body
        tripsheetRowCount++; // Increment the row counter for unique IDs

        // Add More Button Functionality
        $('#addMoreBreakUpButton').on('click', function () {
            let html = `<tr id="tripsheetRow${tripsheetRowCount}">
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
                                        <input
                                            type="number"
                                            name="volume[]"
                                            class="form-control volumeInput"
                                            placeholder="Enter volume"
                                            required
                                        >
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removetripsheetRow" data-id="${tripsheetRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#BreakUpTableBody').append(html); // Append the new row to the table body
            tripsheetRowCount++; // Increment the row counter for unique IDs
        });

        // Remove Row Functionality
        $('body').on('click', '.removetripsheetRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#tripsheetRow${rowId}`).remove(); // Remove the corresponding row
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
{{-- view --}}
<script>
    $('body').on('click', '.view-element', function () {
        var model_id = $(this).data("id");
        var url = "{{ route('trip-sheet.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function (data) {
                if (data.result === 1) {
                    // Populate the First Table: Waste Details
                    let mainDataHtml = `
                        <tr>
                            <td>${data.TripSheet.trip_date || 'N/A'}</td>
                            <td>${data.TripSheet.beat_number || 'N/A'}</td>
                            <td>${data.TripSheet.vehicle_number || 'N/A'}</td>
                            <td>${data.TripSheet.collection_center || 'N/A'}</td>
                            <td>${data.TripSheet.in_time || 'N/A'}</td>
                            <td>${data.TripSheet.out_time || 'N/A'}</td>
                            <td>${data.TripSheet.entry_weight || 'N/A'}</td>
                            <td>${data.TripSheet.exit_weight || 'N/A'}</td>
                            <td>${data.TripSheet.total_garbage || 'N/A'}</td>
                            <td>${data.TripSheet.driver_name || 'N/A'}</td>
                            <td>${data.TripSheet.weight_slip_number || 'N/A'}</td>
                            <td><a href="{{ asset('storage/') }}/${data.TripSheet.file_upload ?? 'N/A'}" target="_blank" class="view-docs">View Docs</a></td>
                            <td>${data.TripSheet.waste_segregated || 'N/A'}</td>
                        </tr>
                    `;
                    $('#tripSheetModel').html(mainDataHtml);

                    // Populate the Second Table: Segregation Data
                    let BreakUpHtml = '';
                    let totalVolume = 0;

                    if (Array.isArray(data.BreakUp) && data.BreakUp.length > 0) {
                        $.each(data.BreakUp, function (key, value) {
                            let volume = parseFloat(value.volume) || 0; // Ensure numeric volume
                            totalVolume += volume;

                            BreakUpHtml += `
                                <tr>
                                    <td>${value?.waste_type?.value || 'N/A'}</td>
                                    <td>${volume.toFixed(2)}</td>
                                </tr>
                            `;
                        });
                    } else {
                        BreakUpHtml = `<tr><td colspan="2" class="text-center">No data available</td></tr>`;
                    }
                    $('#BreakUpModel').html(BreakUpHtml);
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

<script>
    $(document).ready(function(){
        $('body').on('keyup', '#add_entry_weight, #add_exit_weight', function(){
            let entryWeight = parseInt($('#add_entry_weight').val());
            let exitWeight = parseInt($('#add_exit_weight').val());
            let total = entryWeight - exitWeight;
            $('#add_total_garbage').val(total)
        });

        $('body').on('keyup', '#edit_entry_weight, #edit_exit_weight', function(){
            let entryWeight = parseInt($('#edit_entry_weight').val());
            let exitWeight = parseInt($('#edit_exit_weight').val());
            let total = entryWeight - exitWeight;
            $('#edit_total_garbage').val(total)
        });
    })
</script>

