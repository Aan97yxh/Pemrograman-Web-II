<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model 
{
    public function getProfilData()
    {
        return [
            'nama'        => 'M. Anshary',
            'nim'         => '2410817310008', 
            'prodi'       => 'Teknologi Informasi',
            'fakultas'    => 'Fakultas Teknik',
            'universitas' => 'Universitas Lambung Mangkurat',
            'keahlian'    => [
                'Web Development' => ['PHP (CodeIgniter 4, Native, Laravel & Blade)', 'HTML', 'CSS (Tailwind CSS)'],
                'Mobile & Desktop App Development' => ['Java', 'JavaFX', 'UI/UX Mobile Design Concept'],
                'Backend & Manajemen Sistem' => ['MySQL', 'SQLYog', 'Message Broker (RabbitMQ)', 'Network Analysis (Wireshark)'],
                'DevOps & Alat Pengembangan' => ['GitHub', 'Docker', 'VS Code', 'Android Studio'],
                'Keamanan Siber' => ['Kriptografi Dasar', 'Forensics']
            ],
            'projek'      => [
                [
                    'judul'     => 'Sistem Pencarian & Manajemen Kos',
                    'deskripsi' => 'Aplikasi berbasis web yang dirancang untuk mempermudah pencarian kamar kos di Banjarmasin sekaligus pengelolaan kamar kos bagi pemilik kos secara digital.'
                ]
            ],
            'organisasi'  => [
                [
                    'peran'     => 'Bendahara & Ketua Pelaksana',
                    'instansi'  => 'Himpunan Mahasiswa Teknologi Informasi',
                    'deskripsi' => 'Aktif mengelola manajemen keuangan internal organisasi serta memimpin pelaksanaan program kerja sosial, termasuk menjadi volunteer ke panti asuhan pada agenda Ramadhan Bersama TI.'
                ]
            ],
            'hobi'        => ['Catur', 'Digital Gaming'],
            'bahasa'      => 'Bahasa Indonesia (Native), Bahasa Inggris (Basic Technical Reading)'
        ];
    }
}