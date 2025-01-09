<x-admin.layout>
    <x-slot name="title">Vehicle Target</x-slot>
    <x-slot name="heading">Vehicle Target</x-slot>
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Vehicle Target</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="button-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Target From Date</th>
                                    <th>Target To Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$vehicle->target_from_date}}</td>
                                    <td>{{$vehicle->target_to_date}}</td>
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
