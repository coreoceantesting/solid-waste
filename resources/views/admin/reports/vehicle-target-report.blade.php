<x-admin.layout>
    <x-slot name="title">Vehicle Target</x-slot>
    <x-slot name="heading">Vehicle Target</x-slot>

    <form class="theme-form" id="dateForm">
        <div class="row">
            <div class="col-sm-12">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                        <input class="form-control" id="from_date" name="from_date" type="date" placeholder="Enter from date" onkeydown="return false;">
                        <span class="text-danger is-invalid from_date_err"></span>
                    </div>
                    <div class="col-md-4">
                        <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                        <input class="form-control" id="to_date" name="to_date" type="date" placeholder="Enter Schedule To" onkeydown="return false;">
                        <span class="text-danger is-invalid to_date_err"></span>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <div class="d-flex gap-2 w-100">
                            <button class="btn btn-primary w-20" id="submit">Search</button>
                            <button class="btn btn-danger w-20" id="download" style="background-color: rgb(26, 177, 26); color: white; border: 1px solid rgb(23, 121, 23);">Download PDF</button>
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
            var downloadUrl = "{{ route('reports.vehicle.pdf') }}" + '?' + formData;
            window.open(downloadUrl, '_blank');
        });
    </script>

    {{-- <div class="row" id="addContainer">
        <div class="col-sm-12"> --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vehicle Target</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Target From Date</th>
                                    <th>Target To Date</th>
                                    <th>Vehicle Number</th>
                                    <th>Beat Number</th>
                                    <th>Garbage Volume</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($VehicleTarget as $vehicle)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$vehicle->target_from_date}}</td>
                                    <td>{{$vehicle->target_to_date}}</td>
                                    <td>{{$vehicle->vehicle_number}}</td>
                                    <td>{{$vehicle->beat_number}}</td>
                                    <td>{{$vehicle->garbage_volumne}}</td>
                                </tr>
                                @endforeach
                                {{-- @foreach ($vehicleTarget as $vehicle)
                                <tr>
                                    <td>{{$vehicle->vehicle_number}}</td>
                                    <td>{{$vehicle->beat_number}}</td>
                                    <td>{{$vehicle->garbage_volumne}}</td>
                                </tr>
                                @endforeach --}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div> --}}
</x-admin.layout>
