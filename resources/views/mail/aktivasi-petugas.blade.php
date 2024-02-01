<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .header {
            padding-bottom: 20px;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 10px 0;
            color: #555;
        }

        .footer {
            padding-top: 20px;
        }

        .footer p {
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h2>Aktivasi Email Petugas</h2>
        </div>

        <div class="invoice-details">
            <p><strong>Dear </strong> </p>
            <p>Silakan gunakan token berikut untuk aktivasi email Petugas anda :</p>
        </div>

        <p style="width: 750px;
height: 51px;
flex-shrink: 0; background: #EAECF5;"><span
                style="color: #000;
font-family: Poppins;
font-size: 20px;
font-style: normal;
font-weight: 600;
line-height: 28px; /* 140% */">50029</span>
        </p>


        <div class="footer">
            <p>Jangan berikan token ini kepada siapa pun dan pastikan untuk memgatur ulang kata sandi anda segera. Token
                ini hanya berlaku untuk jangka waktu tertentu.!</p>
        </div>
        <button
            style="width: 247px;
height: 55px;
flex-shrink: 0;border-radius: 5px;
background: #2E90FA;    border: none; color: #fff;
cursor: pointer;">Aktivasi
            Sekarang</button>
    </div>

</body>

</html>
