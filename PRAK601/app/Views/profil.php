<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="max-w-5xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-[#2c3e50] mb-8 border-b-2 border-[#d4af37] pb-2 inline-block">Profil Saya</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Kolom Kiri: Informasi Umum -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 h-fit">
            <div class="w-32 h-32 mx-auto mb-4 overflow-hidden rounded-full border-2 border-[#d4af37] shadow-sm">
                <img src="<?= base_url('images/foto-aan.jpeg'); ?>" alt="Foto <?= $profil['nama']; ?>" class="w-full h-full object-cover">
            </div>
            <h3 class="text-xl font-bold text-center mb-1"><?= $profil['nama']; ?></h3>
            <p class="text-sm text-center text-gray-500 mb-6"><?= $profil['prodi']; ?></p>
            
            <div class="space-y-4 text-sm border-t border-gray-100 pt-4">
                <div>
                    <span class="block font-semibold text-gray-400 uppercase text-[10px]">Asal Kampus</span>
                    <span class="text-gray-700"><?= $profil['universitas']; ?></span>
                </div>
                <div>
                    <span class="block font-semibold text-gray-400 uppercase text-[10px]">Kemampuan Bahasa</span>
                    <span class="text-gray-700"><?= $profil['bahasa']; ?></span>
                </div>
                <div>
                    <span class="block font-semibold text-gray-400 uppercase text-[10px]">Minat & Hobi</span>
                    <span class="text-gray-700"><?= implode(', ', $profil['hobi']); ?></span>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Detail Portofolio -->
        <div class="md:grid-cols-1 md:col-span-2 space-y-8">
            <!-- Bagian Keahlian -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h4 class="text-lg font-bold text-[#2c3e50] mb-4 flex items-center gap-2">
                    <span class="w-2 h-4 bg-[#d4af37] rounded-sm"></span>Keahlian Teknis
                </h4>
                <div class="space-y-4">
                    <?php foreach ($profil['keahlian'] as $kategori => $tools): ?>
                        <div>
                            <span class="font-medium text-sm text-gray-700"><?= $kategori; ?></span>
                            <div class="flex flex-wrap gap-2 mt-1">
                                <?php foreach ($tools as $tool): ?>
                                    <span class="bg-[#f0f4f8] text-[#2980b9] text-xs px-2.5 py-1 rounded-md font-medium border border-[#d6e4f0]"><?= $tool; ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Bagian Pengalaman Projek -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h4 class="text-lg font-bold text-[#2c3e50] mb-4 flex items-center gap-2">
                    <span class="w-2 h-4 bg-[#2c3e50] rounded-sm"></span>Pengalaman Projek
                </h4>
                <?php foreach ($profil['projek'] as $p): ?>
                    <div class="border-l-2 border-gray-200 pl-4 py-1">
                        <h5 class="font-bold text-gray-800 text-md"><?= $p['judul']; ?></h5>
                        <p class="text-sm text-gray-600 mt-1 leading-relaxed"><?= $p['deskripsi']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Bagian Organisasi & Kegiatan -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h4 class="text-lg font-bold text-[#2c3e50] mb-4 flex items-center gap-2">
                    <span class="w-2 h-4 bg-[#27ae60] rounded-sm"></span>Organisasi & Pengalaman Sosial
                </h4>
                <?php foreach ($profil['organisasi'] as $o): ?>
                    <div>
                        <h5 class="font-bold text-gray-800 text-md"><?= $o['peran']; ?></h5>
                        <span class="text-xs text-[#27ae60] font-semibold"><?= $o['instansi']; ?></span>
                        <p class="text-sm text-gray-600 mt-1 leading-relaxed"><?= $o['deskripsi']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div> 
<?= $this->endSection(); ?>