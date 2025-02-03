<x-admin.layout>
    <x-slot name="title">Collection Scheduling Report</x-slot>
    <x-slot name="heading">Collection Scheduling Report</x-slot>

<form class="theme-form" id="dateForm">
    <div class="row">
        <div class="col-sm-12">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                    <input class="form-control" id="from_date" name="from_date" type="date" placeholder="Enter Schedule From">
                    <span class="text-danger is-invalid from_date_err"></span>
                </div>
                <div class="col-md-4">
                    <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                    <input class="form-control" id="to_date" name="to_date" type="date" placeholder="Enter Schedule To">
                    <span class="text-danger is-invalid to_date_err"></span>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <div class="d-flex gap-2 w-100">
                        <button class="btn btn-primary w-50" id="submit">Search</button>
                        <button class="btn btn-danger w-50" id="download">Download PDF</button>
                        {{-- <button class="btn btn-secondary w-50" id="refresh">Refresh</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    // Submit Form and Serialize Data to URL
    document.getElementById('submit').addEventListener('click', function(event) {
        event.preventDefault();

        // Serialize form data
        var formData = $('#dateForm').serialize();

        // Redirect with query params
        var baseUrl = window.location.origin + window.location.pathname;
        var url = baseUrl + '?' + formData; // Append query string
        window.location.href = url; // Redirect to URL
    });

    // Handle Download PDF
    document.getElementById('download').addEventListener('click', function(event) {
        event.preventDefault();

        // Serialize form data
        var formData = $('#dateForm').serialize();

        // Generate the download URL with query params
        var downloadUrl = "{{ route('reports.collection.pdf') }}" + '?' + formData;
        window.open(downloadUrl, '_blank');
    });
</script>


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Collection Scheduling Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Number</th>
                                    <th>Employee Name</th>
                                    <th>Schedule Date</th>
                                    <th>Beat</th>
                                    <th>From Time</th>
                                    <th>To Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($VehicleSchedulingInformation as $Vehicle)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $Vehicle->vehicle_type }}</td>
                                        <td>{{ $Vehicle->vehicle_number }}</td>
                                        <td>{{ $Vehicle->employee_name }}</td>
                                        <td>{{ $Vehicle->schedule_form }}</td>
                                        <td>{{ $Vehicle->beat_number }}</td>
                                        <td>{{ $Vehicle->in_time }}</td>
                                        <td>{{ $Vehicle->out_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
