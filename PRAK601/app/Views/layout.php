<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Portofolio'; ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#fcfbf7] text-[#2c3e50] font-sans min-h-screen flex flex-col relative overflow-x-hidden">

    <!-- GLOW EFFECT BACKGROUND -->
    <div class="fixed inset-0 z-[-1] overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-[550px] h-[550px] rounded-full bg-gradient-to-br from-[#d4af37]/40 to-[#f39c12]/25 blur-[90px]"></div>
        <div class="absolute -bottom-60 -left-40 w-[650px] h-[650px] rounded-full bg-gradient-to-tr from-[#e67e22]/25 to-[#d4af37]/40 blur-[110px]"></div>
    </div>

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 bg-[#fcfbf7]/40 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= base_url('/'); ?>" class="text-xl font-bold tracking-wider text-[#2c3e50]">M. ANSHARY</a>
            <div class="space-x-6 font-medium">
                <a href="<?= base_url('/'); ?>" class="hover:text-[#d4af37] transition-colors">Beranda</a>
                <a href="<?= base_url('home/profil'); ?>" class="hover:text-[#d4af37] transition-colors">Profil</a>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-grow z-10">
        <?= $this->renderSection('content'); ?>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-gray-100 py-6 text-center text-sm text-gray-400 bg-white/30 backdrop-blur-sm z-10">
        <p>© 2026 M. Anshary. All rights reserved.</p>
    </footer>

</body>
</html>