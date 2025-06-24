<!DOCTYPE html>
<html>
<head>
    <title>Test Gambar Rumah Sakit</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
            margin-top: 50px;
            background-color: #f0f8ff;
        }
        h1 {
            color: #006989;
        }
        img {
            max-width: 600px;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <h1>Gambar Rumah Sakit dari Folder Public</h1>
    <img src="{{ asset('images/hospital.jpg') }}" alt="Rumah Sakit">
    <p style="margin-top: 20px;">Jika gambar muncul, berarti setup kamu sudah benar!</p>
</body>
</html>
