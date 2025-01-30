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
                        <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Date</th>
                                    <th>Waste Type</th>
                                    <th>Waste Sub Type1</th>
                                    <th>Waste Sub Type2</th>
                                    <th>Volume in Kg</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($WasteDetails as $Waste)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$Waste->date}}</td>
                                        <td>{{$Waste->waste_type}}</td>
                                        <td>{{$Waste->waste_sub_type1}}</td>
                                        <td>{{$Waste->waste_sub_type2}}</td>
                                        <td>{{$Waste->volume}}</td>
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
