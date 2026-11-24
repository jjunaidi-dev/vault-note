<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-[#f3f4f6] flex items-center justify-center p-4 md:p-6">

    <!-- Main Container Card -->
    <div
        class="relative w-full max-w-5xl bg-white rounded-[32px] shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 p-4 md:p-6 gap-6">

        <!-- Subtle Purple Glow Top Right -->
        <div class="pointer-events-none absolute -top-24 -right-24 w-72 h-72 bg-purple-400/20 rounded-full blur-3xl">
        </div>

        <!-- Left Column: Image Tag Container -->
        <div class="hidden lg:block lg:col-span-6">
            <div class="w-full h-full min-h-[560px] rounded-[28px] overflow-hidden bg-[#5561f5]">
                <!-- Ganti atribut src dengan path gambar desain kamu -->
                <img src="{{ asset('simplify.webp') }}" alt="Login Banner" class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Right Column: Login Form -->
        <div class="lg:col-span-6 flex flex-col justify-center px-4 sm:px-10 py-8 relative z-10">

            <!-- Brand Logo -->
            <div class="flex items-center justify-center gap-2.5 mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <span class="text-xl font-bold text-[#5e17eb] tracking-tight">Vault Note</span>
            </div>

            <!-- Heading -->
            <div class="text-center mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Get Started</h1>
                <p class="text-sm text-gray-400">Please Login to your account</p>
            </div>

            <!-- Form -->
            @if ($errors->any())
                <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.register.post') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Input -->
                <div>
                    <input type="email" name="email" placeholder="Email" required
                        class="w-full px-5 py-4 rounded-2xl bg-[#f3f4f6] text-gray-800 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#5561f5]/50 focus:bg-white transition">
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <input type="password" id="passwordInput" name="password" placeholder="Password" required
                        class="w-full px-5 py-4 rounded-2xl bg-[#f3f4f6] text-gray-800 placeholder-gray-400 text-sm focus:outline-none focus:ring-2 focus:ring-[#5561f5]/50 focus:bg-white transition pr-12">
                    <button type="button" onclick="togglePassword()"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                        aria-label="Toggle Password Visibility">
                        <!-- Eye Off Icon -->
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </button>
                </div>

                <!-- Forgot Password Link -->
                <div class="flex justify-end pt-1 pb-2">
                    <a href="#" class="text-xs font-medium text-gray-400 hover:text-[#5561f5] transition">
                        Forgot Password
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-4 rounded-2xl bg-[#5e17eb] hover:bg-[#4651e0] text-white font-semibold text-sm shadow-lg shadow-[#5561f5]/30 transition duration-200">
                    Register
                </button>
            </form>

            <!-- Register Link -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-400">
                    Already have an account?
                    <a href="/admin/register" class="font-semibold text-[#5e17eb] hover:text-[#4651e0] transition">
                        Login
                    </a>
                </p>
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('passwordInput');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
            }
        }
    </script>
</body>

</html>