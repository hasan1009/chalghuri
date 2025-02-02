<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Asset List</title>
    <style type="text/css">
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-bottom: 2px solid #ddd;
        }

        .header img {
            max-height: 100px;
            margin-right: 20px;
        }

        .header .title {
            flex: 1;
            text-align: left;
        }

        .header h1 {
            font-size: 28px;
            margin: 0;
            color: #2c3e50;
            font-weight: bold;
        }

        .header h4 {
            font-size: 18px;
            margin: 5px 0;
            color: #34495e;
        }

        .header h5 {
            font-size: 16px;
            margin: 5px 0;
            color: #7f8c8d;
        }

        .table-container {
            margin-top: 30px;
            padding: 0 20px;
        }

        .table-bg {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
            text-align: center;
        }

        .table-bg th,
        .table-bg td {
            border: 1px solid #000;
            padding: 8px;
        }

        .table-bg th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        @media print {
            @page {
                margin: 5mm;
            }

            body {
                margin: 0;
            }

            .header img {
                max-height: 80px;
            }

            .table-bg th,
            .table-bg td {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <div class="title">
            <h1>Chalghuri Eco-Tourism</h1>
            <h4>Asset Report</h4>
        </div>
        <img src="https://app.chalghuri.com/upload/AppCG_Logo120x399.png" alt="Chalghuri Logo">
    </div>

    <!-- Table Section -->
    <div class="table-container">
        <table class="table-bg">
            @php
                $total = 0;
            @endphp

            <thead>
                <tr>
                    <th>SL</th>
                    <th>Asset Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Puchase Date</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($getRecord as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->description }}</td>
                        <td>{{ $value->quantity }}</td>
                        <td>{{ $value->unit }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->purchase_date)) }}
                        <td>{{ $value->unit_price }}</td>
                        @php
                            $totalPrice = $value->unit_price * $value->quantity;
                            $total += $totalPrice;
                        @endphp
                        <td>{{ number_format($totalPrice, 2) }} BDT</td>

                        </td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="7" style="text-align: left;">Total Price</th>
                    <th colspan="1" style="text-align: center;">{{ number_format($total, 2) }} Taka</th>

                </tr>
            </tfoot>
        </table>
        <div style="text-align: center; font-size: 18px; margin-top: 20px;">
            <div style="float: right; width: 300px;">
                <p>_______________________</p>
                <p style="font-weight: bold;">Authorized Signature</p>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
