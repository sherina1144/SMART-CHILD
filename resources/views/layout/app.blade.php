<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartChild</title>
    
    <!-- INI KUNCI UTAMA CSS MUNCUL: Memanggil Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('layout.header')

    <!-- Konten Halaman akan masuk di sini -->
    @yield('content')

    @include('layout.footer')

</body>
</html>