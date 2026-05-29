<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="max-w-3xl mx-auto px-6 py-24 text-center">
    <p class="text-[#d4af37] font-semibold tracking-widest uppercase mb-3">Selamat Datang</p>
    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#2c3e50] mb-4">
        Hai, Saya <?= $profil['nama']; ?>
    </h1>
    <p class="text-xl text-gray-600 mb-2">NIM. <?= $profil['nim']; ?></p>
    <p class="text-md text-gray-500 italic mb-8"><?= $profil['prodi']; ?> • <?= $profil['universitas']; ?></p>
    
    <div class="flex justify-center gap-4">
        <a href="<?= base_url('home/profil'); ?>" class="bg-[#2c3e50] text-white px-6 py-3 rounded-lg shadow-sm hover:bg-[#1a252f] transition-all font-medium">
            Lihat Profil Lengkap
        </a>
    </div>
</div>
<?= $this->endSection(); ?>