<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Codes</title>
    <style>
        @font-face {
            font-family: 'Bank Gothic Light Regular';
            src: url('{{ asset('storage/fonts/bank gothic medium bt.ttf') }}') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            padding: 50px 10px;
            text-align: center;
            font-family: 'Segoe UI', 'Trebuchet MS', Georgia, 'Times New Roman', Times, serif;
            font-weight: 300;
        }

        .qr-container {
            display: flex;
            flex-wrap: flex-wrap;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .qr-code {
            display: inline-block;
            text-align: center;
            padding: 5px;
            border: 1px dotted grey;
            margin: 5px;

        }
    </style>
</head>

<body>
    <div class="qr-container">
        @foreach ($data as $item)
            <div class="qr-code">
                <!-- <p style="font-family: 'Bank Gothic', sans-serif;">INCO</p> -->
                <p style="font-family: 'Bank Gothic', sans-serif;">
                    {{ $type == 'single_point' ? 'INCO1' : 'INCO2' }}
                </p>
                <!--<img src="{{ public_path('storage/' . $item['image_path']) }}" alt="QR Code"-->
                <!--    style="width: 56.69px; height: 56.69px;">-->
                <img src="file://{{ $item['image_path'] }}" alt="QR Code" style="width: 56.69px; height: 56.69px;">

            </div>
        @endforeach
    </div>
</body>

</html>