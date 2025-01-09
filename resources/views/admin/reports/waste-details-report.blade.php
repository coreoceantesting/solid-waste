<x-admin.layout>
    <x-slot name="title">Waste Details</x-slot>
    <x-slot name="heading">Waste Details</x-slot>

    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Waste Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="button-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Collection Center</th>
                                    <th>Inspector Name</th>
                                    <th>Total Garbage Collected</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($waste as $wast)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$wast->collection_center}}</td>
                                        <td>{{$wast->inspector_name}}</td>
                                        <td>{{$wast->total_garbage_collected}}</td>
                                        <td>{{$wast->date}}</td>
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
