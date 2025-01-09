<div class="row" id="addContainer" style="display:none;">
    <div class="col-sm-12">
        <div class="card">
            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h4 class="card-title">Add Vehicles Scheduling Information</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <div class="col-md-4">
                            <label class="col-form-label" for="vehicle_type">Vehicle Type<span class="text-danger">*</span></label>
                            {{-- <input class="form-control" id="vehicle_type" name="vehicle_type" type="text" placeholder="Enter Vehicle Type"> --}}
                                {{-- <select class="form-select" name="vehicle_type" id="vehicle_type">
                                <option value="">select vehicle type</option>
                                 @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->Vehicle_Type}}">{{$vehicle->Vehicle_Type}}</option>
                                 @endforeach
                            </select> --}}
                            <span class="text-danger is-invalid vehicle_type_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="vehicle_number">Vehicle Number<span class="text-danger">*</span></label>
                            {{-- <input class="form-control" id="vehicle_number" name="vehicle_number" type="text" placeholder="Enter Vehicle number"> --}}
                            {{-- <select class="form-select" name="vehicle_number" id="vehicle_number">
                                <option value="">select vehicle number</option>
                                 @foreach ($vehicles as $vehicle)
                                    <option value="{{$vehicle->Vehicle_number}}">{{$vehicle->Vehicle_number}}</option>
                                 @endforeach
                            </select> --}}
                            <span class="text-danger is-invalid vehicle_number_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="schedule_form">Schedule Form<span class="text-danger">*</span></label>
                            <input class="form-control" id="schedule_form" name="schedule_form" type="date" placeholder="Enter Schedule Form">
                            <span class="text-danger is-invalid schedule_form_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label" for="schedule_to">Schedule To<span class="text-danger">*</span></label>
                            <input class="form-control" id="schedule_to" name="schedule_to" type="date" placeholder="Enter schedule_to">
                            <span class="text-danger is-invalid schedule_to_err"></span>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Recurrence<span class="text-danger">*</span></label>
                            <div>
                                <select name="recurrence" class="form-select" id="recurrence">
                                    <option value="">Recurrence select</option> <!-- Default placeholder option -->
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                                <span class="text-danger is-invalid recurrence_err"></span>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2>Vehicle Information</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Beat Number</th>
                                        <th>Employee Name</th>
                                        <th>Waste Generated type</th>
                                        <th>In Time</th>
                                        <th>Out Time</th>
                                        <th>
                                            <button class="btn btn-primary btn-sm" type="button" id="addMoreVehicleButton">Add More</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="vehicleTableBody">
                                    <!-- Dynamic rows will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="addSubmit">Submit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
