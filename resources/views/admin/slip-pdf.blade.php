<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shipping Slip</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .slip-wrapper {
            width: 100%;
            border: 2px solid #000;
            border-radius: 16px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .slip-table td {
            vertical-align: top;
            padding: 10px;
        }

        .left-col {
            width: 50%;
            border-right: 2px solid #000;
        }

        .right-col {
            width: 50%;
        }

        .section-title {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .ship-to {
            background: #000;
            color: #fff;
            display: inline-block;
            padding: 6px 14px;
            border-radius: 4px;
        }

        .content {
            font-size: 13px;
            line-height: 1.6;
        }

        .middle-table {
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            margin-top: 15px;
        }

        .label {
            font-weight: bold;
            width: 40%;
        }

        .value {
            width: 60%;
        }
    </style>
</head>

<body>

<div class="slip-wrapper">

    <!-- ROW 1 -->
    <table class="slip-table">
        <tr>
            <td class="left-col">
                <div class="section-title ship-to">SHIP TO</div>

                <div class="content">
                    <strong>{{ $redeem->user->name }}</strong><br>
                    {!! nl2br(e(preg_replace('/[,|]/', "\n", $redeem->address))) !!}<br>
                    Phone: {{ $redeem->user->phone ?? '-' }}
                </div>
            </td>

            <td class="right-col">
                <div class="section-title">FROM</div>

                <div class="content">
                    <strong>Inco-Inducomponents</strong><br>
                    Plot No:20,<br>
                    SIDCO Industrial Park,<br>
                    Muchukunnu, Koyilandy,<br>
                    Kerala - 673307<br>
                    Phone: 0496 2690033<br>
                    Mobile: 9207193005, 9656193005<br>
                    Email: inducomponentsinco@gmail.com
                </div>
            </td>
        </tr>
    </table>

    <!-- ROW 2 -->
    <table class="slip-table middle-table">
        <tr>
            <td class="left-col">
                <table>
                    <tr>
                        <td class="label">ITEM:</td>
                        <td class="value">{{ $redeem->product->product_info ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">SHIPPING DATE:</td>
                        <td class="value">
                            {{ $redeem->shipping_date
                                ? \Carbon\Carbon::parse($redeem->shipping_date)->format('d-m-Y')
                                : now()->format('d-m-Y')
                            }}
                        </td>
                    </tr>
                </table>
            </td>

            <td class="right-col">
                <strong>REMARKS:</strong><br>
                {{ $redeem->remarks ?? '-' }}
            </td>
        </tr>
    </table>

</div>

</body>
</html>
