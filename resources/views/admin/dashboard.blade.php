<x-admin.layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="heading">Dashboard</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}
    <div class="row">
        <!-- Combined Section: Vehicle Scheduling, Contract Mapping, Waste Details -->
        <div class="col-md-4">
            <div class="card card-animate bg-success">
                <div class="card-body">
                    <h6 class="fw-medium text-dark mb-3">Vehicle Scheduling Information</h6>
                    <div class="d-flex justify-content-between">
                        <h2 class="fw-semibold text-dark">{{ $vehicalScheduleInformationCount }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-animate bg-primary">
                <div class="card-body">
                    <h6 class="fw-medium text-dark mb-3">Contract Mapping</h6>
                    <div class="d-flex justify-content-between">
                        <h2 class="fw-semibold text-dark">0</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-animate bg-danger">
                <div class="card-body">
                    <h6 class="fw-medium text-dark mb-3">Waste Details</h6>
                    <div class="d-flex justify-content-between">
                        <h2 class="fw-semibold text-dark">0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card-body">
        <div class="table-responsive">
            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                <thead>
                    <tr>
                        <th>SR.NO</th>
                        <th>Plant Name</th>
                        <th>Plant Category</th>
                        <th>Date of operation</th>
                        <th>Decentralize</th>
                        <th>Plant Ownership</th>
                        <th>location</th>
                        {{-- <th>Required Plant Capacity</th>
                        <th>Whether Part Of Integrated (Y/N)</th>
                        <th>Integrated With Plant ID</th>
                        <th>wtc</th>
                        <th>rdf</th>
                        <th>integrated with c & t</th>
                        <th>Arrangement if integrated</th>
                        <th>property number</th>
                        <th>plant view</th>
                        <th>machinery view</th>
                        <th>project code</th>
                        <th>project cost</th>
                        <th>project progress</th>
                        <th>assest code</th> --}}
                        {{-- <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectionCenters as $collection)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $collection->p_name }}</td>
                            <td>{{ $collection->p_cat }}</td> --}}
                            {{-- <td>{{ $collection->d_of_op}}</td> --}}
                            {{-- <td>{{ date('d-m-Y', strtotime($collection->d_of_op))}}</td> --}}
                            {{-- <td>{{ \Carbon\Carbon::parse($collection->d_of_op)->format('d-m-Y') }}</td>
                            <td>{{ $collection->decentral}}</td>
                            <td>{{ $collection->p_own}}</td>
                            <td>{{ $collection->location}}</td> --}}
                            {{-- <td>{{ $collection->p_capacity}}</td>
                            <td>{{ $collection->inte_with_plant}}</td>
                            <td>{{ $collection->inte_with_id}}</td>
                            <td>{{ $collection->wtc}}</td>
                            <td>{{ $collection->rdf}}</td>
                            <td>{{ $collection->inte_c_t}}</td>
                            <td>{{ $collection->Arrangement}}</td>
                            <td>{{ $collection->pro_num}}</td>
                            <td>{{ $collection->p_view}}</td>
                            <td>{{ $collection->m_view}}</td>
                            <td>{{ $collection->p_code}}</td>
                            <td>{{ $collection->p_cost}}</td>
                            <td>{{ $collection->p_prog}}</td>
                            <td>{{ $collection->a_code}}</td> --}}
                            {{-- <td>
                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="edit"></i></button>
                                <button class="btn text-danger rem-element px-2 py-1" title="Delete CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="trash-2"></i></button>
                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $collection->id }}"><i data-feather="eye"  data-id="{{ $collection->id }}"  data-bs-toggle="modal" data-bs-target=".collectionModel"></i></button>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div> --}}
<style>element.style {
    overflow: hidden;
}</style>
    @push('scripts')
    @endpush
</x-admin.layout>
