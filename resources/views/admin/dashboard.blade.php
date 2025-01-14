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
                        <h2 class="fw-semibold text-dark">0</h2>
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


    @push('scripts')
    @endpush
</x-admin.layout>
