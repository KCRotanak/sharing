<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>

    <style>
        body {
            background-color: #F7F9FB;
        }

        .center {
            margin: auto;
            width: 60%;
            /* border: 3px solid #73AD21; */
            padding: 10px;
            display: block;
            text-align: center;
        }

        .back_btn {
            width: 150px;
            height: 40px;
            background: #1A374D;
            border-radius: 15px;
            border-width: 0;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="center"><img src="{{ asset('images/404notfound.gif') }}" alt="" style="width: 80%">
    </div>

    <div class="center">
        <a href="/">
            <button class="back_btn">
                Go back</button></a>
    </div>

</body>

</html>
