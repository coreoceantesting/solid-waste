<x-admin.layout>
    <x-slot name="title">Wards</x-slot>
    <x-slot name="heading">Wards</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Ward</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="name">Ward Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter Ward Name" >
                                    <span class="text-danger is-invalid name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Beat No.">Beat No.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Beat_number" name="beat_number" type="text" placeholder="Enter Ward Initial" >
                                    <span class="text-danger is-invalid beat_number_err"></span>
                                </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Beat Name">Beat Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="Beat_number" name="beat_name" type="text" placeholder="Enter Beat Name" >
                                <span class="text-danger is-invalid beat_name_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                        <div class="col-md-4">
                            <label class="col-form-label" for="Starting Point">Starting Point<span class="text-danger">*</span></label>
                            <input class="form-control" id="Starting_Point" name="start_point" type="text" placeholder="Enter Starting Point">
                            <span class="text-danger is-invalid start_point_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="End Point">End Point<span class="text-danger">*</span></label>
                            <input class="form-control" id="End_Point" name="end_point" type="text" placeholder="Enter End Point">
                            <span class="text-danger is-invalid end_point_err"></span>
                        </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="Total Distance">Total Distance<span class="text-danger">*</span></label>
                        <input class="form-control" id="Total_Distance" name="total_distance" type="text" placeholder="Enter Total Distance">
                        <span class="text-danger is-invalid total_distance_err"></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="Collection Mode">Collection Mode<span class="text-danger">*</span></label>
                        <input class="form-control" id="Collection_Mode" name="collection_mode" type="text" placeholder="Enter Collection Mode">
                        <span class="text-danger is-invalid collection_mode_err"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="Nearest Collection Center">Nearest Collection Center<span class="text-danger">*</span></label>
                        <input class="form-control" id="Nearest_Collection_Center" name="nearest_collection_center" type="text" placeholder="Enter Nearest Collection Center">
                        <span class="text-danger is-invalid nearest_collection_center_err"></span>
                    </div>
                <div class="col-md-4">
                    <label class="col-form-label" for="Distance From Collection Center">Distance From Collection Center<span class="text-danger">*</span></label>
                    <input class="form-control" id="Distance_From _Collection_Center" name="distance_from_collection_center" type="text" placeholder="Enter Distance From Collection Center">
                    <span class="text-danger is-invalid distance_from_collection_center_err"></span>
                </div>
            </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <label class="col-form-label" for="Beat Animal Count">Beat Animal Count<span class="text-danger">*</span></label>
                <input class="form-control" id="Beat_Animal_Count" name="beat_animal_count" type="text" placeholder="Enter Beat Animal Count">
                <span class="text-danger is-invalid beat_animal_count_err"></span>
            </div>
            <div class="col-md-4">
                <label class="col-form-label" for="Estimated No.of house/Establishment Preparing compost">Estimated No.of house/Establishment Preparing compost<span class="text-danger">*</span></label>
                <input class="form-control" id="Estimated_No_of_house" name="estimated_number_of_house" type="text" placeholder="Enter Estimated No.of house/Establishment Preparing compost">
                <span class="text-danger is-invalid estimated_number_of_house_err"></span>
            </div>
        <div class="col-md-4">
            <label class="col-form-label" for="Beat Population">Beat Population<span class="text-danger">*</span></label>
            <input class="form-control" id="Beat_Population" name="beat_population" type="text" placeholder="Enter Beat Population">
            <span class="text-danger is-invalid beat_population_err"></span>
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-md-4">
            <label class="col-form-label" for="Estimated Beat Residential Count">Estimated Beat Residential Count<span class="text-danger">*</span></label>
            <input class="form-control" id="Estimated_Beat_Residential_Count" name="estimated_beat_residential_count" type="text" placeholder="Enter Estimated Beat Residential Count">
            <span class="text-danger is-invalid estimated_beat_residential_count_err"></span>
        </div>
        <div class="col-md-4">
            <label class="col-form-label" for="Estimated Beat Commercial Count">Estimated Beat Commercial Count<span class="text-danger">*</span></label>
            <input class="form-control" id="Estimated_Beat_Commercial_Count" name="estimated_beat_commercial_count" type="text" placeholder="Enter Estimated Beat Commercial Count">
            <span class="text-danger is-invalid estimated_beat_commercial_count_err"></span>
        </div>
    <div class="col-md-4">
        <label class="col-form-label" for="Estimated  establishment Count">Estimated establishment Count<span class="text-danger">*</span></label>
        <input class="form-control" id="Estimated_establishment_Count" name="estimated_establishment_count" type="text" placeholder="Enter Estimated  establishment Count">
        <span class="text-danger is-invalid estimated_establishment_count_err"></span>
    </div>
</div>
{{-- <div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <h2>Area Details</h2>
        </div>
        <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Area Type <span class="text-danger">*</span></th>
                            <th>Area Name <span class="text-danger">*</span></th>
                            <th>Household Count</th>
                            <th>Shop Count</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="area-details-table">
                        <tr>
                            <td><input type="number" class="form-control" value="1" readonly></td>
                            <td>
                                <select class="form-select" name="area_type[]">
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control" name="area_name[]" placeholder="Enter Area Name"></td>
                            <td><input type="number" class="form-control" name="household_count[]" value="500"></td>
                            <td><input type="number" class="form-control" name="shop_count[]" value="30"></td>
                            <td><input type="number" class="form-control" name="total[]" ></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" onclick="calculateTotal(this)">✔</button><br><br>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow(this)">🗑</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="Total">Total<span class="text-danger">*</span></label>
                        <input class="form-control" id="Total" name="Total" type="text" placeholder="Enter Total">
                        <span class="text-danger is-invalid Total_err"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="Total"><span class="text-danger">*</span></label>
                        <input class="form-control" id="Total" name="Total" type="text" placeholder="Enter Total">
                        <span class="text-danger is-invalid estimated_beat_commercial_count_err"></span>
                    </div>
                <div class="col-md-4">
                    <label class="col-form-label" for="Estimated  establishment Count"><span class="text-danger">*</span></label>
                    <input class="form-control" id="Estimated_establishment_Count" name="estimated_establishment_count" type="text" placeholder="Enter Total">
                    <span class="text-danger is-invalid estimated_establishment_count_err"></span>
                </div>
            </div>
          <div class="text-center mt-3">
                    <b><p class="text-danger">Please Note: Start Point and End Point must have latitude and longitude defined in the location master.</p></b>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                        </div>
                        <div class="row">
    <div class="col-12">
        <h2>Area Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Area Type</th>
                    <th>Area Name</th>
                    <th>Household Count</th>
                    <th>Shop Count</th>
                    <th>Total</th>
                    <th>
                        <button class="btn btn-primary btn-sm" type="button" id="addMoreAreaButton">Add More</button>
                    </th>
                </tr>
            </thead>
            <tbody id="areaTableBody">
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
                            <h4 class="card-title">Edit Ward</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Ward Name ">Ward Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="Ward Name" name="name" type="text" placeholder="Enter Ward Name ">
                                    <span class="text-danger is-invalid Ward name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Beat No.">Beat No.<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Beat_number" name="beat_number" type="text" placeholder="Enter Beat No.">
                                    <span class="text-danger is-invalid beat_number_err"></span>
                                </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="Beat Name">Beat Name<span class="text-danger">*</span></label>
                                <input class="form-control" id="Beat_Name" name="beat_name" type="text" placeholder="Enter Beat Name">
                                <span class="text-danger is-invalid beat_name_err"></span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="Starting Point">Starting Point<span class="text-danger">*</span></label>
                                <input class="form-control" id="Starting_Point" name="start_point" type="text" placeholder="Enter Starting Point" >
                                <span class="text-danger is-invalid start_point_err"></span>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label" for="End Point">End Point<span class="text-danger">*</span></label>
                                <input class="form-control" id="End_Point" name="end_point" type="text" placeholder="Enter End Point" >
                                <span class="text-danger is-invalid end_point_err"></span>
                            </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="Total Distance">Total Distance<span class="text-danger">*</span></label>
                            <input class="form-control" id="Total_Distance" name="total_distance" type="text" placeholder="Enter Total Distance" >
                            <span class="text-danger is-invalid total_distance_err"></span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label class="col-form-label" for="Collection Mode">Collection Mode<span class="text-danger">*</span></label>
                            <input class="form-control" id="Collection_Mode" name="collection_mode" type="text" placeholder="Enter Collection Mode" >
                            <span class="text-danger is-invalid collection_mode_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="Nearest Collection Center">Nearest Collection Center<span class="text-danger">*</span></label>
                            <input class="form-control" id="Nearest_Collection_Center" name="nearest_collection_center" type="text" placeholder="Enter Nearest Collection Center" >
                            <span class="text-danger is-invalid nearest_collection_center_err"></span>
                        </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="Distance From Collection Center">Distance From Collection Center<span class="text-danger">*</span></label>
                        <input class="form-control" id="Distance_From_Collection Center" name="distance_from_collection_center" type="text" placeholder="Enter Distance From Collection Center" >
                        <span class="text-danger is-invalid distance_from_collection_center_err"></span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-4">
                        <label class="col-form-label" for="Beat Animal Count">Beat Animal Count<span class="text-danger">*</span></label>
                        <input class="form-control" id="Beat Animal Count" name="beat_animal_count" type="text" placeholder="Enter Beat Animal Count">
                        <span class="text-danger is-invalid beat_animal_count_err"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="Estimated No.of house/Establishment Preparing compost">Estimated No.of house/Establishment Preparing compost<span class="text-danger">*</span></label>
                        <input class="form-control" id="Estimated No.of house/Establishment Preparing compost" name="estimated_number_of_house" type="text" placeholder="Enter Estimated No.of house/Establishment Preparing compost">
                        <span class="text-danger is-invalid estimated_number_of_house_err"></span>
                    </div>
                <div class="col-md-4">
                    <label class="col-form-label" for="Beat Population">Beat Population<span class="text-danger">*</span></label>
                    <input class="form-control" id="Beat Population" name="beat_population" type="text" placeholder="Enter Beat Population">
                    <span class="text-danger is-invalid beat_population_err"></span>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-4">
                    <label class="col-form-label" for="Estimated Beat Residential Count">Estimated Beat Residential Count<span class="text-danger">*</span></label>
                    <input class="form-control" id="Estimated Beat Residential Count" name="estimated_beat_residential_count" type="text" placeholder="Enter Estimated Beat Residential Count">
                    <span class="text-danger is-invalid estimated_beat_residential_count_err"></span>
                </div>
                <div class="col-md-4">
                    <label class="col-form-label" for="Estimated Beat Commercial Count">Estimated Beat Commercial Count<span class="text-danger">*</span></label>
                    <input class="form-control" id="Estimated Beat Commercial Count" name="estimated_beat_commercial_count" type="text" placeholder="Enter Estimated Beat Commercial Count">
                    <span class="text-danger is-invalid estimated_beat_commercial_count_err"></span>
                </div>
            <div class="col-md-4">
                <label class="col-form-label" for="Estimated establishment Count">Estimated establishment Count<span class="text-danger">*</span></label>
                <input class="form-control" id="Estimated establishment Count" name="estimated_establishment_count" type="text" placeholder="Enter Estimated establishment Count">
                <span class="text-danger is-invalid estimated_establishment_count_err"></span>
            </div>
        </div>
        <div class="row">
                                <div class="col-12">
                                    <h2>Area Details</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Area Type</th>
                                                <th>Area Name</th>
                                                <th>Household count</th>
                                                <th>Shop count</th>
                                                <th>Total</th>
                                                <th><button class="btn btn-primary btn-sm" type="button" id="editMoreEditAreaRow">Add More</button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="editAreaTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
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
                                        <th>Name</th>
                                        <th>Beat No.</th>
                                        <th>Beat Name</th>
                                        <th>Start Point</th>
                                        <th>End Point</th>
                                        <th>Total distance</th>
                                        <th>Collection Mode</th>
                                        <th>Nearest Collection Center</th>
                                        <th>Distance From Collection Center</th>
                                        <th>Beat Animal Count</th>
                                        <th>Estimated No.of house/Establishment Preparing compost</th>
                                        <th>Beat Population</th>
                                        <th>Estimated Beat Residential Count</th>
                                        <th>Estimated Beat Commercial Count</th>
                                        <th>Estimated establishment Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wards as $ward)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $ward->name}}</td>
                                            <td>{{ $ward->beat_number}}</td>
                                            <td>{{ $ward->beat_name}}</td>
                                            <td>{{ $ward->start_point }}</td>
                                            <td>{{ $ward->end_point}}</td>
                                            <td>{{ $ward->total_distance }}</td>
                                            <td>{{ $ward->collection_mode}}</td>
                                            <td>{{ $ward->nearest_collection_center}}</td>
                                            <td>{{ $ward->distance_from_collection_center}}</td>
                                            <td>{{ $ward->beat_animal_count}}</td>
                                            <td>{{ $ward->estimated_number_of_house}}</td>
                                            <td>{{ $ward->beat_population}}</td>
                                            <td>{{ $ward->estimated_beat_residential_count}}</td>
                                            <td>{{ $ward->estimated_beat_commercial_count}}</td>
                                            <td>{{ $ward->estimated_establishment_count}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit ward" data-id="{{ $ward->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete ward" data-id="{{ $ward->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $ward->id }}"><i data-feather="eye"  data-id="{{ $ward->id }}"  data-bs-toggle="modal" data-bs-target=".wardsModel"></i></button>
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

 <div class="modal fade wardsModel" tabindex="-1" role="dialog" aria-labelledby="wardsModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="wardsModelLabel">Wards Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body" id="stockData">
                    <!-- First Table: Main Data -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Ward Name</th>
                                    <th>Beat Number</th>
                                    <th>Beat Name</th>
                                    <th>Starting Point</th>
                                    <th>End Point</th>
                                    <th>Total Distance</th>
                                    <th>Collection Mode</th>
                                    <th>Nearest Collection Center</th>
                                    <th>Distance From Collection Center</th>
                                    <th>Beat Animal Count</th>
                                    <th>Estimated Number Of House</th>
                                    <th>Beat Population</th>
                                    <th>Estimated Beat Residential Count</th>
                                    <th>Estimated Beat Commercial Count</th>
                                    <th>Estimated Establishment Count</th>
                                </tr>
                            </thead>
                            <tbody id="wardsModel">
                                <!-- Data will be injected here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Second Table: Additional Details -->
                    <div id="additional-info-table" class="mt-4">
                        <h5 class="modal-title" id="wardsModelLabel">Vehicle Information</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Area Type</th>
                                    <th>Area Name</th>
                                    <th>Household Count</th>
                                    <th>Shop Count</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="areadetailsModel">
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
            url: '{{ route('wards.store') }}',
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
                            window.location.href = '{{ route('wards.index') }}';
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
        var url = "{{ route('wards.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.wards.id);
                    $("#editForm input[name='name']").val(data.wards.name);
                    $("#editForm input[name='beat_number']").val(data.wards.beat_number);
                    $("#editForm input[name='beat_name']").val(data.wards.beat_name);
                    $("#editForm input[name='start_point']").val(data.wards.start_point);
                    $("#editForm input[name='end_point']").val(data.wards.end_point);
                    $("#editForm input[name='total_distance']").val(data.wards.total_distance);
                    $("#editForm input[name='collection_mode']").val(data.wards.collection_mode);
                    $("#editForm input[name='nearest_collection_center']").val(data.wards.nearest_collection_center);
                    $("#editForm input[name='distance_from_collection_center']").val(data.wards.distance_from_collection_center);
                    $("#editForm input[name='beat_animal_count']").val(data.wards.beat_animal_count);
                    $("#editForm input[name='estimated_number_of_house']").val(data.wards.estimated_number_of_house);
                    $("#editForm input[name='beat_population']").val(data.wards.beat_population);
                    $("#editForm input[name='estimated_beat_residential_count']").val(data.wards.estimated_beat_residential_count);
                    $("#editForm input[name='estimated_beat_commercial_count']").val(data.wards.estimated_beat_commercial_count);
                    $("#editForm input[name='estimated_establishment_count']").val(data.wards.estimated_establishment_count);

                    let html = "";
                    $.each(data.areaDetails, function(key, value){
                        let areaTypeOptions = ''; // Variable to hold area options

                        // Loop through the AreaType data passed from the controller
                        @foreach($AreaType as $Area)
                            areaTypeOptions += `<option value="{{ $Area->id }}" ${value['area_type'] == {{ $Area->id }} ? 'selected' : ''}>{{ $Area->Description }}</option>`;
                        @endforeach

                        html += `
                            <tr id="editRow${key}">
                                <td>
                                      <select name="area_type[]" class="form-select AddFormSelectAreaType" required>
                                <option value="">Select AreaType</option>
                                   ${areaTypeOptions}
                            </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control editAreaName" name="area_name[]" value="${value['area_name']}" required />
                                </td>
                                <td>
                                    <input type="text" class="form-control editHouseholdCount" required name="household_count[]" value="${value['household_count']}" />
                                </td>
                                <td>
                                    <input type="text" class="form-control editShopCount" required name="shop_count[]" value="${value['shop_count']}" />
                                </td>
                                <td>
                                    <input type="text" class="form-control editTotal" required name="total[]" value="${value['total']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#editAreaTableBody').append(html);
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
    $('body').on('click', '#editMoreEditAreaRow', function() {
        // Data should be fetched or replaced dynamically in a real case
        let value = {
            area_type: '',      // Default empty value or dynamically populated
            area_name: '',      // Default empty value or dynamically populated
            household_count: '',// Default empty value or dynamically populated
            shop_count: '',     // Default empty value or dynamically populated
            total: ''           // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                    <select name="area_type[]" class="form-select AddFormSelectAreaType" required>
                        <option value="">Select AreaType</option>
                        @foreach($AreaType as $Area)
                            <option value="{{ $Area->id }}">{{ $Area->Description }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control editAreaName" name="area_name[]" value="${value['area_name']}" required />
                </td>
                <td>
                    <input type="text" class="form-control editHouseholdCount" required name="household_count[]" value="${value['household_count']}" />
                </td>
                <td>
                    <input type="text" class="form-control editShopCount" required name="shop_count[]" value="${value['shop_count']}" />
                </td>
                <td>
                    <input type="text" class="form-control editTotal" required name="total[]" value="${value['total']}" />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>`;
        $('#editAreaTableBody').append(html);
        editRowCounter++;
    });

    // Event to remove a waste row (fixed event binding)
    $('body').on('click', '.removeRow', function() {
        let rowId = $(this).data('id');
        $(`#editRow${rowId}`).remove();
    });

    // Event to load and edit waste data (clicking the edit-Area button)
    $('body').on('click', '.edit-Area', function(e) {
        e.preventDefault();
        var Area_id = $(this).data("id");
        var url = "{{ route('wards.edit', ':area_id') }}".replace(':area_id', Area_id);

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
                    $("#editwardForm input[name='edit_id']").val(data.wards.id);
                    $("#editwardForm input[name='area_type']").val(data.wards.area_type);
                    $("#editwardForm input[name='area_name']").val(data.wards.area_name);
                    $("#editwardForm input[name='household_count']").val(data.wards.household_count);
                    $("#editwardForm input[name='shop_count']").val(data.wards.shop_count);
                    $("#editwardForm input[name='total']").val(data.wards.total);
                    // Populate the table with existing waste rows
                    $('#areaTableBody').html(data.areaRowsHtml);
                } else {
                    alert(data.error);
                }
            },
            error: function() {
                alert("Something went wrong. Please try again!");
            },
            complete: function() {
                $('#editMoreEditAreaRow').css('opacity', '1').css('visibility', 'visible');
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
            var url = "{{ route('wards.update', ":model_id") }}";
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
                                window.location.href = '{{ route('wards.index') }}';
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
            title: "Are you sure to delete this ward?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('wards.destroy', ":model_id") }}";

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
<script>
    $(document).ready(function () {
        let areaRowCount = 1; // Counter for row IDs

        // Add More Button Functionality
        $('#addMoreAreaButton').on('click', function () {
            let html = `<tr id="areaRow${areaRowCount}">
                            <td>
                                <select name="area_type[]" class="form-select AddFormSelectAreaType" required>
                                <option value="">Select AreaType</option>
                                   @foreach($AreaType as $Area)
                                   <option value="{{ $Area->id }}">{{ $Area->Description }}</option>
                                  @endforeach
                            </select>
                            </td>
                            <td>
                                <input type="text" name="area_name[]" class="form-control" placeholder="Enter Area Name" required>
                            </td>
                            <td>
                                <input type="number" name="household_count[]" class="form-control householdCount" placeholder="Enter Household Count" required>
                            </td>
                            <td>
                                <input type="number" name="shop_count[]" class="form-control shopCount" placeholder="Enter Shop Count" required>
                            </td>
                            <td>
                                <input type="number" name="total[]" class="form-control totalField" placeholder="Total" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removeAreaRow" data-id="${areaRowCount}">Remove</button>
                            </td>
                        </tr>`;

            $('#areaTableBody').append(html);
            areaRowCount++;
        });

        // Remove Row Functionality
        $('body').on('click', '.removeAreaRow', function () {
            const rowId = $(this).data('id');
            $(`#areaRow${rowId}`).remove();
        });

        // Automatically calculate the total for each row
        $('body').on('input', '.householdCount, .shopCount', function () {
            const row = $(this).closest('tr');
            const householdCount = parseInt(row.find('.householdCount').val()) || 0;
            const shopCount = parseInt(row.find('.shopCount').val()) || 0;
            const total = householdCount + shopCount;
            row.find('.totalField').val(total);
        });
    });
</script>


{{-- view --}}
<script>
    $('body').on('click', '.view-element', function() {
        var model_id = $(this).data("id");  // Ensure that 'data-id' is being passed correctly
        var url = "{{ route('wards.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                newMaterialRequest: 'new'
            },
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    // First Table HTML for Main Data
                    let mainDataHtml = `
                        <tr>
                            <td>${data.ward.name ?? 'N/A'}</td>
                            <td>${data.ward.beat_number ?? 'N/A'}</td>
                            <td>${data.ward.beat_name ?? 'N/A'}</td>
                            <td>${data.ward.start_point ?? 'N/A'}</td>
                            <td>${data.ward.end_point ?? 'N/A'}</td>
                            <td>${data.ward.total_distance ?? 'N/A'}</td>
                            <td>${data.ward.collection_mode ?? 'N/A'}</td>
                            <td>${data.ward.nearest_collection_center ?? 'N/A'}</td>
                            <td>${data.ward.distance_from_collection_center ?? 'N/A'}</td>
                            <td>${data.ward.beat_animal_count ?? 'N/A'}</td>
                            <td>${data.ward.estimated_number_of_house ?? 'N/A'}</td>
                            <td>${data.ward.beat_population ?? 'N/A'}</td>
                            <td>${data.ward.estimated_beat_residential_count ?? 'N/A'}</td>
                            <td>${data.ward.estimated_beat_commercial_count ?? 'N/A'}</td>
                            <td>${data.ward.estimated_establishment_count ?? 'N/A'}</td>
                        </tr>
                    `;
                    $('#wardsModel').html(mainDataHtml);

                    // Second Table HTML for Additional Details
                    let additionalDetailsHtml = '';
                    $.each(data.areaDetails, function(key, value) {
                        additionalDetailsHtml += `
                            <tr>
                                <td>${value.area_type || 'N/A'}</td>
                                <td>${value.area_name || 'N/A'}</td>
                                <td>${value.household_count || 'N/A'}</td>
                                <td>${value.shop_count || 'N/A'}</td>
                                <td>${value.total || 'N/A'}</td>
                            </tr>
                        `;
                    });
                    $('#areadetailsModel').html(additionalDetailsHtml);

                } else {
                    swal("Error!", data.error || "Something went wrong", "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong while fetching data.", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0').css('visibility', 'hidden');
            },
        });
    });
</script>
