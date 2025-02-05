<x-admin.layout>
    <x-slot name="title">Trip Sheet</x-slot>
    <x-slot name="heading">Trip Sheet</x-slot>
    <form class="theme-form" id="dateForm">
      <div class="row">
          <div class="col-sm-12">
              <div class="row mb-3">
                  <div class="col-md-4">
                      <label class="col-form-label" for="from_date">From Date<span class="text-danger">*</span></label>
                      <input class="form-control" id="from_date" name="from_date" type="date"  placeholder="Enter Schedule From" onkeydown="return false;">
                      <span class="text-danger is-invalid from_date_err"></span>
                  </div>
                  <div class="col-md-4">
                      <label class="col-form-label" for="to_date">To Date<span class="text-danger">*</span></label>
                      <input class="form-control" id="to_date" name="to_date" type="date"  placeholder="Enter Schedule To" onkeydown="return false;">
                      <span class="text-danger is-invalid to_date_err"></span>
                  </div>
                  <div class="col-md-4 d-flex align-items-end">
                      <div class="d-flex gap-2 w-100">
                          <button type="button" class="btn btn-primary w-20" id="Search">Search</button>
                          <button type="button" class="btn w-20" id="download" style="background-color: rgb(26, 177, 26); color: white; border: 1px solid rgb(23, 121, 23);">
                            Download PDF
                        </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </form>

  <script>
    // Submit Form and Serialize Data to URL
    document.getElementById('Search').addEventListener('click', function(event) {
        event.preventDefault();

        // Serialize form data
        var formData = $('#dateForm').serialize();

        // Redirect with query params
        var baseUrl = window.location.origin + window.location.pathname;
        var url = baseUrl + '?' + formData; // Append query string
        window.location.href = url; // Redirect to URL
    });

    document.getElementById('download').addEventListener('click', function(event) {
        event.preventDefault();

        // Serialize form data
        var formData = $('#dateForm').serialize();

        // Generate the download URL with query params
        var downloadUrl = "{{ route('reports.trip.pdf') }}" + '?' + formData;
        window.open(downloadUrl, '_blank');
    });
</script>
{{--
    <div class="row" id="addContainer">
      <div class="col-sm-12"> --}}
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Trip Sheet</h4>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sr.No</th>
                                  <th>Trip Date</th>
                                  <th>Beat Number</th>
                                  <th>Vehicle Number</th>
                                  <th>Collection Center</th>
                                  <th>In Time</th>
                                  <th>Out Time</th>
                                  <th>Entry Weight</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($trips as $trip)
                              <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$trip->trip_date}}</td>
                              <td>{{$trip->beat_number}}</td>
                              <td>{{$trip->vehicle_number}}</td>
                              <td>{{$trip->collection_center}}</td>
                              <td>{{$trip->in_time}}</td>
                              <td>{{$trip->out_time}}</td>
                              <td>{{$trip->entry_weight}}</td>
                              </tr>
                             @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      {{-- </div>
    </div> --}}
  </x-admin.layout>
