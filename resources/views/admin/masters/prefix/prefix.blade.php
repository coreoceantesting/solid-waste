<x-admin.layout>
    <x-slot name="title">Prefix</x-slot>
    <x-slot name="heading">Prefix</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Prefix</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Prefix_Name">Prefix Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Prefix_Name" name="Prefix_Name" type="text" placeholder="Enter Prefix_Name">
                                    <span class="text-danger is-invalid Prefix_Name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description" name="Description" type="text" placeholder="Enter Description">
                                    <span class="text-danger is-invalid Description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Zone">Zone<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Zone" name="Zone" type="text" placeholder="Enter Zone">
                                    <span class="text-danger is-invalid Zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="Status" name="Status" required>
                                        <option value="" disabled selected>Select status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid Status_err"></span>
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
                            <h4 class="card-title">Edit Prefix</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="Prefix Name">Prefix Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Prefix_Name" name="Prefix_Name" type="text" placeholder="Enter Prefix Name">
                                    <span class="text-danger is-invalid Prefix_Name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description" name="Description" type="text" placeholder="Enter Description">
                                    <span class="text-danger is-invalid Description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Zone">Zone<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Zone" name="Zone" type="text" placeholder="Enter Zone">
                                    <span class="text-danger is-invalid Zone_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Status">Status<span class="text-danger">*</span></label>
                                    <select class="form-control" id="Status" name="Status" required>
                                        <option value="" disabled selected>Select status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <span class="text-danger is-invalid Status_err"></span>
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
                                        <th>Sr.No</th>
                                        <th>Prefix Name</th>
                                        <th>Description</th>
                                        <th>Zone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Prefix as $Pref)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $Pref->Prefix_Name }}</td>
                                            <td>{{ $Pref->Description }}</td>
                                            <td>{{ $Pref->Zone }}</td>
                                            <td>{{ $Pref->Status}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit Prefix" data-id="{{ $Pref->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete Prefix" data-id="{{ $Pref->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('prefix.store') }}',
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
                            window.location.href = '{{ route('prefix.index') }}';
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
        var url = "{{ route('prefix.edit', ":model_id") }}";

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
                    $("#editForm input[name='edit_model_id']").val(data.Prefix.id);
                    $("#editForm input[name='Prefix_Name']").val(data.Prefix.Prefix_Name);
                    $("#editForm input[name='Description']").val(data.Prefix.Description);
                    $("#editForm input[name='Zone']").val(data.Prefix.Zone);
                    $("#editForm select[name='Status']").val(data.Prefix.Status);
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
            var url = "{{ route('prefix.update', ":model_id") }}";
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
                                window.location.href = '{{ route('prefix.index') }}';
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
            title: "Are you sure to delete this AreaType?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('prefix.destroy', ":model_id") }}";

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
