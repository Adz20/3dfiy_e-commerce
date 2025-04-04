<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profil Pembeli</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 flex items-center justify-center h-screen">
    <div class="bg-blue-600 text-white p-8 rounded-lg shadow-lg w-96">
        <h1 class="text-2xl font-bold mb-4">PROFILE PEMBELI</h1>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Username:</label>
            <input type="text" value="{{ $username }}" class="w-full p-2 rounded bg-gray-200 text-gray-800" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email:</label>
            <input type="email" value="{{ $email }}" class="w-full p-2 rounded bg-gray-200 text-gray-800" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Nomor Telepon:</label>
            <input type="text" value="{{ $phone }}" class="w-full p-2 rounded bg-gray-200 text-gray-800" readonly>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Kata Sandi:</label>
            <input type="password" value="{{ $password }}" class="w-full p-2 rounded bg-gray-200 text-gray-800" readonly>
        </div>
        <form action="{{ url('/logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-white text-blue-600 font-bold py-2 px-4 rounded w-full">Logout</button>
        </form>
    </div>
</body>
</html>
