<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#8a1fef">
    <title>Sedang Offline</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-sm w-full bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm">
        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#8a1fef]/10 text-[#8a1fef] flex items-center justify-center font-bold text-lg">
            !
        </div>
        <h1 class="text-lg font-semibold text-slate-900">Koneksi Terputus</h1>
        <p class="text-sm text-slate-500 mt-1">
            Internet lo sedang tidak aktif. Hubungkan kembali untuk memuat data terbaru.
        </p>
        <button type="button" onclick="window.location.reload()"
            class="mt-5 w-full py-2.5 px-4 rounded-xl bg-[#8a1fef] hover:bg-[#7314cf] text-white text-sm font-medium transition">
            Coba Lagi
        </button>
    </div>
</body>
</html>