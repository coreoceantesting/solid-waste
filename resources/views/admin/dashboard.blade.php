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
                        <th>Location</th>
                         <th>Required Plant Capacity</th>
                        <th>Whether Part Of Integrated (Y/N)</th>
                        <th>Integrated With Plant ID</th>
                        <th>WTC</th>
                        <th>RDF</th>
                        <th>Integrated with C & T</th>
                        <th>Arrangement if Integrated</th>
                        <th>Property Number</th>
                        <th>Plant View</th>
                        <th>Machinery View</th>
                        <th>Project Code</th>
                        <th>Project Cost</th>
                        <th>Project Progress</th>
                        <th>Asset Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectionCenters as $collection)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $collection->p_name }}</td>
                            <td>{{ $collection->p_cat }}</td>
                            <td>{{ \Carbon\Carbon::parse($collection->d_of_op)->format('d-m-Y') }}</td>
                            <td>{{ $collection->decentral }}</td>
                            <td>{{ $collection->p_own }}</td>
                            <td>{{ $collection->location }}</td>
                             <td>{{ $collection->p_capacity }}</td>
                            <td>{{ $collection->inte_with_plant }}</td>
                            <td>{{ $collection->inte_with_id }}</td>
                            <td>{{ $collection->wtc }}</td>
                            <td>{{ $collection->rdf }}</td>
                            <td>{{ $collection->inte_c_t }}</td>
                            <td>{{ $collection->Arrangement }}</td>
                            <td>{{ $collection->pro_num }}</td>
                            <td>{{ $collection->p_view }}</td>
                            <td>{{ $collection->m_view }}</td>
                            <td>{{ $collection->p_code }}</td>
                            <td>{{ $collection->p_cost }}</td>
                            <td>{{ $collection->p_prog }}</td>
                            <td>{{ $collection->a_code }}</td>
                            <td>
                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit CollectionCenter" data-id="{{ $collection->id }}">
                                    <i data-feather="edit"></i>
                                </button>
                                <button class="btn text-danger rem-element px-2 py-1" title="Delete CollectionCenter" data-id="{{ $collection->id }}">
                                    <i data-feather="trash-2"></i>
                                </button>
                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $collection->id }}" data-bs-toggle="modal" data-bs-target=".collectionModel">
                                    <i data-feather="eye"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}

    {{-- <style>
        /* Apply dark borders to table and its cells */
        .table-bordered {
            border: 2px solid #343a40; /* Dark border color for the table */
            width: 50%; /* Set table width to 50% */
            height: auto; /* Set height to auto to fit content */
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #343a40; /* Dark border for table headers and cells */
            padding: 2px 4px; /* Reduced padding to make cells more compact */
            font-size: 0.875rem; /* Smaller font size */
            height: 25px; /* Reduced height for th and td */
        }

        /* Set light purple background color for table headers (th) */
        .table-bordered th {
            background-color: #8c68cd; /* Light purple color for headers */
            color: white; /* White text for contrast */
        }

        /* Optional: Adding dark border to the card surrounding the table */
        .card {
            border: 2px solid #343a40;
        }

        /* Optional: Card header styles */
        .card-header {
            background-color: #343a40;
            color: white;
        }

        /* Optional: Hover effect for table rows */
        .table-bordered tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Optional: Reduce row height for more compact layout */
        .table-bordered tbody tr {
            height: 25px; /* Reduced row height */
        }

        /* Optional: Compact the table in small screens */
        @media (max-width: 768px) {
            .table-bordered th, .table-bordered td {
                padding: 3px 6px; /* Even smaller padding on mobile */
                font-size: 0.75rem; /* Smaller font on mobile */
            }
        }
    </style> --}}


<style>element.style {
    overflow: hidden;
}</style>
    @push('scripts')
    @endpush
</x-admin.layout>
