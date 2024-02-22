<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: "Helvetica Neue", "Arial", sans-serif;
            margin: 0;
            padding: 0;
        }

        p {
            line-height: 1.6;
            font-size: 14px;
            color: black;
        }

        .container {
            width: 85%;
            max-width: 500px;
            margin: auto;
            overflow: hidden;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        header {
            background: #2F3281;
            ;
            color: white;
            padding: 10px 10px;
            text-align: center;
        }

        section {
            width: auto;
            padding: 20px;
        }

        pre {
            text-align: center;
            background-color: #ecf0f1;
            padding: 10px;
            border-radius: 6px;
            overflow: auto;
            font-size: 25px;
            display: block;
        }

        .activation-button {
            width: 100%;
            max-width: 247px;
            height: 55px;
            border-radius: 5px;
            background: #2E90FA;
            border: none;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            text-align: center;
            line-height: 55px;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1 style="font-size: 24px; margin-bottom: 10px">Lupa Kata Sandi</h1>
        </header>
        <section>
            <p><strong>Hai {{ $name }},</strong></p>
            <p>
                Silakan klik tombol dibawah ini untuk Reset Kata Sandi anda!
            </p>
                        <a href="{{ env('APP_URL') }}/resetpassword?token={{ $token }}" class="activation-button">Buka Link</a>

        </section>
    </div>
</body>

</html>
