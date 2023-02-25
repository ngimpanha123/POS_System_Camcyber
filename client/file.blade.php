<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS API</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 2em;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgb(111, 111, 111);
        }

        .d-flex {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .d-flex h2 {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <h2>File API</h2>
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
    </div>
</body>

</html>