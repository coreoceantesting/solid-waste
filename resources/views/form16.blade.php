<x-admin.layout>
    <x-slot name="title">Gross Salary Details</x-slot>
    <x-slot name="heading">Gross Salary Details</x-slot>

    <!-- Add Form -->
    <div class="row" id="addContainer">
        <div class="col-sm-12">
            <div class="card">
                <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Gross Salary Details</h4>
                        </div>
                        <div class="card-body">
                            <form class="theme-form" name="addForm" id="addForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <!-- Salary as per sec 17(1) -->
                                    <div class="col-md-5 mb-3">
                                        <label class="col-form-label" for="salary_sec_17_1">(a)	Salary as per provisions contained in sec. 17(1)</label>
                                        <input class="form-control" id="salary_sec_17_1" name="salary_sec_17_1" type="text" placeholder="Enter Salary as per sec. 17(1)">
                                        <span class="text-danger is-invalid salary_sec_17_1_err"></span>
                                    </div>

                                    <!-- Value of perquisites u/s 17(2) -->
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label" for="value_perquisites">(b)Value of perquisites u/s 17(2) (as per Form No.12BA, wherever applicable)</label>
                                        <input class="form-control" id="value_perquisites" name="value_perquisites" type="text" placeholder="Enter Value of perquisites">
                                        <span class="text-danger is-invalid value_perquisites_err"></span>
                                    </div>

                                    <!-- Profits in lieu of salary under section 17(3) -->
                                    <div class="col-md-7 mb-3">
                                        <label class="col-form-label" for="profits_in_lieu">(c)	Profits in lieu of salary under section 17(3)(as per Form No.12BA, wherever applicable)</label>
                                        <input class="form-control" id="profits_in_lieu" name="profits_in_lieu" type="text" placeholder="Enter Profits in lieu of salary">
                                        <span class="text-danger is-invalid profits_in_lieu_err"></span>
                                    </div>
                                </div>
                            <!-- Total Salary -->
                            <div class="col-md-3">
                                <label class="col-form-label" for="total_salary">Total </label>
                                <input class="form-control" id="total_salary" name="total_salary" type="text" placeholder="Enter Total Salary">
                                <span class="text-danger is-invalid total_salary_err"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Less Allowance to the extent exempt u/s 10 -->
                    <div class="card-header">
                        <h4 class="card-title">Less Allowance to the extent exempt u/s 10</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Allowance">Allowance</label>
                                <input class="form-control" id="Allowance" name="Allowance" type="text" placeholder="Allowance">
                                <span class="text-danger is-invalid Allowance_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Rupees">Rupees</label>
                                <input class="form-control" id="Rupees" name="Rupees" type="text" placeholder="Enter Rupees">
                                <span class="text-danger is-invalid Rupees_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Balance">Balance</label>
                                <input class="form-control" id="Balance" name="Balance" type="text" placeholder="Enter Balance">
                                <span class="text-danger is-invalid Balance_err"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Deductions -->
                    <div class="card-header">
                        <h4 class="card-title">Deductions</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Entertainment allowance">(a)Entertainment allowance</label>
                                <input class="form-control" id="Entertainment allowance" name="Entertainment allowance" type="text" placeholder=" Enter Entertainment allowance">
                                <span class="text-danger is-invalid Entertainment allowance_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Tax on employment">(b)Tax on employment</label>
                                <input class="form-control" id="Tax on employment" name="Tax on employment" type="text" placeholder="Enter Tax on employment">
                                <span class="text-danger is-invalid Tax on employment_err"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Aggregate -->
                    <div class="card-header">
                        <h4 class="card-title">Aggregate</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Aggregate(a)">Aggregate(a)</label>
                                <input class="form-control" id="Aggregate(a)" name="Aggregate(a)" type="text" placeholder=" Enter Aggregate(a)">
                                <span class="text-danger is-invalid Aggregate(a)_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Aggregate(b)">Aggregate(b)</label>
                                <input class="form-control" id="Aggregate(b)" name="Aggregate(b)" type="text" placeholder="Enter Aggregate(b)">
                                <span class="text-danger is-invalid Aggregate(b)_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Income chargeable</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-5">
                                <label class="col-form-label" for="Income chargeable under the head ‘Salaries’ (3-5)">Income chargeable under the head ‘Salaries’ (3-5)</label>
                                <input class="form-control" id="Income chargeable under the head ‘Salaries’ (3-5)" name="Income chargeable under the head ‘Salaries’ (3-5)" type="text" placeholder=" Enter Income chargeable under the head ‘Salaries’ (3-5)">
                                <span class="text-danger is-invalid Income chargeable under the head ‘Salaries’ (3-5)_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Income reported by the employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Income">Income</label>
                                <input class="form-control" id="Income" name="Income" type="text" placeholder=" Enter Income">
                                <span class="text-danger is-invalid Income_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Rupees">Rupees</label>
                                <input class="form-control" id="Rupees" name="Rupees" type="text" placeholder=" Rupees">
                                <span class="text-danger is-invalid Rupees_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Gross total income</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross total income (6+7)">Gross total income (6+7)</label>
                                <input class="form-control" id="Gross total income (6+7)" name="Gross total income (6+7)" type="text" placeholder=" Enter Gross total income (6+7)">
                                <span class="text-danger is-invalid Gross total income (6+7)_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Deductions under Chapter VI-A</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            {{-- <div class="col-md-3">
                                <label class="col-form-label" for="sections 80C, 80CCC and 80CCD">(A)sections 80C, 80CCC and 80CCD</label>
                                <input class="form-control" id="sections 80C, 80CCC and 80CCD" name="sections 80C, 80CCC and 80CCD" type="text" placeholder=" Enter sections 80C, 80CCC and 80CCD">
                                <span class="text-danger is-invalid sections 80C, 80CCC and 80CCD_err"></span>
                            </div> --}}
                            {{-- <div class="col-md-3">
                                <label class="col-form-label" for="section 80C">(a) section 80C</label>
                                <input class="form-control" id="section 80C" name="section 80C" type="text" placeholder="Enter section 80C">
                                <span class="text-danger is-invalid section 80C_err"></span>
                            </div> --}}
                            <div class="col-md-3">
                                <label class="col-form-label" for="section 80CCC">(b) section 80CCC</label>
                                <input class="form-control" id="section 80CCC" name="section 80CCC" type="text" placeholder="Enter section 80CCC">
                                <span class="text-danger is-invalid section 80CCC_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="section 80CCD">(c) section 80CCD</label>
                                <input class="form-control" id="section 80CCD" name="section 80CCD" type="text" placeholder="Enter section 80CCD">
                                <span class="text-danger is-invalid section 80CCD_err"></span>
                            </div>
                        </div>
                        <b><p>Note:- Aggregate amount deductible under sections 80C, 80CCC and 80CCD(1) shall not exceed one lakh rupees.</p><b>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">section 80C</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="G.P.F + G.I.S + D.C.P.S">(i) G.P.F + G.I.S + D.C.P.S</label>
                                <input class="form-control" id="G.P.F + G.I.S + D.C.P.S" name="(i)G.P.F + G.I.S + D.C.P.S" type="text" placeholder=" Enter G.P.F + G.I.S + D.C.P.S">
                                <span class="text-danger is-invalid G.P.F + G.I.S + D.C.P.S_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="LIC">(ii) LIC</label>
                                <input class="form-control" id="LIC" name="LIC" type="text" placeholder="Enter LIC">
                                <span class="text-danger is-invalid LIC_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="P.P.F">(iii) P.P.F</label>
                                <input class="form-control" id="P.P.F" name="P.P.F" type="text" placeholder="Enter P.P.F">
                                <span class="text-danger is-invalid P.P.F_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="P.L.I ">(iv) P.L.I <span class="text-danger">*</span></label>
                                <input class="form-control" id="P.L.I " name="P.L.I " type="text" placeholder="Enter P.L.I ">
                                <span class="text-danger is-invalid P.L.I_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Principal Amount (H.S.G Loan)"> (v) Principal Amount (H.S.G Loan)</label>
                                <input class="form-control" id="Principal Amount (H.S.G Loan)" name="Principal Amount (H.S.G Loan)" type="text" placeholder="Enter Principal Amount (H.S.G Loan)">
                                <span class="text-danger is-invalid Principal Amount (H.S.G Loan)_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Tuition Fees">(vi)Tuition Fees</label>
                                <input class="form-control" id="Tuition Fees" name="Tuition Fees" type="text" placeholder="Enter Tuition Fees">
                                <span class="text-danger is-invalid Tuition Fees_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Other sections (e.g. 80E, 80G, 80TTA, etc.) under Chapter VI-A.</h4>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section A</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section B</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section C</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section D</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section E</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h4 class="card-title">Section F</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Gross amount">Gross amount</label>
                                <input class="form-control" id="Gross amount" name="Gross amount" type="text" placeholder=" Enter Gross amount">
                                <span class="text-danger is-invalid Gross amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Qualifying amount">Qualifying amount</label>
                                <input class="form-control" id="Qualifying amount" name="Qualifying amount" type="text" placeholder="Enter Qualifying amount">
                                <span class="text-danger is-invalid Qualifying amount_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="Deductible amount">Deductible amount</label>
                                <input class="form-control" id="Deductible amount" name="Deductible amount" type="text" placeholder="Enter Deductible amount">
                                <span class="text-danger is-invalid Deductible amount_err"></span>
                            </div>
                        </div>
                    </div>

                             {{-- <div class="col-md-3">
                                <label class="col-form-label" for="sections 80E">sections 80E</label>
                                <input class="form-control" id="sections 80E" name="sections 80E" type="text" placeholder=" Enter sections 80E">
                                <span class="text-danger is-invalid sections 80E_err"></span>
                            </div>
                            <div class="col-md-3">
                                <label class="col-form-label" for="section 80G">section 80G</label>
                                <input class="form-control" id="section 80C" name="section 80C" type="text" placeholder="Enter section 80C">
                                <span class="text-danger is-invalid section 80C_err"></span>
                            </div>
                             <div class="col-md-3">
                                <label class="col-form-label" for="section 80TTA">section 80TTA</label>
                                <input class="form-control" id="section 80TTA" name="section 80TTA" type="text" placeholder="Enter section 80TTA">
                                <span class="text-danger is-invalid section 80TTA_err"></span> --}}

                    <div class="card-header">
                        <h4 class="card-title">Aggregate of deductible amount under Chapter VI-A</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-5">
                                <label class="col-form-label" for="Aggregate of deductible amount under Chapter VI-A">Aggregate of deductible amount under Chapter VI-A</label>
                                <input class="form-control" id="Aggregate of deductible amount under Chapter VI-A" name="Aggregate of deductible amount under Chapter VI-A" type="text" placeholder=" Enter Aggregate of deductible amount under Chapter VI-A">
                                <span class="text-danger is-invalid Aggregate of deductible amount under Chapter VI-A_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title">Total Income</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Total Income (8-10)">Total Income (8-10)</label>
                                <input class="form-control" id="Total Income (8-10)" name="Total Income (8-10)" type="text" placeholder=" Enter Total Income (8-10)">
                                <span class="text-danger is-invalid Total Income (8-10)_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title">Tax on total income</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Tax on total income">Tax on total income</label>
                                <input class="form-control" id="Tax on total income" name="Tax on total income" type="text" placeholder=" Enter Tax on total income">
                                <span class="text-danger is-invalid Tax on total income_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title">Education cess @ 3% (on tax computed at S. No.12)</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-5">
                                <label class="col-form-label" for="Education cess @ 3% (on tax computed at S. No.12)">Education cess @ 3% (on tax computed at S. No.12)</label>
                                <input class="form-control" id="Education cess @ 3% (on tax computed at S. No.12)" name="Education cess @ 3% (on tax computed at S. No.12)" type="text" placeholder=" Enter Education cess @ 3% (on tax computed at S. No.12)">
                                <span class="text-danger is-invalid Education cess @ 3% (on tax computed at S. No.12)_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title"> Tax Payable (12+13)</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Tax Payable (12+13)">Tax Payable (12+13)</label>
                                <input class="form-control" id="Tax Payable (12+13)" name="Tax Payable (12+13)" type="text" placeholder=" Enter Tax Payable (12+13)">
                                <span class="text-danger is-invalid Tax Payable (12+13)_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title"> Relief under section 89 (attach details)</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Relief under section 89 (attach details)"> Relief under section 89 (attach details)</label>
                                <input class="form-control" id="Relief under section 89 (attach details)" name="Relief under section 89 (attach details)" type="text" placeholder=" Enter  Relief under section 89 (attach details)">
                                <span class="text-danger is-invalid Relief under section 89 (attach details)_err"></span>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <h4 class="card-title"> Tax payable (14-15)</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-md-3">
                                <label class="col-form-label" for="Tax payable (14-15)">Tax payable (14-15)<span class="text-danger">*</span></label>
                                <input class="form-control" id="Tax payable (14-15)" name="Tax payable (14-15)" type="text" placeholder=" Enter Tax payable (14-15)">
                                <span class="text-danger is-invalid Tax payable (14-15)_err"></span>
                            </div>
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
</x-admin.layout>
