<x-admin.layout>
    <x-slot name="title">Collection Scheduling Report</x-slot>
    <x-slot name="heading">Collection Scheduling Report</x-slot>
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Collection Scheduling Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Vehical Type</th>
                                        <th>Vehical Number</th>
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
