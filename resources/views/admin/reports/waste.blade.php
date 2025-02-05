<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Waste Details Summary Report</title>
    <style>
        body {
            font-family: 'freeserif', 'normal';
            padding: 0;
            margin: 0;
        }
        #header table {
            width: 100%;
        }

        #content table, #content td, #content th {
            border: 1px solid;
        }

        #content th {
            font-size: 15px;
        }

        #content table {
            width: 100%;
            border-collapse: collapse;
        }

        h1, h2, h3, h5, h6 {
            margin: 5px 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <section id="header">
        <table>
            <tr>
                <td>
                    @php
                        $logoData = file_get_contents(public_path('admin/images/PMC LOGO.png'));
                        $base64Logo = base64_encode($logoData);
                    @endphp
                    <img src="data:image/png;base64,{{ $base64Logo }}" alt="Corporation Logo" height="140" width="150">
                </td>
                <td align="center">
                    <h1>Panvel Municipal Corporation</h1>
                    <h2>Solid Waste Department</h2>
                    <h3>Waste Details Summary Report</h3>
                    <h5>
                        Form Date: {{ request()->from_date ? date('d-m-Y', strtotime(request()->from_date)) : '' }}
                        To Date: {{ request()->to_date ? date('d-m-Y', strtotime(request()->to_date)) : '' }}
                    </h5>
                </td>
                <td>
                    <p>Date : {{ date('d-m-Y') }}</p>
                    <p>Time : {{ date('h:i:s A') }}</p>
                </td>
            </tr>
        </table>
    </section>
    <hr style="border: 0; border-top: 2px solid hsl(0, 14%, 91%); margin: 20px 0;">
    <section id="content">
        {{-- <h6>{{ $VehicleSchedulingInformation->isNotEmpty() ? $VehicleSchedulingInformation->first()->department_name : 'All' }}</h6> --}}
        <table>
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Waste Type</th>
                    <th>Waste Sub Type1</th>
                    <th>Waste Sub Type2</th>
                    <th>Date</th>
                    <th>Volume in Kg</th>
                </tr>
            </thead>
            <tbody>
                @foreach($WasteDetails as $index => $Waste)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    {{-- <td align="center">{{ $tri->trip_date }}</td> --}}
                    <td align="center">{{ $Waste->waste_type }}</td>
                    <td align="center">{{ $Waste->waste_sub_type1 }}</td>
                    <td align="center">{{ $Waste->waste_sub_type2 }}</td>
                    <td align="center">{{ date('d-m-Y', strtotime($Waste->date)) }}</td>
                    <td align="center">{{ $Waste->volume }}</td>
                    {{-- <td align="center">{{ date('h:i A', strtotime($Waste->out_time)) }}</td>
                    <td align="center">{{ date('h:i A', strtotime($Waste->entry_weight)) }}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <td class="date-time">
        <p style="color: black ">Generated-by : </p>
    </td>
</body>
</html>
