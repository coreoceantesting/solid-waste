<x-admin.layout>
    <x-slot name="title">Collection Center</x-slot>
    <x-slot name="heading">Collection Center</x-slot>
    {{-- <x-slot name="subheading">Test</x-slot> --}}

            <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
                                    <select class="form-control" name="p_cat" id="plant_category" >
                                        <option value="" >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                    <span class="text-danger is-invalid p_cat_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="date_of_operation">Date of Operation<span class="text-danger">*</span></label>
                                    <input class="form-control" id="date_of_operation" name="d_of_op" type="date">
                                    <span class="text-danger is-invalid d_of_op_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="decentralize">Decentralize<span class="text-danger">*</span></label>
                                    <select class="form-control" name="decentral" id="decentralize">
                                        <option value=""  >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                    <span class="text-danger is-invalid decentral_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="plant_ownership">Plant Ownership<span class="text-danger">*</span></label>
                                    <select class="form-control" name="p_own" id="plant_ownership">
                                        <option value=""  >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                    <span class="text-danger is-invalid p_own_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="location">Location<span class="text-danger">*</span></label>
                                    <select class="form-control" name="location" id="location">
                                        <option value="" >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
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
                                    <select class="form-control" name="inte_with_plant" id="whether_part_of_integrated_y_n">
                                        <option value="" >Select Plant Category</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_with_plant_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="integrated_with_plant_id">Integrated With Plant ID<span class="text-danger">*</span></label>
                                    <select class="form-control" name="inte_with_id" id="integrated_with_plant_id">
                                        <option value="" >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_with_id_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="is_rdf_also_wtc_y_n">Is RDF Also WTC (Y/N)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="wtc" id="is_rdf_also_wtc_y_n">
                                        <option value="" >Select Is RDF Also WTC (Y/N)</option>
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
                                    <label class="col-form-label" for="its_integrated_with_C_T_y_n">Its Integrated With C T (Y/N)<span class="text-danger">*</span></label>
                                    <select class="form-control" name="inte_c_t" id="its_integrated_with_C_T(y/n)">
                                        <option value="" >Select Plant Category</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span class="text-danger is-invalid inte_c_t_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="arrangement_if_integrated">Arrangement if Integrated<span class="text-danger">*</span></label>
                                    <select class="form-control" name="Arrangement" id="Arrangement_if_integrated">
                                        <option value="" >Select Plant Category</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
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
                                    <input class="form-control" id="plant_view" name="p_view" type="file" placeholder="Enter Plant View">
                                    <span class="text-danger is-invalid p_view_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="machinery_view">Machinery View<span class="text-danger">*</span></label>
                                    <input class="form-control" id="machinery_view" name="m_view" type="file" placeholder="Enter Machinery View">
                                    <span class="text-danger is-invalid m_view_err"></span>
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
                                    <input class="form-control" id="p_code" name="p_code" type="number" placeholder="Enter Project Code">
                                    <span class="text-danger is-invalid p_code_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="project_cost">Project cost(In rs)<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_cost" name="p_cost" type="number" placeholder="Enter Project cost(In rs)">
                                    <span class="text-danger is-invalid p_cost_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="project_progress">project progress<span class="text-danger">*</span></label>
                                    <input class="form-control" id="p_prog" name="p_prog" type="number" placeholder="Enter project progress">
                                    <span class="text-danger is-invalid p_prog_err"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label" for="Assest_code">Assest code<span class="text-danger">*</span></label>
                                    <input class="form-control" id="a_code" name="a_code" type="number" placeholder="Enter Assest code">
                                    <span class="text-danger is-invalid a_code_err"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Buttons -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" onclick="closeForm()">Cancel</button>
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
                                        <select name="p_cat" id="plant_category" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
                                        </select>
                                        <span class="text-danger is-invalid p_cat_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="date_of_operation">Date of operation<span class="text-danger">*</span></label>
                                        <input class="form-control" id="date_of_operation" name="d_of_op" type="date" placeholder="Enter Date of operation">
                                        <span class="text-danger is-invalid d_of_op_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="decentralize">Decentralize<span class="text-danger">*</span></label>
                                        <select name="decentral" id="decentralize" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
                                        </select>
                                        <span class="text-danger is-invalid decentral_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="plant_ownership">Plant Ownership<span class="text-danger">*</span></label>
                                        <select name="p_own" id="plant_ownership" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
                                        </select>
                                        <span class="text-danger is-invalid p_own_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="location">Location<span class="text-danger">*</span></label>
                                        <select name="location" id="location" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
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
                                        <select name="inte_with_plant" id="whether_part_of_integrated" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_with_plant_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="integrated_with_plant_id">Integrated With Plant ID<span class="text-danger">*</span></label>
                                        <select name="inte_with_id" id="integrated_with_plant_id" class="form-control">
                                            <option value="">Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_with_id_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="is_rdf_also_wtc">Is RDF Also WTC (Y/N)<span class="text-danger">*</span></label>
                                        <select name="wtc" id="is_rdf_also_wtc" class="form-control">
                                            <option value="" >Select Plant Category</option>
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
                                        <label class="col-form-label" for="its_integrated_with_C_T">Its Integrated With C T (Y/N)<span class="text-danger">*</span></label>
                                        <select name="inte_c_t" id="its_integrated_with_C_T(y/n)" class="form-control">
                                            <option value="" >Select Plant Category</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        <span class="text-danger is-invalid inte_c_t_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="Arrangement_if_integrated">Arrangement If Integrated<span class="text-danger">*</span></label>
                                        <select name="Arrangement" id="Arrangement_if_integrated" class="form-control">
                                            <option value="">Select Plant Category</option>
                                            <option value="X">X</option>
                                            <option value="Y">Y</option>
                                            <option value="Z">Z</option>
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
                                        <input class="form-control" id="plant_view" name="p_view" type="file" placeholder="Enter Plant View">
                                        <a id="xyz" href="">view doc</a>
                                        <span class="text-danger is-invalid p_view_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="machinery_view">Machinery View<span class="text-danger">*</span></label>
                                        <input class="form-control" id="machinery_view" name="m_view" type="file" placeholder="Enter Machinery View">
                                        <a id="" href="">view doc</a>
                                        <span class="text-danger is-invalid m_view_err"></span>
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
                                        <label class="col-form-label" for="project_cost">Project cost(In rs)<span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_cost" name="p_cost" type="text" placeholder="Enter Project cost(In rs)">
                                        <span class="text-danger is-invalid p_cost_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="project_progress">project progress<span class="text-danger">*</span></label>
                                        <input class="form-control" id="p_prog" name="p_prog" type="text" placeholder="Enter project progress">
                                        <span class="text-danger is-invalid p_prog_err"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label" for="Assest_code">Assest code<span class="text-danger">*</span></label>
                                        <input class="form-control" id="a_code" name="a_code" type="text" placeholder="Enter Assest code">
                                        <span class="text-danger is-invalid a_code_err"></span>
                                    </div>
                                   </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" id="editSubmit" class="btn btn-primary">Submit</button>
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
                                        <th>SR.NO</th>
                                        <th>Plant Name</th>
                                        <th>Plant Category</th>
                                        <th>Date of operation</th>
                                        <th>Decentralize</th>
                                        <th>Plant Ownership</th>
                                        <th>location</th>
                                        <th>Required Plant Capacity</th>
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
                                        <th>assest code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collectionCenters as $collection)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $collection->p_name }}</td>
                                            <td>{{ $collection->p_cat }}</td>
                                            <td>{{ $collection->d_of_op}}</td>
                                            <td>{{ $collection->decentral}}</td>
                                            <td>{{ $collection->p_own}}</td>
                                            <td>{{ $collection->location}}</td>
                                            <td>{{ $collection->p_capacity}}</td>
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
                                            <td>{{ $collection->a_code}}</td>
                                            <td>
                                                <button class="edit-element btn text-secondary px-2 py-1" title="Edit CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="edit"></i></button>
                                                <button class="btn text-danger rem-element px-2 py-1" title="Delete CollectionCenter" data-id="{{ $collection->id }}"><i data-feather="trash-2"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>




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
        var url = "{{ route('collection-centers.edit', ":model_id") }}";

        $.ajax({
            url: url.replace(':model_id', model_id),
            type: 'GET',
            data: {
                '_token': "{{ csrf_token() }}"
            },
            success: function(data, textStatus, jqXHR) {
                editFormBehaviour();
                if (!data.error)
                {
                    console.log(data);

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
                    // $("#editForm input[name='p_view']").val(data.collectionCenters.p_view);
                    // $("#editForm input[name='m_view']").val(data.collectionCenters.m_view);
                    // $('#xyz').append(href)
                    $("#editForm input[name='p_code']").val(data.collectionCenters.p_code);
                    $("#editForm input[name='p_cost']").val(data.collectionCenters.p_cost);
                    $("#editForm input[name='p_prog']").val(data.collectionCenters.p_prog);
                    $("#editForm input[name='a_code']").val(data.collectionCenters.a_code);
                }
                else
                {
                    alert(data.error);
                }
            },
            error: function(error, jqXHR, textStatus, errorThrown) {
                alert("Some thing went wrong");
            },
        });
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
            title: "Are you sure to delete this CollectionType?",
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
