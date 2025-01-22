<x-admin.layout>
    <x-slot name="title">vehicles</x-slot>
    <x-slot name="heading">vehicles</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add vehicles</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Vehicle_Type">Vehicle Type<span class="text-danger">*</span></label>
                                    <select name="Vehicle_Type" id="Vehicle_Type" class="form-select">
                                        <option value="">Select Vehicle Type </option>
                                        @foreach ($VehicleType as $Vehicle )
                                            <option value="{{ $Vehicle->name }}">{{ $Vehicle->name }} </option>
                                        @endforeach
                                    </select>
                                    {{-- <input class="form-control" id="Vehicle_Type" name="Vehicle_Type" type="text" placeholder="Enter Vehicle Type"> --}}
                                    <span class="text-danger is-invalid Vehicle_Type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Vehicle_number" name="Vehicle_number" type="text" placeholder="Enter Vehicle number">
                                    <span class="text-danger is-invalid Vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Engine_number">Engine Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Engine_number" name="Engine_number" type="text" placeholder="Enter Engine number">
                                    <span class="text-danger is-invalid Engine_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_Reg_Number">Vehicle Regional Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_Reg_Number" name="vehicle_Reg_Number" type="text" placeholder="Enter Vehicle Regional Number">
                                    <span class="text-danger is-invalid vehicle_Reg_Number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_standard_weight">Vehicle Standard Weight<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_standard_weight" name="vehicle_standard_weight" type="text" placeholder="Enter Vehicle Standard Weight">
                                    <span class="text-danger is-invalid vehicle_standard_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Manufacturer">Manufacturer<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Manufacturer" name="Manufacturer" type="text" placeholder="Enter Manufacturer">
                                    <span class="text-danger is-invalid Manufacturer_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_tracking">Vehicle Tracking<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_tracking" name="vehicle_tracking" type="text" placeholder="Enter Vehicle Tracking">
                                    <span class="text-danger is-invalid vehicle_tracking_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Department_owned_vehicle">Department Owned Vehicle<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Department_owned_vehicle" name="Department_owned_vehicle" type="text" placeholder="Enter Department Owned Vehicle">
                                    <span class="text-danger is-invalid Department_owned_vehicle_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="purchase_date">Purchase Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="purchase_date" name="purchase_date" type="date" placeholder="Enter Purchase Date">
                                    <span class="text-danger is-invalid purchase_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="purchase_price">Purchase Price<span class="text-danger">*</span></label>
                                    <input class="form-control" id="purchase_price" name="purchase_price" type="text" placeholder="Enter Purchase Price">
                                    <span class="text-danger is-invalid purchase_price_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Source_of_purchase_date">Source Of Purchase Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Source_of_purchase_date" name="Source_of_purchase_date" type="date" placeholder="Enter Source Of Purchase Date">
                                    <span class="text-danger is-invalid Source_of_purchase_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Asset_code">Asset Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Asset_code" name="Asset_code" type="text" placeholder="Enter Asset Code">
                                    <span class="text-danger is-invalid Asset_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="chassis_number">Chassis Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="chassis_number" name="chassis_number" type="text" placeholder="Enter Chassis Number">
                                    <span class="text-danger is-invalid chassis_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Remarks">Remarks<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Remarks" name="Remarks" type="text" placeholder="Enter Remarks">
                                    <span class="text-danger is-invalid Remarks_err"></span>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Waste Management</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Waste Type</th>
                                                <th>Capacity (kg)</th>
                                                <th>Total Capacity</th>
                                                <th><button class="btn btn-primary btn-sm" type="button" id="addMoreWasteButton">Add More</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="wasteTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
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
                            <h4 class="card-title">Edit vehicle</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Vehicle_Type">Vehicle Type<span class="text-danger">*</span></label>
                                    <select name="Vehicle_Type" id="Vehicle_Type" class="form-select">
                                        <option value="">Select Vehicle Type </option>
                                        @foreach ($VehicleType as $Vehicle )
                                            <option value="{{ $Vehicle->name }}">{{ $Vehicle->name }} </option>
                                        @endforeach
                                    </select>
                                    {{-- <input class="form-control" id="Vehicle_Type" name="Vehicle_Type" type="text" placeholder="Enter Vehicle Type"> --}}
                                    <span class="text-danger is-invalid Vehicle_Type_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Vehicle_number" name="Vehicle_number" type="text" placeholder="Enter Vehicle Number">
                                    <span class="text-danger is-invalid Vehicle_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Engine_number">Engine Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Engine_number" name="Engine_number" type="text" placeholder="Enter Engine Number">
                                    <span class="text-danger is-invalid Engine_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_Reg_Number">Vehicle Regional Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_Reg_Number" name="vehicle_Reg_Number" type="text" placeholder="Enter Vehicle Regional Number">
                                    <span class="text-danger is-invalid vehicle_Reg_Number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_standard_weight">Vehicle Standard Weight<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_standard_weight" name="vehicle_standard_weight" type="text" placeholder="Enter Vehicle Standard Weight">
                                    <span class="text-danger is-invalid vehicle_standard_weight_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Manufacturer">Manufacturer<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Manufacturer" name="Manufacturer" type="text" placeholder="Enter Manufacturer">
                                    <span class="text-danger is-invalid Manufacturer_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="vehicle_tracking">vehicle Tracking<span class="text-danger">*</span></label>
                                    <input class="form-control" id="vehicle_tracking" name="vehicle_tracking" type="text" placeholder="Enter vehicle Tracking">
                                    <span class="text-danger is-invalid vehicle_tracking_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Department_owned_vehicle">Department Owned Vehicle<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Department_owned_vehicle" name="Department_owned_vehicle" type="text" placeholder="Enter Department Owned Vehicle">
                                    <span class="text-danger is-invalid Department_owned_vehicle_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="purchase_date">Purchase Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="purchase_date" name="purchase_date" type="date" placeholder="Enter Purchase Date">
                                    <span class="text-danger is-invalid purchase_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="purchase_price">Purchase Price<span class="text-danger">*</span></label>
                                    <input class="form-control" id="purchase_price" name="purchase_price" type="text" placeholder="Enter Purchase Price">
                                    <span class="text-danger is-invalid purchase_price_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Source_of_purchase_date">Source Of Purchase Date<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Source_of_purchase_date" name="Source_of_purchase_date" type="date" placeholder="Enter Source Of Purchase Date">
                                    <span class="text-danger is-invalid Source_of_purchase_date_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Asset_code">Asset Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Asset_code" name="Asset_code" type="text" placeholder="Enter Asset Code">
                                    <span class="text-danger is-invalid Asset_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="chassis_number">Chassis Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="chassis_number" name="chassis_number" type="text" placeholder="Enter Chassis Number">
                                    <span class="text-danger is-invalid chassis_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Remarks">Remarks<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Remarks" name="Remarks" type="text" placeholder="Enter Remarks">
                                    <span class="text-danger is-invalid Remarks_err"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Waste Management</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Waste Type</th>
                                                <th>Capacity (kg)</th>
                                                <th>Total Capacity</th>
                                                <th><button class="btn btn-primary btn-sm" type="button" id="editMoreEditWasteRow">Add More</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="editWasteTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
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
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Vehicle Regional Number</th>
                                        <th>Engine Number</th>
                                        <th>Vehicle Standard Weight</th>
                                        {{-- <th>Manufacturer</th>
                                        <th>Vehicle Tracking</th> --}}
                                        {{-- <th>Department Owned Vehicle</th>
                                        <th>Purchase Date</th>
                                        <th>Purchase Price</th>
                                        <th>Source Of Purchase Date</th>
                                        <th>Asset Code</th>
                                        <th>Chassis Number</th>
                                        <th>Remarks</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehicles as $Vehi)
                                        <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$Vehi->Vehicle_Type}}</td>
                                        <td>{{$Vehi->Vehicle_number}}</td>
                                        <td>{{$Vehi->vehicle_Reg_Number}}</td>
                                        <td>{{$Vehi->Engine_number}}</td>
                                        <td>{{$Vehi->vehicle_standard_weight}}</td>
                                        {{-- <td>{{$Vehi->Manufacturer}}</td>
                                        <td>{{$Vehi->vehicle_tracking}}</td> --}}
                                        {{-- <td>{{$Vehi->Department_owned_vehicle}}</td>
                                        <td>{{$Vehi->purchase_date}}</td>
                                        <td>{{$Vehi->purchase_price}}</td>
                                        <td>{{$Vehi->Source_of_purchase_date}}</td>
                                        <td>{{$Vehi->Asset_code}}</td>
                                        <td>{{$Vehi->chassis_number}}</td>
                                        <td>{{$Vehi->Remarks}}</td> --}}
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit vehicles" data-id="{{ $Vehi->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete vehicles" data-id="{{ $Vehi->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $Vehi->id }}"><i data-feather="eye"  data-id="{{ $Vehi->id }}"  data-bs-toggle="modal" data-bs-target=".vehicalModel"></i></button>
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
                    <h5 class="modal-title" id="vehicalModelLabel">Vehicle Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="stockData">
                        <!-- First Table: Main Data -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vehicle Type</th>
                                        <th>Vehicle Number</th>
                                        <th>Engine Number</th>
                                        <th>Vehicle Regional Number</th>
                                        <th>Vehicle Standard Weight</th>
                                        <th>Manufacturer</th>
                                        <th>Vehicle Tracking</th>
                                        <th>Department Owned Vehicle</th>
                                        <th>Purchase Date</th>
                                        <th>Purchase Price</th>
                                        <th>Source of Purchase Date</th>
                                        <th>Assest Code</th>
                                        <th>Chassis Number</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody id="VehicleModel">
                                    <!-- Data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Second Table: Additional Details -->
                        <div id="additional-info-table" class="mt-4">
                                <h5 class="modal-title" id="vehicalModelLabel">Waste Management Details</h5>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Waste Type</th>
                                        <th>Capacity in kg</th>
                                        <th>Total Capacity</th>
                                    </tr>
                                </thead>
                                <tbody id="WasteManageMentModel">
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
            url: '{{ route('vehicles.store') }}',
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
                            window.location.href = '{{ route('vehicles.index') }}';
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
        var url = "{{ route('vehicles.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.vehicles.id);
                    $("#editForm select[name='waste_types']").val(data.vehicles.waste_types);
                    $("#editForm select[name='capacity_in_kg']").val(data.vehicles.capacity_in_kg);
                    $("#editForm select[name='total_capacity']").val(data.vehicles.total_capacity);
                    $("#editForm select[name='Vehicle_Type']").val(data.vehicles.Vehicle_Type);
                    $("#editForm input[name='Vehicle_number']").val(data.vehicles.Vehicle_number);
                    $("#editForm input[name='Engine_number']").val(data.vehicles.Engine_number);
                    $("#editForm input[name='vehicle_Reg_Number']").val(data.vehicles.vehicle_Reg_Number);
                    $("#editForm input[name='vehicle_standard_weight']").val(data.vehicles.vehicle_standard_weight);
                    $("#editForm input[name='Manufacturer']").val(data.vehicles.Manufacturer);
                    $("#editForm input[name='vehicle_tracking']").val(data.vehicles.vehicle_tracking);
                    $("#editForm input[name='Department_owned_vehicle']").val(data.vehicles.Department_owned_vehicle);
                    $("#editForm input[name='purchase_date']").val(data.vehicles.purchase_date);
                    $("#editForm input[name='purchase_price']").val(data.vehicles.purchase_price);
                    $("#editForm input[name='Source_of_purchase_date']").val(data.vehicles.Source_of_purchase_date);
                    $("#editForm input[name='Asset_code']").val(data.vehicles.Asset_code);
                    $("#editForm input[name='chassis_number']").val(data.vehicles.chassis_number);
                    $("#editForm input[name='Remarks']").val(data.vehicles.Remarks);

                    let html = "";
                    $.each(data.wasteManagements, function(key, value){

                        let wastetypeOptions = ''; // Variable to hold vehicle type options
               // Loop through VehicleType data dynamically from the controller
                       @foreach($PrefixDetails as $Prefix)
                       wastetypeOptions += `<option value="{{ $Prefix->Main_Prefix }}" ${value['waste_types'] == "{{ $Prefix->Main_Prefix }}" ? 'selected' : ''}>{{ $Prefix->value }}</option>`;
                       @endforeach

                        html += `
                            <tr id="editRow${key}">
                                <td>
                                   <select name="waste_types[]" class="form-select AddFormWasteType" required>
                                     <option value="">Select WasteType</option>
                                    ${wastetypeOptions}
                                   </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control editWasteQuantity" name="capacity_in_kg[]" value="${value['capacity_in_kg']}" required />
                                </td>
                                <td>
                                    <input type="number" class="form-control editWasteUnit" required name="total_capacity[]" value="${value['total_capacity']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#editWasteTableBody').append(html);

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
<script>
    // Global counter for row IDs
    let editRowCounter = 100;

    // Event to add more waste rows (fixed event binding)
    $('body').on('click', '#editMoreEditWasteRow', function() {
        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                   <select name="waste_types[]" class="form-select AddFormWasteType" required>
                                     <option value="">Select WasteType</option>
                                    ${wastetypeOptions}
                                   </select>
                </td>
                <td>
                    <input type="number" class="form-control editWasteQuantity" name="capacity_in_kg[]" required />
                </td>
                <td>
                    <input type="number" class="form-control editWasteUnit"  required name="total_capacity[]" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>`;
        $('#editWasteTableBody').append(html);
        editRowCounter++;
    });

    // Event to remove a waste row (fixed event binding)
    $('body').on('click', '.removeRow', function() {
        let rowId = $(this).data('id');
        $(`#editRow${rowId}`).remove();
    });

    // Event to load and edit waste data (clicking the edit-waste button)
    $('body').on('click', '.edit-waste', function(e) {
        e.preventDefault();
        var waste_id = $(this).data("id");
        var url = "{{ route('vehicles.edit', ':waste_id') }}".replace(':waste_id', waste_id);

        $.ajax({
            url: url,
            type: 'GET',
            data: { '_token': "{{ csrf_token() }}" },
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function(data) {
                if (!data.error) {
                    // Populate the form with the waste data
                    $("#editWasteForm input[name='edit_id']").val(data.vehicles.id);
                    $("#editWasteForm input[name='waste_types']").val(data.vehicles.waste_types);
                    $("#editWasteForm input[name='capacity_in_kg']").val(data.vehicles.capacity_in_kg);
                    $("#editWasteForm input[name='total_capacity']").val(data.vehicles.total_capacity);
                    // Populate the table with existing waste rows
                    $('#wasteTableBody').html(data.wasteRowsHtml);
                } else {
                    alert(data.error);
                }
            },
            error: function() {
                alert("Something went wrong. Please try again!");
            },
            complete: function() {
                $('#addMoreEditWasteRow').css('opacity', '1').css('visibility', 'visible');
            }
        });
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
            var url = "{{ route('vehicles.update', ":model_id") }}";
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
                                window.location.href = '{{ route('vehicles.index') }}';
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
            title: "Are you sure to delete this Vehicles?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('vehicles.destroy', ":model_id") }}";

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
{{-- add more functionality in the vehicle form --}}
<script>
    $(document).ready(function () {
        let wasteRowCount = 1; // Row counter

        // Function to create a new row
        function createNewRow(rowId) {
            return `
                <tr id="wasteRow${rowId}">
                    <td>
                        <select name="waste_types[]" class="form-select AddFormSelectzone" required/>
                                    <option value="">Select waste type</option>
                                  @foreach($PrefixDetails as $Prefix)
                                     <option value="{{ $Prefix->Main_Prefix }}">{{ $Prefix->value}}</option>
                                  @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="capacity_in_kg[]" class="form-control" placeholder="Enter Capacity (kg)" required>
                    </td>
                    <td>
                        <input type="number" name="total_capacity[]" class="form-control" placeholder="Enter Total Capacity" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeWasteRow" data-id="${rowId}">Remove</button>
                    </td>
                </tr>
            `;
        }

        // Add one default row on page load
        $('#wasteTableBody').append(createNewRow(wasteRowCount));
        wasteRowCount++;

        // Add More Button Functionality
        $('#addMoreWasteButton').on('click', function () {
            $('#wasteTableBody').append(createNewRow(wasteRowCount));
            wasteRowCount++;
        });

        // Remove Row Functionality
        $('body').on('click', '.removeWasteRow', function () {
            const rowId = $(this).data('id');
            $(`#wasteRow${rowId}`).remove();
        });
    });
</script>
{{-- view --}}
<script>
    $('body').on('click', '.view-element', function(){
        var model_id = $(this).attr("data-id");
        var url = "{{ route('vehicles.show', ':model_id') }}";

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
                            <td>${data.vehicles.Vehicle_Type}</td>
                            <td>${data.vehicles.Vehicle_number}</td>
                            <td>${data.vehicles.Engine_number}</td>
                            <td>${data.vehicles.vehicle_Reg_Number}</td>
                            <td>${data.vehicles.vehicle_standard_weight}</td>
                            <td>${data.vehicles.Manufacturer}</td>
                            <td>${data.vehicles.vehicle_tracking}</td>
                            <td>${data.vehicles.Department_owned_vehicle}</td>
                            <td>${data.vehicles.purchase_date}</td>
                            <td>${data.vehicles.purchase_price}</td>
                            <td>${data.vehicles.Source_of_purchase_date}</td>
                            <td>${data.vehicles.Asset_code}</td>
                            <td>${data.vehicles.chassis_number}</td>
                            <td>${data.vehicles.Remarks}</td>
                        </tr>
                    `;
                    $('#VehicleModel').html(mainDataHtml);

                    // Second Table HTML for Additional Details
                    let additionalDetailsHtml = '';
                    $.each(data.CapacityOfVehicle, function(key, value) {
                        additionalDetailsHtml += `
                            <tr>
                                <td>${value.value}</td>
                                <td>${value.capacity_in_kg}</td>
                                <td>${value.total_capacity}</td>

                            </tr>
                        `;
                    });
                    $('#WasteManageMentModel').html(additionalDetailsHtml);

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
