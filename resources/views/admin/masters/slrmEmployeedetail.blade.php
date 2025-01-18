<x-admin.layout>
    <x-slot name="title">SlrmEmployee Details</x-slot>
    <x-slot name="heading">SlrmEmployee Details</x-slot>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Plant Details -->
                        <div class="card-header">
                            <h4 class="card-title">Add SLRM Employee Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="collection_center">Collection Center<span class="text-danger">*</span></label>
                                    <select class="form-control" name="collection_center" id="collection_center">
                                        <option value="">select collection centers</option>
                                         @foreach ($SlrmEmployeeDetails as $SlrmEmployee)
                                            <option value="{{$SlrmEmployee->p_name}}">{{$SlrmEmployee->p_name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid collection_center_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="designation">Designation<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="designation" name="designation" type="text" placeholder="Enter Designation"> --}}
                                    <select class="form-control" name="designation" id="designation">
                                        <option value="">select Designation</option>
                                         @foreach ($designations as $designation)
                                            <option value="{{$designation->name}}">{{$designation->name}}</option>
                                         @endforeach
                                    </select>
                                    <span class="text-danger is-invalid designation_err"></span>
                                </div>
                            </div>
                        </div>
                      <!-- Add Bootstrap CSS and Icons if not already included -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
          <div class="card-header d-flex align-items-center">
    <!-- Plus Icon -->
        <i class="bi bi-plus-circle" style="color: white; background-color: green; border-radius: 50%; padding: 5px; font-size: 20px; margin-right: 10px;"></i>
    <!-- Card Title -->
     <h4 class="card-title m-0">Add Employee Information</h4>
   </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="emp_code">Employee code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="emp_code" name="emp_code" type="text" placeholder="Enter Employee code">
                                    <span class="text-danger is-invalid emp_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                    <input class="form-control" id="title" name="title" type="text" placeholder="Enter Title">
                                    <span class="text-danger is-invalid title_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="f_name">first Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter first Name">
                                    <span class="text-danger is-invalid f_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="m_name">Middle Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter Middle Name">
                                    <span class="text-danger is-invalid m_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="l_name">Last Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name">
                                    <span class="text-danger is-invalid l_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="gender">Gender<span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="" >Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="text-danger is-invalid gender_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="m_number">Mobile Number<span class="text-danger">*</span></label>
                                    {{-- <input class="form-control" id="m_number" name="m_number" maxlength="10" type="number" placeholder="Enter Mobile Number"> --}}
                                    <input class="form-control" type="tel" name="m_number" id="m_number" maxlength="10" placeholder="Enter Mobile Number" required>
                                    <span class="text-danger is-invalid m_number_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="email_id">Email ID<span class="text-danger">*</span></label>
                                    <input class="form-control" id="email_id" name="email_id" type="text" placeholder="Enter Email ID">
                                    <span class="text-danger is-invalid email_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="address">Address<span class="text-danger">*</span></label>
                                    <input class="form-control" id="address" name="address" type="text" placeholder="Enter Address">
                                    <span class="text-danger is-invalid address_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="address_one">Address One<span class="text-danger">*</span></label>
                                    <input class="form-control" id="address_one" name="address_one" type="text" placeholder="Enter Address One">
                                    <span class="text-danger is-invalid address_one_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="pin_code">Pin Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="pin_code" name="pin_code" maxlength="6" type="text" placeholder="Enter pin code"
                                           oninput="validatePinCode(this)" onkeypress="return isNumberKey(event)">
                                    <span class="text-danger is-invalid pin_code_err"></span>
                                </div>
                            </div>
                        </div>


                        <!-- Form Buttons -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
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
                            <h4 class="card-title">Edit SLRM Employee Details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="collection_center">Collection Center<span class="text-danger">*</span></label>
                                        <input class="form-control" id="collection_center" name="collection_center" type="text" placeholder="Enter Collection Center">
                                        <span class="text-danger is-invalid collection_center_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="designation">Designation<span class="text-danger">*</span></label>
                                        <input class="form-control" id="designation" name="designation" type="text" placeholder="Enter designation">
                                        <span class="text-danger is-invalid designation_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header d-flex align-items-center">
                                <!-- Plus Icon -->
                                    <i class="bi bi-plus-circle" style="color: white; background-color: green; border-radius: 50%; padding: 5px; font-size: 20px; margin-right: 10px;"></i>
                                <!-- Card Title -->
                                 <h4 class="card-title m-0">Edit Employee Information</h4>
                               </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="emp_code">Employee Code<span class="text-danger">*</span></label>
                                        <input class="form-control" id="emp_code" name="emp_code" type="text" placeholder="Enter Employee Code">
                                        <span class="text-danger is-invalid emp_code_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="title">Title<span class="text-danger">*</span></label>
                                        <input class="form-control" id="title" name="title" type="text" placeholder="Enter Title">
                                        <span class="text-danger is-invalid title_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="f_name">First Name<span class="text-danger">*</span></label>
                                        <input class="form-control" id="f_name" name="f_name" type="text" placeholder="Enter First name">
                                        <span class="text-danger is-invalid f_name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="m_name">Middle Name<span class="text-danger">*</span></label>
                                        <input class="form-control" id="m_name" name="m_name" type="text" placeholder="Enter middle name">
                                        <span class="text-danger is-invalid m_name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="l_name">Last Name<span class="text-danger">*</span></label>
                                        <input class="form-control" id="l_name" name="l_name" type="text" placeholder="Enter Last Name">
                                        <span class="text-danger is-invalid l_name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="gender">Gender<span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="text-danger is-invalid gender_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="m_number">Mobile Number<span class="text-danger">*</span></label>
                                        {{-- <input class="form-control" id="m_number" name="m_number" type="number" maxlength="10" placeholder="Enter Mobile Number"> --}}
                                        <input class="form-control" type="tel" name="m_number" id="m_number" maxlength="10" placeholder="Enter Mobile Number" required>
                                        <span class="text-danger is-invalid m_number_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="email_id">Email Id<span class="text-danger">*</span></label>
                                        <input class="form-control" id="email_id" name="email_id" type="text" placeholder="Enter Email Id ">
                                        <span class="text-danger is-invalid email_id_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="address">Address<span class="text-danger">*</span></label>
                                        <input class="form-control" id="address" name="address" type="text" placeholder="Enter Address">
                                        <span class="text-danger is-invalid address_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="address_one">Address One<span class="text-danger">*</span></label>
                                        <input class="form-control" id="address_one" name="address_one" type="text" placeholder="Enter Address One">
                                        <span class="text-danger is-invalid address_one_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="pin_code">Pin Code<span class="text-danger">*</span></label>
                                        <input class="form-control" id="pin_code" name="pin_code" maxlength="6" type="text" placeholder="Enter pin code"
                                               oninput="validatePinCode(this)" onkeypress="return isNumberKey(event)">
                                        <span class="text-danger is-invalid pin_code_err"></span>
                                    </div>
                                </div>
                            </div>
                              <div class="card-footer">
                                <button type="submit" id="editSubmit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
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
                                        <th>Designation</th>
                                        <th>Collection Center</th>
                                        <th>Employee Code</th>
                                        <th>Title</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        {{-- <th>Mobile Number</th>
                                        <th>Email Id</th>
                                        <th>Address</th>
                                        <th>Address One</th>
                                        <th>Pin Code</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($slrmemployee as $slrm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $slrm->collection_center }}</td>
                                            <td>{{ $slrm->designation }}</td>
                                            <td>{{ $slrm->emp_code}}</td>
                                            <td>{{ $slrm->title}}</td>
                                            <td>{{ $slrm->f_name}}</td>
                                            <td>{{ $slrm->m_name}}</td>
                                            <td>{{ $slrm->l_name}}</td>
                                            <td>{{ $slrm->gender}}</td>
                                            {{-- <td>{{ $slrm->m_number}}</td>
                                            <td>{{ $slrm->email_id}}</td>
                                            <td>{{ $slrm->address}}</td>
                                            <td>{{ $slrm->address_one}}</td>
                                            <td>{{ $slrm->pin_code}}</td> --}}
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit slrmemployeedetail" data-id="{{ $slrm->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete slrmemployeedetail" data-id="{{ $slrm->id }}"><i data-feather="trash-2"></i> </button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View slrmemployeedetail" data-id="{{ $slrm->id }}"><i data-feather="eye"  data-id="{{ $slrm->id }}"  data-bs-toggle="modal" data-bs-target=".slrmemployeedetail"></i></button>
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
  <div class="modal fade slrmemployeedetail" tabindex="-1" role="dialog" aria-labelledby="slrmemployeedetailLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="slrmemployeedetailLabel">Trip Sheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body" id="stockData">
                    <!-- First Table: Employee Details -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>Collection Center</th>
                                    <th>Employee Code</th>
                                    <th>Title</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>Mobile Number</th>
                                    <th>Email Id</th>
                                    <th>Address</th>
                                    <th>Address One</th>
                                    <th>Pin Code</th>
                                </tr>
                            </thead>
                            <tbody id="slrmemployeedetail">
                                <!-- Data will be injected here dynamically -->
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
            url: '{{ route('slrm-employee-details.store') }}',
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
                            window.location.href = '{{ route('slrm-employee-details.index') }}';
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
        var url = "{{ route('slrm-employee-details.edit', ":model_id") }}";

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
                    $("#editForm input[id='edit_model_id']").val(data.slrmemployee.id);
                    $("#editForm input[name='collection_center']").val(data.slrmemployee.collection_center);
                    $("#editForm input[name='designation']").val(data.slrmemployee.designation);
                    $("#editForm input[name='emp_code']").val(data.slrmemployee.emp_code);
                    $("#editForm input[name='title']").val(data.slrmemployee.title);
                    $("#editForm input[name='f_name']").val(data.slrmemployee.f_name);
                    $("#editForm input[name='m_name']").val(data.slrmemployee.m_name);
                    $("#editForm input[name='l_name']").val(data.slrmemployee.l_name);
                    $("#editForm select[name='gender']").val(data.slrmemployee.gender);
                    $("#editForm input[name='m_number']").val(data.slrmemployee.m_number);
                    $("#editForm input[name='email_id']").val(data.slrmemployee.email_id);
                    $("#editForm input[name='address']").val(data.slrmemployee.address);
                    $("#editForm input[name='address_one']").val(data.slrmemployee.address_one);
                    $("#editForm input[name='pin_code']").val(data.slrmemployee.pin_code);
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
            var url = "{{ route('slrm-employee-details.update', ":model_id") }}";
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
                                window.location.href = '{{ route('slrm-employee-details.index') }}';
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
            title: "Are you sure to delete this Slrm Employee Details?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('slrm-employee-details.destroy', ":model_id") }}";

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
{{-- views --}}
<script>
    $('body').on('click', '.view-element', function () {
        var model_id = $(this).data("id");
        var url = "{{ route('slrm-employee-details.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function (data) {
                if (data.result === 1) {
                    // Populate the First Table: Employee Details
                    let mainDataHtml = `
                        <tr>
                            <td>${data.SlrmEmployeeDetails.designation || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.collection_center || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.emp_code || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.title || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.f_name || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.m_name || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.l_name || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.gender || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.m_number || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.email_id || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.address || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.address_one || 'N/A'}</td>
                            <td>${data.SlrmEmployeeDetails.pin_code || 'N/A'}</td>
                        </tr>
                    `;
                    $('#slrmemployeedetail').html(mainDataHtml); // Populating the table with employee data
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
