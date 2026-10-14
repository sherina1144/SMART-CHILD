
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Smart Child</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
        }

        .login-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05),
                        0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        .alert-success {
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .alert-success.hide {
            opacity: 0;
            transform: translateY(-10px);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen bg-slate-50">

    <div class="w-full max-w-md p-8 bg-white rounded-2xl login-card border border-slate-100">

        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-slate-800">
                Selamat Datang 👋
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Silakan masuk ke akun Smart Child Anda
            </p>
        </div>

        {{-- Notifikasi sukses registrasi --}}
        @if (session('success'))
            <div id="success-alert"
                class="alert-success mb-4 p-4 text-sm text-green-800 bg-green-100 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error / gagal login --}}
        @if ($errors->any())
            <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Login --}}
        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 text-sm border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="nama@email.com">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full px-4 py-3 text-sm border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="••••••••">
            </div>

            <button
                type="submit"
                class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-xl transition duration-200 shadow-lg shadow-indigo-100">
                Masuk
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-slate-500">
                Belum punya akun?
                <a href="{{ route('register') }}"
                    class="text-indigo-600 font-semibold hover:underline">
                    Daftar di sini
                </a>
            </p>
        </div>

        <div class="text-center mt-6">
            <p class="text-xs text-slate-400">
                Smart Child System &copy; 2026
            </p>
        </div>

    </div>

    {{-- Notifikasi hilang otomatis setelah 5 detik --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const alert = document.getElementById('success-alert');

            if (alert) {
                setTimeout(function () {
                    alert.classList.add('hide');

                    setTimeout(function () {
                        alert.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>

</body>

</html>
