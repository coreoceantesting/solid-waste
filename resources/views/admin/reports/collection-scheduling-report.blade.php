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
                                        <th>Schedule From</th>
                                        <th>Schedule To</th>
                                        <th>recurrence</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($collections as $collection)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $collection->vehicle_type }}</td>
                                        <td>{{ $collection->vehicle_number }}</td>
                                        <td>{{ $collection->schedule_form }}</td>
                                        <td>{{ $collection->schedule_to }}</td>
                                        <td>{{ $collection->recurrence }}</td>
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
