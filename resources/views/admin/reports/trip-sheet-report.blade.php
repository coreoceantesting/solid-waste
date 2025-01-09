<x-admin.layout>
  <x-slot name="title">Trip Sheet</x-slot>
  <x-slot name="heading">Trip Sheet</x-slot>
  <div class="row" id="addContainer">
    <div class="col-sm-12">
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
                                <th>Exit Weight</th>
                                <th>Total Garbage</th>
                                <th>Driver Name</th>
                                <th>Weight Slip Number</th>
                                <th>File Upload</th>
                                <th>Waste Segregated</th>
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
                            <td>{{$trip->exit_weight}}</td>
                            <td>{{$trip->total_garbage}}</td>
                            <td>{{$trip->driver_name}}</td>
                            <td>{{$trip->weight_slip_number}}</td>
                            <td>{{$trip->file_upload}}</td>
                            <td>{{$trip->waste_segregated}}</td>
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
