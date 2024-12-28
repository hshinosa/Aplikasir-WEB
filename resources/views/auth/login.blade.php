<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="flex w-full h-screen">
        <!-- Sisi Kiri (Ilustrasi) -->
        <div class="w-2/3 bg-blue-100 flex items-center justify-center">
            <img src="{{ asset('public/img/login/splashart.png') }}" alt="Ilustrasi Login" class="w-2/3">
        </div>
        <!-- Sisi Kanan (Form Login) -->
        <div class="w-1/3 flex items-center justify-center bg-white">
            <div class="w-3/4">
                <h2 class="text-2xl font-semibold text-gray-800 text-center">Masuk Admin</h2>
                <p class="text-gray-600 text-center mt-2">Masuk sebagai admin untuk melanjutkan</p>
                <form action="{{ route('login') }}" method="POST" class="mt-6">
                    @csrf
                    <!-- Input Username -->
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                        <input type="text" id="username" name="username" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <!-- Input Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                    <!-- Input Role (Hidden) -->
                    <input type="hidden" name="role" value="admin">
                    
                    <!-- Tombol Submit -->
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mt-4">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
