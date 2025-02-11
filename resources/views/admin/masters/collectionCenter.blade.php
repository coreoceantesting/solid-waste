
<x-admin.layout>
    <x-slot name="title">Collection Center</x-slot>
    <x-slot name="heading">Collection Center</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

        <!-- Add Form -->
        <div class="row" id="addContainer" style="display:none;">
            <div class="col-sm-12">
                <div class="card">
                    <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Plant Details -->
                        <div class="card-header">
                         <h4 class="card-title">Add Plant Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="plant_name">Plant Name<span class="text-danger">*</span></label>
                                    <input class="form-control" id="plant_name" name="p_name" type="text" placeholder="Enter plant name">
                                    {{-- <select class="form-control" name="p_name" id="p_name">
                                        <option value="">select Plant Name</option>
                                         @foreach ($collectionCenters as $collection)
                                            <option value="{{$collection->id}}">{{$collection->p_name}}</option>
                                         @endforeach
                                    </select> --}}
                                    <span class="text-danger is-invalid p_name_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="plant_category">Plant Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="p_cat" id="plant_category" >
                                        <option value="" >--Select Plant Category--</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                    </select>
                                    <span class="text-danger is-invalid p_cat_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_operation">Date Of Operation<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_operation" name="d_of_op" type="date" onkeydown="return false;">
                                    <span class="text-danger is-invalid d_of_op_err"></span>
                                </div>
                                {{-- <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_operation">Date Of Operation<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_operation" name="d_of_op" type="text" onkeydown="return false;">
                                    <span class="text-danger is-invalid d_of_op_err"></span>
                                </div> --}}
                                <div class="col-md-4">
                                    <label class="col-form-label" for="decentral">Decentralize<span class="text-danger">*</span></label>
                                    <select class="form-select" name="decentral" id="decentral">
                                        <option value="" >--Select Decentralize--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid decentral_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="plant_ownership">Plant Ownership<span class="text-danger">*</span></label>
                                    <select class="form-select" name="p_own" id="plant_ownership">
                                        <option value=""  >--Select Plant Ownership--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid p_own_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location">Location<span class="text-danger">*</span></label>
                                    <select class="form-select" name="location" id="location">
                                        <option value="" >--Select Location--</option>
                                        <option value="Taloja">Taloja</option>
                                        <option value="Khargar">Khargar</option>
                                    </select>
                                    <span class="text-danger is-invalid location_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="required_plant_capacity">Required Plant Capacity<span class="text-danger">*</span></label>
                                    <input class="form-control" id="required_plant_capacity" name="p_capacity" type="text" placeholder="Enter Required Plant Capacity">
                                    <span class="text-danger is-invalid p_capacity_err"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Other Details -->
                        <div class="card-header">
                            <h4 class="card-title">Add Other Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="whether_part_of_integrated_y_n">Whether Part Of Integrated (Y/N)<span class="text-danger">*</span></label>
                                    <select class="form-select" name="inte_with_plant" id="whether_part_of_integrated_y_n">
                                        <option value="" >--Select Whether Part Of Integrated (Y/N)--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_with_plant_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="integrated_with_plant_id">Integrated With Plant ID<span class="text-danger">*</span></label>
                                    <select class="form-select" name="inte_with_id" id="integrated_with_plant_id">
                                        <option value="" >--Select Integrated With Plant ID--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_with_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_rdf_also_wtc_y_n">Is RDF Also WTC (Y/N)<span class="text-danger">*</span></label>
                                    <select class="form-select" name="wtc" id="is_rdf_also_wtc_y_n">
                                        <option value="" >--Select Is RDF Also WTC (Y/N)--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid wtc_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="quantity_of_rdf">Quantity of RDF<span class="text-danger">*</span></label>
                                    <input class="form-control" id="quantity_of_rdf" name="rdf" type="number" placeholder="Enter Quantity of RDF">
                                    <span class="text-danger is-invalid rdf_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="its_integrated_with_C_T_y_n">Its Integrated With C and T (Y/N)<span class="text-danger">*</span></label>
                                    <select class="form-select" name="inte_c_t" id="its_integrated_with_C_T(y/n)">
                                        <option value="" >--Select Integrated With C and T (Y/N)--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_c_t_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="arrangement_if_integrated">Arrangement if Integrated<span class="text-danger">*</span></label>
                                    <select class="form-select" name="Arrangement" id="Arrangement_if_integrated">
                                        <option value="" >--Select Arrangement if Integrated--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid Arrangement_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="property_number">Property Number<span class="text-danger">*</span></label>
                                    <input class="form-control" id="property_number" name="pro_num" type="text" placeholder="Enter Property Number">
                                    <span class="text-danger is-invalid pro_num_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="p_views">Plant View<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_views" name="p_views" type="file" placeholder="Enter Plant View">
                                    <span class="text-danger is-invalid p_views_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="machinery_view">Machinery View<span class="text-danger">*</span></label>
                                    <input class="form-control" id="machinery_view" name="m_views" type="file" placeholder="Enter Machinery View">
                                    <span class="text-danger is-invalid m_views_err"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="card-header">
                            <h4 class="card-title">Add Project Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col-md-4">
                                    <label class="col-form-label" for="project_code">Project Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_code" name="p_code" type="text" placeholder="Enter Project Code">
                                    <span class="text-danger is-invalid p_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="project_cost">Project Cost(In rs)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_cost" name="p_cost" type="text" placeholder="Enter Project cost">
                                    <span class="text-danger is-invalid p_cost_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="project_progress">Project Progress<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_prog" name="p_prog" type="text" placeholder="Enter project progress">
                                    <span class="text-danger is-invalid p_prog_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Assest_code">Assest Code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="a_code" name="a_code" type="text" placeholder="Enter Assest code">
                                    <span class="text-danger is-invalid a_code_err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Vehicle Details</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Type</th>
                                            <th>Available Count</th>
                                            <th>Required Count</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="addMoreVehicleButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="vehicleTableBody">
                                        <tr id="vehicleRow0">
                                            <td>
                                                <select name="vehicle_type[]" class="form-select AddFormSelectVehicleType" required>
                                                    <option value="">Select Vehicle Type</option>
                                                    @foreach($VehicleType as $Vehicle)
                                                        <option value="{{ $Vehicle->id }}">{{ $Vehicle->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="available_count[]" class="form-control" placeholder="Enter available count" required>
                                            </td>
                                            <td>
                                                <input type="number" name="required_count[]" class="form-control" placeholder="Enter required count" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm removeVehicleRow" data-id="0">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h2>Employee Details</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Designation</th>
                                            <th>Available Count</th>
                                            <th>Required Count</th>
                                            <th>
                                                <button class="btn btn-primary btn-sm" type="button" id="addMoreEmployeeButton">Add More</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="employeeTableBody">
                                        <tr id="employeeRow0">
                                            <td>
                                                <select name="designation[]" class="form-select AddFormSelectDesignation" required>
                                                    <option value="">Select Designation</option>
                                                    @foreach($Designation as $Desi)
                                                        <option value="{{ $Desi->id }}">{{ $Desi->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="emp_available_count[]" class="form-control" placeholder="Enter available count" required>
                                            </td>
                                            <td>
                                                <input type="number" name="emp_required_count[]" class="form-control" placeholder="Enter required count" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm removeEmployeeRow" data-id="0">Remove</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Form Buttons -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            {{-- <button type="button" class="btn btn-secondary" onclick="closeForm()">Cancel</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- Edit Form --}}
        <div class="row" id="editContainer" style="display:none;">
            <div class="col">
                <form class="form-horizontal form-bordered" method="post" id="editForm">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit plant details</h4>
                        </div>
                        <div class="card-body py-2">
                            <input type="hidden" id="edit_model_id" name="edit_model_id" value="">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="plant_name">Plant Name<span class="text-danger">*</span></label>
                                        <input class="form-control" id="plant_name" name="p_name" type="text" placeholder="Enter plant name">
                                        <span class="text-danger is-invalid p_name_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="plant_category">Plant Category<span class="text-danger">*</span></label>
                                        <select name="p_cat" id="plant_category" class="form-select">
                                            <option value="" >--Select Plant Category--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                        <span class="text-danger is-invalid p_cat_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="date_of_operation">Date Of Operation<span class="text-danger">*</span></label>
                                        <input class="form-control" id="date_of_operation" name="d_of_op" type="date" placeholder="Enter Date of operation" onkeydown="return false;">
                                        <span class="text-danger is-invalid d_of_op_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="decentral">Decentralize<span class="text-danger">*</span></label>
                                        <select name="decentral" id="decentral" class="form-select">
                                            <option value="" >--Select Decentralize--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid decentral_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="plant_ownership">Plant Ownership<span class="text-danger">*</span></label>
                                        <select name="p_own" id="p_own" class="form-select">
                                            <option value="" >--Select Plant Ownership--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid p_own_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="location">Location<span class="text-danger">*</span></label>
                                        <select name="location" id="location" class="form-select">
                                            <option value="" >--Select Location--</option>
                                            <option value="Taloja">Taloja</option>
                                            <option value="Khargar">Khargar</option>
                                        </select>
                                        <span class="text-danger is-invalid location_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="required_plant_capacity">Required Plant Capacity<span class="text-danger">*</span></label>
                                        <input class="form-control" id="required_plant_capacity" name="p_capacity" type="text" placeholder="Enter Required Plant Capacity">
                                        <span class="text-danger is-invalid p_capacity_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">Add Other Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="whether_part_of_integrated">Whether Part Of Integrated (Y/N)<span class="text-danger">*</span></label>
                                        <select name="inte_with_plant" id="whether_part_of_integrated" class="form-select">
                                            <option value="" >--Select Plant Category--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_with_plant_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="integrated_with_plant_id">Integrated With Plant ID<span class="text-danger">*</span></label>
                                        <select name="inte_with_id" id="integrated_with_plant_id" class="form-select">
                                            <option value="">--Select Integrated With Plant ID--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_with_id_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="is_rdf_also_wtc">Is RDF Also WTC (Y/N)<span class="text-danger">*</span></label>
                                        <select name="wtc" id="is_rdf_also_wtc" class="form-select">
                                            <option value="" >--Is RDF Also WTC (Y/N)--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid wtc_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="quantity_of_rdf">Quantity Of RDF<span class="text-danger">*</span></label>
                                        <input class="form-control" id="quantity_of_rdf" name="rdf" type="number" placeholder="Enter Quantity Of RDF">
                                        <span class="text-danger is-invalid rdf_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="its_integrated_with_C_T">Its Integrated With C and T (Y/N)<span class="text-danger">*</span></label>
                                        <select name="inte_c_t" id="its_integrated_with_C_T(y/n)" class="form-select">
                                            <option value="" >--Select Integrated With C and T (Y/N)--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_c_t_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="Arrangement_if_integrated">Arrangement If Integrated<span class="text-danger">*</span></label>
                                        <select name="Arrangement" id="Arrangement_if_integrated" class="form-select">
                                            <option value="">--Select Arrangement If Integrated--</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid Arrangement_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="property_number">Property Number<span class="text-danger">*</span></label>
                                        <input class="form-control" id="property_number" name="pro_num" type="text" placeholder="Enter Property Number">
                                        <span class="text-danger is-invalid pro_num_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="plant_view">Plant View<span class="text-danger">*</span></label>
                                        <input class="form-control" id="plant_view" name="p_views" type="file" placeholder="Enter Plant View">
                                        <a id="plantViewFile" target="_blank" title="View Document">View Doc</a>
                                        <span class="text-danger is-invalid p_views_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="machinery_view">Machinery View<span class="text-danger">*</span></label>
                                        <input class="form-control" id="machinery_view" name="m_views" type="file" placeholder="Enter Machinery View">
                                        <a id="machineryViewFile" target="_blank" title="View Document">View Doc</a>
                                        <span class="text-danger is-invalid m_views_err"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <h4 class="card-title">Add Project Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="project_code">Project Code<span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_code" name="p_code" type="text" placeholder="Enter Project Code">
                                        <span class="text-danger is-invalid p_code_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="project_cost">Project Cost(In rs)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_cost" name="p_cost" type="text" placeholder="Enter Project cost">
                                        <span class="text-danger is-invalid p_cost_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="project_progress">Project Progress<span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_prog" name="p_prog" type="text" placeholder="Enter project progress">
                                        <span class="text-danger is-invalid p_prog_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="Assest_code">Assest Code<span class="text-danger">*</span></label>
                                        <input class="form-control" id="a_code" name="a_code" type="text" placeholder="Enter Assest code">
                                        <span class="text-danger is-invalid a_code_err"></span>
                                    </div>
                                   </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Vehicle Details</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Vehicle Type</th>
                                                <th>Available Count</th>
                                                <th>Required Count</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="editMoreEditvehicleRow">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="editVehicleTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h2>Employee Details</h2>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Designation</th>
                                                <th>Available Count</th>
                                                <th>Required Count</th>
                                                <th>
                                                    <button class="btn btn-primary btn-sm" type="button" id="editMoreEditemployeeRow">Add More</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="editEmployeeTableBody">
                                            <!-- Dynamic rows will be appended here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="editSubmit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="">
                                    <button id="addToTable" class="btn btn-primary">Add <i class="fa fa-plus"></i></button>
                                    <button id="btnCancel" class="btn btn-danger" style="display:none;">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="buttons-datatables" class="table table-bordered nowrap align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collectionCenters as $collection)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $collection->p_name }}</td>
                                            <td>{{ $collection->p_cat }}</td>
                                            {{-- <td>{{ \Carbon\Carbon::now($collection->date_of_operation)->format('d-m-Y') }}</td> --}}
                                            <td>{{ date('d-m-Y', strtotime($collection->d_of_op))}}</td>
                                            {{-- <td>{{ \Carbon\Carbon::parse($collection->d_of_op)->format('d-m-Y') }}</td> --}}
                                            <td>{{ $collection->decentral}}</td>
                                            <td>{{ $collection->p_own}}</td>
                                            <td>{{ $collection->location}}</td>
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
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="trash-2"></i></button>
                                                <button class="btn text-danger view-element px-2 py-1" title="View vehicles" data-id="{{ $collection->id }}"><i data-feather="eye"  data-id="{{ $collection->id }}"  data-bs-toggle="modal" data-bs-target=".collectionModel"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       {{-- view model --}}
       <div class="modal fade collectionModel" tabindex="-1" role="dialog" aria-labelledby="collectionModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="collectionModelLabel">Collection Center Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body" id="stockData">

                        <!-- First Table: Main Data -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Plant Name</th>
                                        <th>Plant Category</th>
                                        <th>Date Of Operation :{{date('d-m-y')}}</th>
                                        <th>Date</th>
                                        <th>Decentralize</th>
                                        <th>Plant Ownership</th>
                                        <th>Location</th>
                                        <th>Required Plant Capacity</th>
                                        <th>Whether Part Of Integrated(Y/N)</th>
                                        <th>Integrated with Plant ID</th>
                                        <th>Is RDF Also WTC (Y/N)</th>
                                        <th>Quantity of RDF</th>
                                        <th>Its Integrated With C T (Y/N)</th>
                                        <th>Arrangement if Integrated</th>
                                        <th>Property Number</th>
                                        <th>Plant View</th>
                                        <th>Machinery View</th>
                                        <th>Project Code</th>
                                        <th>Project cost(In rs)</th>
                                        <th>Project progress</th>
                                        {{-- <th>Asset code</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="collectionModelTable">
                                    <!-- Data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Second Table: Vehicle Details -->
                        <div class="mt-4">
                            <h5 class="modal-title">Vehicle Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Vehicle Type</th>
                                        <th>Available Count</th>
                                        <th>Required Count</th>
                                    </tr>
                                </thead>
                                <tbody id="VehicleDetailsModel">
                                    <!-- Vehicle data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Third Table: Employee Details -->
                        <div class="mt-4">
                            <h5 class="modal-title">Employee Details</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Designation</th>
                                        <th>Available Count</th>
                                        <th>Required Count</th>
                                    </tr>
                                </thead>
                                <tbody id="EmployeeDetailsModel">
                                    <!-- Employee data will be injected here -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</x-admin.layout>

{{-- Add --}}
<script>
    $("#addForm").submit(function(e) {
        e.preventDefault();
        $("#addSubmit").prop('disabled', true);

        var formdata = new FormData(this);
        $.ajax({
            url: '{{ route('collection-centers.store') }}',
            type: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(data)
            {
                $("#addSubmit").prop('disabled', false);
                if (!data.error2)
                    swal("Successful!", data.success, "success")
                        .then((action) => {
                            window.location.href = '{{ route('collection-centers.index') }}';
                        });
                else
                    swal("Error!", data.error2, "error");
            },
            statusCode: {
                422: function(responseObject, textStatus, jqXHR) {
                    $("#addSubmit").prop('disabled', false);
                    resetErrors();
                    printErrMsg(responseObject.responseJSON.errors);
                },
                500: function(responseObject, textStatus, errorThrown) {
                    $("#addSubmit").prop('disabled', false);
                    swal("Error occured!", "Something went wrong please try again", "error");
                }
            }
        });

    });
</script>


<!-- Edit -->
<script>
    $("#buttons-datatables").on("click", ".edit-element", function(e) {
        e.preventDefault();
        var model_id = $(this).attr("data-id");
        var url = "{{ route('collection-centers.edit', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                console.log(data);

                if (!data.error) {
                    // Populate the form fields
                    $("#editForm input[id='edit_model_id']").val(data.collectionCenters.id);
                    $("#editForm input[name='p_name']").val(data.collectionCenters.p_name);
                    $("#editForm select[name='p_cat']").val(data.collectionCenters.p_cat);
                    $("#editForm input[name='d_of_op']").val(data.collectionCenters.d_of_op);
                    $("#editForm select[name='decentral']").val(data.collectionCenters.decentral);
                    $("#editForm select[name='p_own']").val(data.collectionCenters.p_own);
                    $("#editForm select[name='location']").val(data.collectionCenters.location);
                    $("#editForm input[name='p_capacity']").val(data.collectionCenters.p_capacity);
                    $("#editForm select[name='inte_with_plant']").val(data.collectionCenters.inte_with_plant);
                    $("#editForm select[name='inte_with_id']").val(data.collectionCenters.inte_with_id);
                    $("#editForm select[name='wtc']").val(data.collectionCenters.wtc);
                    $("#editForm input[name='rdf']").val(data.collectionCenters.rdf);
                    $("#editForm select[name='inte_c_t']").val(data.collectionCenters.inte_c_t);
                    $("#editForm select[name='Arrangement']").val(data.collectionCenters.Arrangement);
                    $("#editForm input[name='pro_num']").val(data.collectionCenters.pro_num);
                    $("#editForm input[name='p_code']").val(data.collectionCenters.p_code);
                    $("#editForm input[name='p_cost']").val(data.collectionCenters.p_cost);
                    $("#editForm input[name='p_prog']").val(data.collectionCenters.p_prog);
                    $("#editForm input[name='a_code']").val(data.collectionCenters.a_code);
                    $('#editForm #machineryViewFile').attr('href', "{{ asset('storage') }}/"+data.collectionCenters.m_view)
                    $('#editForm #plantViewFile').attr('href', "{{ asset('storage') }}/"+data.collectionCenters.p_view)

                    // Dynamically generate vehicle details rows
                    let vehicledetail = "";
                    let count = 0;
                    $.each(data.vehicleDetails, function(key, value) {
                        let vehicleTypeOptions = ''; // Variable to hold vehicle type options

                        // Loop through VehicleType data dynamically from the controller
                        @foreach($VehicleType as $Vehicle)
                        console.log(value['vehicle_type']);

                            vehicleTypeOptions+= `<option value="{{ $Vehicle->id }}" ${value['vehicle_type'] == {{ $Vehicle->id }} ? 'selected' : ''}>{{ $Vehicle->name }}</option>`;
                        @endforeach

                        // Append HTML for each row dynamically
                        vehicledetail += `
                            <tr id="editVehicleRow${key}">
                                <td>
                                    <select name="vehicle_type[]" class="form-select AddFormSelectvehicleType" required>
                                        <option value="">--Select vehicleType--</option>
                                        ${vehicleTypeOptions}
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control editAvailableCount" name="available_count[]" value="${value['available_count']}" required />
                                </td>
                                <td>
                                    <input type="number" class="form-control editRequiredCount" required name="required_count[]" value="${value['required_count']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeVehicleRow ${(count==0)?'d-none':''}" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                        count++
                    });

                    // Append the generated HTML to the vehicle table body
                    $('#editVehicleTableBody').html(vehicledetail);



                    // Dynamically generate employeedetails details rows
                    let employeedetails = "";
                    let count=0;
                    $.each(data.employeedetails, function(key, value) {
                        let designationOptions = ''; // Variable to hold vehicle type options

                        // Loop through VehicleType data dynamically from the controller
                        @foreach($Designation as $Desi)
                            designationOptions+= `<option value="{{ $Desi->id }}" ${value['designation'] == {{ $Desi->id }} ? 'selected' : ''}>{{ $Desi->name }}</option>`;
                        @endforeach


                        // Append HTML for each row dynamically
                        employeedetails += `
                            <tr id="editEmployeeRow${key}">
                                <td>
                                    <select name="designation[]" class="form-select AddFormdesignation" required>
                                        <option value="">--Select vehicleType--</option>
                                        ${designationOptions}
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control editAvailableCount" name="emp_available_count[]" value="${value['available_count']}" required />
                                </td>
                                <td>
                                    <input type="number" class="form-control editRequiredCount" required name="emp_required_count[]" value="${value['required_count']}" />
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger removeEmployeeRow ${(count==0)?'d-none':''}" data-id="${key}">Remove</button>
                                </td>
                            </tr>
                        `;
                        count++
                    });

                    console.log(employeedetails);


                    // Append the generated HTML to the vehicle table body
                    $('#editEmployeeTableBody').html(employeedetails);


                } else {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Something went wrong");
            },
        });
    });
</script>
{{-- add more vehicle details in edit --}}
{{-- <script>
    // Global counter for row IDs
    let editVehicleDetials = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreEditvehicleRow', function() {
        let value = {
            waste_type: '',      // Default empty value or dynamically populated
            available_count: '',
            required_count: '',   // Default empty value or dynamically populated   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editVehicleRow${editVehicleDetials}">
                 <td>
                        <select name="vehicle_type[]" class="form-select" required>
                            <option value="">Select Vehicle Type</option>
                            @foreach($VehicleType as $Vehicle)
                                <option value="{{ $Vehicle->id }}">{{ $Vehicle->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="available_count[]" placeholder="Available Count" required />
                    </td>
                    <td>
                        <input type="number" class="form-control" name="required_count[]" placeholder="Required Count" required />
                    </td>
                <td>
                    <button type="button" class="btn btn-danger removeVehicleRow" data-id="${editVehicleDetials}">Remove</button>
                </td>
            </tr>
        `;
        $('#editVehicleTableBody').append(html);
        editVehicleDetials++;
    });


    // Event to remove a vehicle row (fixed event binding)
    $('body').on('click', '.removeVehicleRow', function() {
        let rowId = $(this).data('id');
        $(`#editVehicleRow${rowId}`).remove();
    });
</script> --}}
<script>
    // Global counter for row IDs
    let editVehicleDetials = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreEditvehicleRow', function() {
        let value = {
            waste_type: '',      // Default empty value or dynamically populated
            available_count: '',
            required_count: '',   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editVehicleRow${editVehicleDetials}">
                 <td>
                        <select name="vehicle_type[]" class="form-select" required>
                            <option value="">--Select Vehicle Type--</option>
                            @foreach($VehicleType as $Vehicle)
                                <option value="{{ $Vehicle->id }}">{{ $Vehicle->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="available_count[]" placeholder="Available Count" required />
                    </td>
                    <td>
                        <input type="number" class="form-control" name="required_count[]" placeholder="Required Count" required />
                    </td>
                <td>
                    <button type="button" class="btn btn-danger removeVehicleRow" data-id="${editVehicleDetials}">Remove</button>
                </td>
            </tr>
        `;
        $('#editVehicleTableBody').append(html);
        editVehicleDetials++;
    });

    // Event to remove a vehicle row (fixed event binding)
    $('body').on('click', '.removeVehicleRow', function() {
        let rowId = $(this).data('id');
        const rowCount = $('#editVehicleTableBody tr').length; // Table mein total rows ka count lo

        // Ensure at least one row remains
        if (rowCount > 1) {
            $(`#editVehicleRow${rowId}`).remove(); // Corresponding row ko remove karo
        }
    });
</script>

{{-- add more Employee details in edit --}}
{{-- <script>
    // Global counter for row IDs
    let editEmployeeDetials = 100;

    // Event to add more vehicle rows (fixed event binding)
    $('body').on('click', '#editMoreEditemployeeRow', function() {
        let value = {
            designation: '',      // Default empty value or dynamically populated
            emp_available_count: '',
            emp_required_count: '',   // Default empty value or dynamically populated   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editEmployeeRow${editEmployeeDetials}">
                 <td>
                    <select name="designation[]" class="form-select AddFormSelectdesignation" required>
                        <option value="">Select Designation</option>
                        @foreach($Designation as $Desi)
                            <option value="{{ $Desi->id  }}">{{ $Desi->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control editAvailbeCount" name="emp_available_count[]" placeholder="Available Count" value="" required />
                </td>
                <td>
                    <input type="number" class="form-control editRequiredCount" name="emp_required_count[]" placeholder="Required Count" value="" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeEmployeeRow" data-id="${editEmployeeDetials}">Remove</button>
                </td>
            </tr>
        `;
        $('#editEmployeeTableBody').append(html);
        editEmployeeDetials++;
    });


    // Event to remove a vehicle row (fixed event binding)
    $('body').on('click', '.removeEmployeeRow', function() {
        let rowId = $(this).data('id');
        $(`#editEmployeeRow${rowId}`).remove();
    });
</script> --}}
<script>
    // Global counter for row IDs
    let editEmployeeDetials = 100;

    // $('#editEmployeeTableBody tr:first .removeEmployeeRow').hide();
    // Event to add more employee rows (fixed event binding)
    $('body').on('click', '#editMoreEditemployeeRow', function() {
        let value = {
            designation: '',      // Default empty value or dynamically populated
            emp_available_count: '',
            emp_required_count: '',   // Default empty value or dynamically populated
        };

        let html = `
            <tr id="editEmployeeRow${editEmployeeDetials}">
                 <td>
                    <select name="designation[]" class="form-select AddFormSelectdesignation" required>
                        <option value="">--Select Designation--</option>
                        @foreach($Designation as $Desi)
                            <option value="{{ $Desi->id  }}">{{ $Desi->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control editAvailbeCount" name="emp_available_count[]" placeholder="Available Count" value="" required />
                </td>
                <td>
                    <input type="number" class="form-control editRequiredCount" name="emp_required_count[]" placeholder="Required Count" value="" required />
                </td>
                <td>
                    <button type="button" class="btn btn-danger removeEmployeeRow" data-id="${editEmployeeDetials}">Remove</button>
                </td>
            </tr>
        `;
        $('#editEmployeeTableBody').append(html);
        editEmployeeDetials++;

        // $('#editEmployeeTableBody tr:first .removeEmployeeRow').hide();
    });

    // Event to remove a employee row (fixed event binding)
    $('body').on('click', '.removeEmployeeRow', function() {
        let rowId = $(this).data('id');
        const rowCount = $('#editEmployeeTableBody tr').length; // Get the total number of rows in the table

        // Ensure at least one row remains
        if (rowCount > 1) {
            $(`#editEmployeeRow${rowId}`).remove(); // Remove the selected row
        }

        // $('#editEmployeeTableBody tr:first .removeEmployeeRow').hide();
    });
</script>
<!-- Update -->
<script>
    $(document).ready(function() {
        $("#editForm").submit(function(e) {
            e.preventDefault();
            $("#editSubmit").prop('disabled', true);
            var formdata = new FormData(this);
            formdata.append('_method', 'PUT');
            var model_id = $('#edit_model_id').val();
            var url = "{{ route('collection-centers.update', ":model_id") }}";
            //
            $.ajax({
                url: url.replace(':model_id', model_id),
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data)
                {
                    $("#editSubmit").prop('disabled', false);
                    if (!data.error2)
                        swal("Successful!", data.success, "success")
                            .then((action) => {
                                window.location.href = '{{ route('collection-centers.index') }}';
                            });
                    else
                        swal("Error!", data.error2, "error");
                },
                statusCode: {
                    422: function(responseObject, textStatus, jqXHR) {
                        $("#editSubmit").prop('disabled', false);
                        resetErrors();
                        printErrMsg(responseObject.responseJSON.errors);
                    },
                    500: function(responseObject, textStatus, errorThrown) {
                        $("#editSubmit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
                    }
                }
            });

        });
    });
</script>


<!-- Delete -->
<script>
    $("#buttons-datatables").on("click", ".rem-element", function(e) {
        e.preventDefault();
        swal({
            title: "Are you sure to delete this Collection Center?",
            // text: "Make sure if you have filled Vendor details before proceeding further",
            icon: "info",
            buttons: ["Cancel", "Confirm"]
        })
        .then((justTransfer) =>
        {
            if (justTransfer)
            {
                var model_id = $(this).attr("data-id");
                var url = "{{ route('collection-centers.destroy', ":model_id") }}";

                $.ajax({
                    url: url.replace(':model_id', model_id),
                    type: 'POST',
                    data: {
                        '_method': "DELETE",
                        '_token': "{{ csrf_token() }}"
                    },
                    success: function(data, textStatus, jqXHR) {
                        if (!data.error && !data.error2) {
                            swal("Success!", data.success, "success")
                                .then((action) => {
                                    window.location.reload();
                                });
                        } else {
                            if (data.error) {
                                swal("Error!", data.error, "error");
                            } else {
                                swal("Error!", data.error2, "error");
                            }
                        }
                    },
                    error: function(error, jqXHR, textStatus, errorThrown) {
                        swal("Error!", "Something went wrong", "error");
                    },
                });
            }
        });
    });
</script>
{{-- Add More form for Vehicle details --}}
{{-- <script>
    $(document).ready(function () {
        let vehicleRowCount = 1; // Start counting from 1 since row 0 is already visible

        // Add More Button functionality
        $('#addMoreVehicleButton').click(function () {
            let html = `
                <tr id="vehicleRow${vehicleRowCount}">
                    <td>
                        <select name="vehicle_type[]" class="form-select AddFormSelectVehicleType" required>
                            <option value="">Select Vehicle Type</option>
                            @foreach($VehicleType as $Vehicle)
                                <option value="{{ $Vehicle->id }}">{{ $Vehicle->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="available_count[]" class="form-control" placeholder="Enter available count" required>
                    </td>
                    <td>
                        <input type="number" name="required_count[]" class="form-control" placeholder="Enter required count" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeVehicleRow" data-id="${vehicleRowCount}">Remove</button>
                    </td>
                </tr>`;

            $('#vehicleTableBody').append(html); // Append the new row to the table body
            vehicleRowCount++; // Increment the row counter for unique IDs
        });

        // Remove Row Functionality
        $(document).on('click', '.removeVehicleRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            $(`#vehicleRow${rowId}`).remove(); // Remove the corresponding row
        });
    });
</script> --}}
<script>
    $(document).ready(function () {
        let vehicleRowCount = 1; // Start counting from 1 since row 0 is already visible

        $('#vehicleTableBody tr:first .removeVehicleRow').hide();

        // Add More Button functionality
        $('#addMoreVehicleButton').click(function () {
            let html = `
                <tr id="vehicleRow${vehicleRowCount}">
                    <td>
                        <select name="vehicle_type[]" class="form-select AddFormSelectVehicleType" required>
                            <option value="">--Select Vehicle Type--</option>
                            @foreach($VehicleType as $Vehicle)
                                <option value="{{ $Vehicle->id }}">{{ $Vehicle->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="available_count[]" class="form-control" placeholder="Enter available count" required>
                    </td>
                    <td>
                        <input type="number" name="required_count[]" class="form-control" placeholder="Enter required count" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeVehicleRow" data-id="${vehicleRowCount}">Remove</button>
                    </td>
                </tr>`;


            $('#vehicleTableBody').append(html); // Append the new row to the table body
            vehicleRowCount++; // Increment the row counter for unique IDs


            $('#vehicleTableBody tr:first .removeVehicleRow').hide();

        });

        // Remove Row Functionality
        $(document).on('click', '.removeVehicleRow', function () {
            const rowId = $(this).data('id'); // Get the row ID from the button's data-id attribute
            const rowCount = $('#vehicleTableBody tr').length; // Count the total rows

            // Check if there's more than one row
            if (rowCount > 1) {
                $(`#vehicleRow${rowId}`).remove(); // Remove the corresponding row
            }

            $('#vehicleTableBody tr:first .removeVehicleRow').hide();

        });
    });
</script>
{{-- Add More form for Employee details --}}
{{-- <script>
    $(document).ready(function () {
        let employeeRowCount = 1; // Unique row IDs ke liye counter

        // "Add More" Button ka functionality
        $('#addMoreEmployeeButton').click(function () {  // Yeh har baar click hone par function execute karega
            let html = `
                <tr id="employeeRow${employeeRowCount}">
                    <td>
                        <select name="designation[]" class="form-select AddFormSelectDesignation" required>
                            <option value="">Select designation</option>
                            @foreach($Designation as $Desi)
                                <option value="{{ $Desi->id }}">{{ $Desi->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="emp_available_count[]" class="form-control" placeholder="Enter available count" required>
                    </td>
                    <td>
                        <input type="number" name="emp_required_count[]" class="form-control" placeholder="Enter required count" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeEmployeeRow" data-id="${employeeRowCount}">Remove</button>
                    </td>
                </tr>`;

            $('#employeeTableBody').append(html); // Nayi row ko table body mein append karo

            // Row counter ko increment karo
            employeeRowCount++;
        });

        // Remove Row Functionality
        $(document).on('click', '.removeEmployeeRow', function () {
            const rowId = $(this).data('id'); // Button ke data-id attribute se row ID le lo
            $(`#employeeRow${rowId}`).remove(); // Corresponding row ko remove karo
        });
    });
</script> --}}
<script>
    $(document).ready(function () {
        let employeeRowCount = 1; // Unique row IDs ke liye counter

        $('#employeeTableBody tr:first .removeEmployeeRow').hide();

        // "Add More" Button ka functionality
        $('#addMoreEmployeeButton').click(function () {
            let html = `
                <tr id="employeeRow${employeeRowCount}">
                    <td>
                        <select name="designation[]" class="form-select AddFormSelectDesignation" required>
                            <option value="">--Select designation--</option>
                            @foreach($Designation as $Desi)
                                <option value="{{ $Desi->id }}">{{ $Desi->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="emp_available_count[]" class="form-control" placeholder="Enter available count" required>
                    </td>
                    <td>
                        <input type="number" name="emp_required_count[]" class="form-control" placeholder="Enter required count" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm removeEmployeeRow" data-id="${employeeRowCount}">Remove</button>
                    </td>
                </tr>`;

            $('#employeeTableBody').append(html); // Nayi row ko table body mein append karo

            // Row counter ko increment karo
            employeeRowCount++;

            $('#employeeTableBody tr:first .removeEmployeeRow').hide();
        });

        // Remove Row Functionality
        $(document).on('click', '.removeEmployeeRow', function () {
            const rowId = $(this).data('id'); // Button ke data-id attribute se row ID le lo
            const rowCount = $('#employeeTableBody tr').length; // Table mein total rows ka count lo

            // Ensure at least one row remains
            if (rowCount > 1) {
                $(`#employeeRow${rowId}`).remove(); // Corresponding row ko remove karo
            }

           $('#employeeTableBody tr:first .removeEmployeeRow').hide();
        });
    });
</script>
{{-- views --}}
<script>
    $('body').on('click', '.view-element', function() {
        var model_id = $(this).attr("data-id");
        var url = "{{ route('collection-centers.show', ':model_id') }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                newMaterialRequest: 'new'
            },
            beforeSend: function() {
                $('#preloader').css('opacity', '0.5');
                $('#preloader').css('visibility', 'visible');
            },
            success: function(data, textStatus, jqXHR) {
                if (!data.error) {
                    // First Table HTML for Main Data
                    let mainDataHtml = `
                        <tr>
                            <td>${data.collectionCenters.p_name}</td>
                            <td>${data.collectionCenters.p_cat}</td>
                            <td> ${data.collectionCenters.d_of_op
                             ? new Date(data.collectionCenters.d_of_op).toLocaleDateString('en-GB')
                            : 'N/A'}</td>
                            <td>${data.collectionCenters.decentral}</td>
                            <td>${data.collectionCenters.p_own}</td>
                            <td>${data.collectionCenters.location}</td>
                            <td>${data.collectionCenters.p_capacity}</td>
                            <td>${data.collectionCenters.inte_with_plant}</td>
                            <td>${data.collectionCenters.inte_with_id}</td>
                            <td>${data.collectionCenters.wtc}</td>
                            <td>${data.collectionCenters.rdf}</td>
                            <td>${data.collectionCenters.inte_c_t}</td>
                            <td>${data.collectionCenters.Arrangement}</td>
                            <td>${data.collectionCenters.pro_num}</td>
                            <td><a href="{{asset('storage/')}}/${data.collectionCenters.p_view ?? 'N/A'}" target="_blank" class="view-docs">View docs</a></td>
                            <td><a href="{{asset('storage/')}}/${data.collectionCenters.m_view ?? 'N/A'}" target="_blank" class="view-docs">View docs</a></td>
                            <td>${data.collectionCenters.p_code}</td>
                            <td>${data.collectionCenters.p_cost}</td>
                            <td>${data.collectionCenters.p_prog}</td>
                            <td>${data.collectionCenters.a_code}</td>
                        </tr>
                    `;
                    $('#collectionModelTable').html(mainDataHtml);

                    // Second Table HTML for Vehicle Details
                    let vehicleDetailsHtml = '';
                    $.each(data.VehicleDetails, function(key, value) {
                        vehicleDetailsHtml += `
                            <tr>
                                <td>${value.name}</td>
                                <td>${value.available_count}</td>
                                <td>${value.required_count}</td>
                            </tr>
                        `;
                    });
                    $('#VehicleDetailsModel').html(vehicleDetailsHtml);

                    // Third Table HTML for Employee Details
                    let employeeDetailsHtml = '';
                    $.each(data.EmployeeDetails, function(key, value) {
                        employeeDetailsHtml += `
                            <tr>
                                <td>${value.name}</td>
                                <td>${value.available_count}</td>
                                <td>${value.required_count}</td>
                            </tr>
                        `;
                    });
                    $('#EmployeeDetailsModel').html(employeeDetailsHtml);
                } else {
                    swal("Error!", data.error, "error");
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                swal("Error!", "Something went wrong", "error");
            },
            complete: function() {
                $('#preloader').css('opacity', '0');
                $('#preloader').css('visibility', 'hidden');
            },
        });
    });
</script>








