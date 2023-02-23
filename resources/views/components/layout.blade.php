<html>
<head>
    <title>{{ $title ?? 'Stock management' }}</title>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .el-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{ $slot }}
</body>
</html>
