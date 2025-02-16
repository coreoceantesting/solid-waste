<x-admin.layout>
    <x-slot name="title">Population</x-slot>
    <x-slot name="heading">Population</x-slot>

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Add Form -->

    <div class="row" id="addContainer" style="display:none;">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">Add Population</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="select_year">Select Year <span class="text-danger">*</span></label>
                                {{-- <select class="form-select " id="select_year" name="select_year">
                                    <option value="">select population</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2024">2024</option>
                                </select> --}}
                                <select class="form-select" name="select_year" id="select_year">
                                    <option value="">select years</option>
                                     @foreach ($censusyears as $census)
                                        <option value="{{$census->Description}}">{{$census->Description}}</option>
                                     @endforeach
                                </select>
                                <span class="text-danger select_year_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>Population Details</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Zone</th>
                                        <th>Ward</th>
                                        <th>Colony</th>
                                        <th>Society</th>
                                        <th>Population</th>
                                        <th>
                                            <button class="btn btn-primary btn-sm" type="button" id="addMorePopulationButton">Add More</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="populationTableBody"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Form -->
    <div class="row" id="editContainer" style="display:none;">
        <div class="col">
            <form class="form-horizontal"  id="editForm">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Population</h4>
                    </div>
                    <div class="card-body py-2">
                        <input type="hidden" id="edit_model_id" name="edit_model_id">
                        <div class="mb-3 row">
                            <div class="col-md-4">
                                <label class="col-form-label" for="edit_select_year">Select Year<span class="text-danger">*</span></label>
                                <select class="form-select" name="select_year" id="select_year">
                                    <option value="">select years</option>
                                     @foreach ($censusyears as $census)
                                        <option value="{{$census->Description}}">{{$census->Description}}</option>
                                     @endforeach
                                </select>
                                <span class="text-danger select_year_err"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Population Details</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Zone</th>
                                            <th>Ward</th>
                                            <th>Colony</th>
                                            <th>Society</th>
                                            <th>Population</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="editMorePopulationButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="editPopulationTableBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="editSubmit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-secondary">reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Population Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="populationTable" class="table table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Year</th>
                                    <th>Total Population</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($population as $popu)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $popu->select_year }}</td>
                                        <td>{{ $popu->total_population }}</td>
                                        <td>
                                            <button class="edit-element btn text-secondary px-2 py-1" title="Edit Population" data-id="{{ $popu->select_year }}"><i data-feather="edit"></i></button>
                                           <button class="btn text-danger rem-element px-2 py-1" title="Delete Population" data-id="{{ $popu->select_year }}"><i data-feather="trash-2"></i> </button>
                                           <button class="btn text-danger view-element px-2 py-1" title="View Population" data-id="{{ $popu->select_year }}"><i data-feather="eye"  data-id="{{ $popu->select_year }}"  data-bs-toggle="modal" data-bs-target=".population"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     {{-- view model --}}
     <div class="modal fade population" tabindex="-1" role="dialog" aria-labelledby="populationLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="populationLabel">Population</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="stockData">
                        <!-- First Table: Main Data -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Select year</th>
                                    </tr>
                                </thead>
                                <tbody id="mainData">
                                    <!-- Data will be injected here -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Second Table: Additional Details -->
                        <div id="additional-info-table" class="mt-4">
                            <h5>Population Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Zone</th>
                                        <th>Ward</th>
                                        <th>Colony</th>
                                        <th>Society</th>
                                        <th>Total Population</th>
                                    </tr>
                                </thead>
                                <tbody id="populationData">
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
            url: '{{ route('population.store') }}',
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
                            window.location.href = '{{ route('population.index') }}';
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
    $("#populationTable").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('population.edit', ":model_id") }}";

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
                    $("#editForm input[id='edit_model_id']").val(data.select_year);
                    $("#editForm select[name='select_year']").val(data.select_year);
                    $("#editForm select[name='zone']").val(data.zone);

                    let populationdetails = "";
                    $.each(data.population, function(key, value) {

                    let PrefixOptions = ''; // Variable to hold vehicle type options

// Loop through VehicleType data dynamically from the controller
                   @foreach($Prefix as $Pre)
                    PrefixOptions += `<option value="{{ $Pre->id }}" ${value['zone'] == {{ $Pre->id }} ? 'selected' : ''}>{{ $Pre->Zone }}</option>`;
                  @endforeach

                  let WardOptions = ''; // Variable to hold ward options
                        @foreach($wards as $ward)
                            WardOptions += `<option value="{{ $ward->id }}" ${
                                value['ward'] == {{ $ward->id }} ? 'selected' : ''
                            }>{{ $ward->name }}</option>`;
                        @endforeach


                        // Append HTML for each row dynamically
                        populationdetails += `
                            <tr id="editRow${key}">
                                <td>
                                    <select name="zone[]" class="form-select AddFormSelectZone" required>
                                  <option value="">Select Zone</option>
                                  ${PrefixOptions}
                                 </select>
                                </td>
                                <td>
                                       <select name="ward[]" class="form-select AddFormSelectZone" required>
                                  <option value="">Select wards</option>
                                  ${WardOptions}
                                 </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control editRequiredCount" required name="colony[]" value="${value['colony']}" />
                                </td>
                                <td>
                                    <input type="text" class="form-control editRequiredCount" required name="society[]" value="${value['society']}" />
                                </td>
                                 <td>
                                    <input type="text" class="form-control editRequiredCount" required name="population[]" value="${value['population']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeRow" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                    });

                    // Append the generated HTML to the vehicle table body
                    $('#editPopulationTableBody').html(populationdetails);


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

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMorePopulationButton', function() {
        let value = {
            select_year: '',      // Default empty value or dynamically populated
            zone: '',   // Default empty value or dynamically populated
            ward: '',
            colony: '',
            society: '',
            population: '',   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editRow${editRowCounter}">
                <td>
                 <select name="Zone[]" class="form-select AddFormSelectZone" required>
                        <option value="">Select zone</option>
                        @foreach($Prefix as $Pre)
                            <option value="{{ $Pre->id }}">{{ $Pre->Zone }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="name[]" class="form-select AddFormSelectwards" required>
                        <option value="">Select wards</option>
                        @foreach($Prefix as $Pre)
                            <option value="{{ $Pre->id }}">{{ $Pre->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control editcolonyt" name="colony[]" value="${value['colony']}" required />
                </td>
                   <td>
                    <input type="text" class="form-control editsociety" name="society[]" value="${value['society']}" required />
                </td>
                   <td>
                    <input type="text" class="form-control editpopulation" name="population[]" value="${value['population']}" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeRow" data-id="${editRowCounter}">Remove</button>
                </td>
            </tr>
        `;
        $('#editPopulationTableBody').append(html);
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
            var url = "{{ route('population.update', ":model_id") }}";
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
                                window.location.href = '{{ route('population.index') }}';
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
    $("#populationTable").on("click", ".rem-element", function(e) {
    e.preventDefault();
    swal({
        title: "Are you sure to delete this p\opulation?",
        icon: "info",
        buttons: ["Cancel", "Confirm"]
    })
    .then((justTransfer) => {
        if (justTransfer) {
            var model_id = $(this).attr("data-id");

            // Correct the URL generation using string replacement
            var url = "{{ route('population.destroy', ':model_id') }}".replace(':model_id', model_id);

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    '_method': "DELETE",
                    '_token': "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (!data.error) {
                        swal("Success!", data.success, "success")
                            .then(() => {
                                window.location.reload(); // Reload the page after successful deletion
                            });
                    } else {
                        swal("Error!", data.error, "error");
                    }
                },
                error: function() {
                    swal("Error!", "Something went wrong", "error");
                },
            });
        }
    });
});
</script>

{{-- Add form for Population details --}}
<script>
    $(document).ready(function () {
        let populationRowCount = 1; // Counter for unique row IDs
        let defaultRowAdded = false; // Flag to check if default row is already added

        // Function to add a row (Default or on button click)
        function appendPopulationRow() {
            let html = `<tr id="populationRow${populationRowCount}">
                            <td>
                                <select name="zone[]" class="form-select AddFormSelectZone" required>
                                    <option value="">Select Zone</option>
                                    @foreach($Prefix as $Pre)
                                        <option value="{{ $Pre->id }}">{{ $Pre->Zone }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="ward[]" class="form-select AddFormSelectward" required>
                                    <option value="">Select ward</option>
                                    @foreach($wards as $ward)
                                        <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" name="colony[]" class="form-control" placeholder="Enter colony" required>
                            </td>
                            <td>
                                <input type="text" name="society[]" class="form-control" placeholder="Enter society" required>
                            </td>
                            <td>
                                <input type="number" name="population[]" class="form-control" placeholder="Enter population" required>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm removePopulationRow" data-id="${populationRowCount}">Remove</button>
                            </td>
                        </tr>`;
            $('#populationTableBody').append(html); // Add the row to the table body
            populationRowCount++; // Increment the row counter for unique IDs
        }

        // Add the first row by default when the page loads
        if (!defaultRowAdded) {
            appendPopulationRow(); // Add the default row
            defaultRowAdded = true; // Set the flag to true after adding the default row
        }

        // "Add More" Button functionality (after default row is added)
        $('#addMorePopulationButton').on('click', function () {
            appendPopulationRow(); // Add a new row when the button is clicked
        });

        // Remove Row Functionality
        $('body').on('click', '.removePopulationRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#populationRow${rowId}`).remove(); // Remove the corresponding row
        });
    });
</script>
{{-- views --}}
<script>
    $('body').on('click', '.view-element', function () {
        var model_id = $(this).data("id");
        var url = "{{ route('population.show', ':model_id') }}".replace(':model_id', model_id);

        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function () {
                $('#preloader').css('opacity', '0.5').css('visibility', 'visible');
            },
            success: function (data) {
                if (data.result === 1) {
                    // Populate the First Table: Population Details
                    let mainDataHtml = `
                        <tr>
                            <td>${data.year || 'N/A'}</td>
                        </tr>
                    `;
                    $('#mainData').html(mainDataHtml);  // Inject into correct table

                    // Populate the Second Table: Segregation Data
                    let segregationDataHtml = ''; // Initialize variable for Segregation Data

                    if (Array.isArray(data.Population) && data.Population.length > 0) {
                        $.each(data.Population, function (key, value) {
                            segregationDataHtml += `
                                <tr>
                                    <td>${value.Zone || 'N/A'}</td>
                                    <td>${value.name || 'N/A'}</td>
                                    <td>${value.colony || 'N/A'}</td>
                                    <td>${value.society || 'N/A'}</td>
                                    <td>${value.population || 'N/A'}</td>
                                </tr>
                            `;
                        });
                        $('#populationData').html(segregationDataHtml); // Inject segregation data
                    } else {
                        // If no segregation data found, display message
                        segregationDataHtml = `<tr><td colspan="5" class="text-center">No data available</td></tr>`;
                        $('#populationData').html(segregationDataHtml);
                    }
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
