<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vehicle Collection Scheduling Summary Report</title>
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
                    <h3>Collection Scheduling Summary Report</h3>
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
    <hr>
    <section id="content">
        <h6>{{ $VehicleSchedulingInformation->isNotEmpty() ? $VehicleSchedulingInformation->first()->department_name : 'All' }}</h6>
        <table>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Vehicle Type</th>
                    <th>Vehicle Number</th>
                    <th>Employee Name</th>
                    <th>Schedule Date</th>
                    <th>Beat</th>
                    <th>From Time</th>
                    <th>To Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($VehicleSchedulingInformation as $index => $Vehicle)
                <tr>
                    <td align="center">{{ $index + 1 }}</td>
                    <td align="center">{{ $Vehicle->vehicle_type }}</td>
                    <td align="center">{{ $Vehicle->vehicle_number }}</td>
                    <td align="center">{{ $Vehicle->employee_name }}</td>
                    <td align="center">{{ date('d-m-Y', strtotime($Vehicle->schedule_form)) }}</td>
                    <td align="center">{{ $Vehicle->beat_number }}</td>
                    <td align="center">{{ date('h:i A', strtotime($Vehicle->in_time)) }}</td>
                    <td align="center">{{ date('h:i A', strtotime($Vehicle->out_time)) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
