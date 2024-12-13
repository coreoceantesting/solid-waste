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
<div class="container mt-5">
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
</div>
<script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="editSubmit">Submit</button>
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
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
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
                    $("#editForm input[name='edit_model_id']").val(data.ward.id);
                    $("#editForm input[name='name']").val(data.ward.name);
                    $("#editForm input[name='beat_number']").val(data.ward.beat_number);
                    $("#editForm input[name='beat_name']").val(data.ward.beat_name);
                    $("#editForm input[name='start_point']").val(data.ward.start_point);
                    $("#editForm input[name='end_point']").val(data.ward.end_point);
                    $("#editForm input[name='total_distance']").val(data.ward.total_distance);
                    $("#editForm input[name='collection_mode']").val(data.ward.collection_mode);
                    $("#editForm input[name='nearest_collection_center']").val(data.ward.nearest_collection_center);
                    $("#editForm input[name='distance_from_collection_center']").val(data.ward.distance_from_collection_center);
                    $("#editForm input[name='beat_animal_count']").val(data.ward.beat_animal_count);
                    $("#editForm input[name='estimated_number_of_house']").val(data.ward.estimated_number_of_house);
                    $("#editForm input[name='beat_population']").val(data.ward.beat_population);
                    $("#editForm input[name='estimated_beat_residential_count']").val(data.ward.estimated_beat_residential_count);
                    $("#editForm input[name='estimated_beat_commercial_count']").val(data.ward.estimated_beat_commercial_count);
                    $("#editForm input[name='estimated_establishment_count']").val(data.ward.estimated_establishment_count);

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
