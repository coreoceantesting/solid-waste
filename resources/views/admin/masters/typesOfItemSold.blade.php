<x-admin.layout>
    <x-slot name="title">Types Of Item Sold</x-slot>
    <x-slot name="heading">Types Of Item Sold</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}


        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h4 class="card-title">Add Types Of Item Sold</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description" name="Description" type="text" placeholder="Enter Description">
                                    <span class="text-danger is-invalid Description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Description_regional">Description Regional<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description_regional" name="Description_regional" type="text" placeholder="Enter Description regional">
                                    <span class="text-danger is-invalid Description_regional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Value">Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Value" name="value" type="text" placeholder="Enter Value">
                                    <span class="text-danger is-invalid value_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="other_value">Other Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="other_value" name="other_value" type="text" placeholder="Enter other Value">
                                    <span class="text-danger is-invalid other_value_err"></span>
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
                            <h4 class="card-title">Edit Types Of Item Sold</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="mb-3 row">
                            <div class="col-md-4">
                                    <label class="col-form-label" for="Description">Description<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description" name="Description" type="text" placeholder="Enter Description">
                                    <span class="text-danger is-invalid Description_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Description_regional">Description Regional<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Description_regional" name="Description_regional" type="text" placeholder="Enter Description regional">
                                    <span class="text-danger is-invalid Description_regional_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Value">Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="Value" name="value" type="text" placeholder="Enter Value">
                                    <span class="text-danger is-invalid value_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="other_value">Other Value<span class="text-danger">*</span></label>
                                    <input class="form-control" id="other_value" name="other_value" type="text" placeholder="Enter other Value">
                                    <span class="text-danger is-invalid other_value_err"></span>
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
                                        <th>Description</th>
                                        <th>Description_regional</th>
                                        <th>Value</th>
                                        <th>other_value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($TypesOfItemSold as $TypesOfItem)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $TypesOfItem->Description }}</td>
                                            <td>{{ $TypesOfItem->Description_regional }}</td>
                                            <td>{{ $TypesOfItem->value }}</td>
                                            <td>{{ $TypesOfItem->other_value }}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit TypesOfItemSold" data-id="{{ $TypesOfItem->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete TypesOfItemSold" data-id="{{ $TypesOfItem->id }}"><i data-feather="trash-2"></i> </button>
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
            url: '{{ route('types-of-item-solds.store') }}',
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
                            window.location.href = '{{ route('types-of-item-solds.index') }}';
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
        var url = "{{ route('types-of-item-solds.edit', ":model_id") }}";


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
                    $("#editForm input[id='edit_model_id']").val(data.TypesOfItemSold.id);
                    $("#editForm input[name='Description']").val(data.TypesOfItemSold.Description);
                    $("#editForm input[name='Description_regional']").val(data.TypesOfItemSold.Description_regional);
                    $("#editForm input[name='value']").val(data.TypesOfItemSold.value);
                    $("#editForm input[name='other_value']").val(data.TypesOfItemSold.other_value);
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
            var url = "{{ route('types-of-item-solds.update', ":model_id") }}";
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
                                window.location.href = '{{ route('types-of-item-solds.index') }}';
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
            title: "Are you sure to delete this types of item sold?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('types-of-item-solds.destroy', ":model_id") }}";

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
