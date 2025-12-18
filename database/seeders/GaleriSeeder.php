<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Gotong Royong Pembersihan Sungai Desa',
                'deskripsi' => 'Kegiatan gotong royong membersihkan sungai yang melintasi desa dari sampah dan tumbuhan liar. Diikuti oleh seluruh warga dari berbagai RT/RW dengan semangat kebersamaan.',
                'foto' => 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Panen Raya Padi di Sawah Desa',
                'deskripsi' => 'Momen panen raya padi yang dilakukan secara tradisional dengan sistem gotong royong. Hasil panen tahun ini sangat memuaskan berkat cuaca yang mendukung dan perawatan yang baik.',
                'foto' => 'https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Festival Budaya Tradisional Desa',
                'deskripsi' => 'Penampilan tari tradisional oleh anak-anak desa dalam acara festival budaya tahunan. Menampilkan kekayaan budaya lokal yang dilestarikan dari generasi ke generasi.',
                'foto' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Pembangunan Jembatan Penghubung Antar Dusun',
                'deskripsi' => 'Proses pembangunan jembatan baru yang menghubungkan dua dusun di desa. Pembangunan ini merupakan hasil swadaya masyarakat dengan bantuan pemerintah daerah.',
                'foto' => 'https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Pelatihan Kerajinan Tangan untuk Ibu-Ibu PKK',
                'deskripsi' => 'Kegiatan pelatihan membuat kerajinan tangan dari bahan daur ulang. Bertujuan untuk meningkatkan keterampilan dan membuka peluang usaha bagi ibu-ibu di desa.',
                'foto' => 'https://images.unsplash.com/photo-1452860606245-08befc0ff44b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Posyandu Balita dan Lansia',
                'deskripsi' => 'Kegiatan rutin posyandu untuk pemeriksaan kesehatan balita dan lansia. Dilaksanakan setiap bulan dengan bantuan tenaga medis dari puskesmas terdekat.',
                'foto' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Pasar Tani Produk Lokal Desa',
                'deskripsi' => 'Pasar tani yang menjual berbagai produk hasil pertanian dan kerajinan lokal desa. Menjadi wadah untuk memasarkan produk warga dan menarik wisatawan.',
                'foto' => 'https://images.unsplash.com/photo-1488459716781-31db52582fe9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Penanaman Pohon di Area Konservasi',
                'deskripsi' => 'Program penanaman pohon untuk menjaga kelestarian lingkungan dan mencegah erosi. Melibatkan seluruh elemen masyarakat termasuk anak-anak sekolah.',
                'foto' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Upacara Bendera 17 Agustus di Lapangan Desa',
                'deskripsi' => 'Upacara memperingati Hari Kemerdekaan Indonesia yang dihadiri seluruh warga desa. Dilanjutkan dengan berbagai lomba tradisional dan hiburan rakyat.',
                'foto' => 'https://images.unsplash.com/photo-1587474260584-136574528ed5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Kelas Komputer untuk Remaja Desa',
                'deskripsi' => 'Program pelatihan komputer dan internet untuk remaja desa agar tidak tertinggal dengan perkembangan teknologi. Diadakan di balai desa dengan instruktur sukarelawan.',
                'foto' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Renovasi Masjid Desa Gotong Royong',
                'deskripsi' => 'Kegiatan renovasi masjid desa yang dilakukan secara gotong royong oleh seluruh warga. Renovasi meliputi perbaikan atap, pengecatan, dan penambahan fasilitas.',
                'foto' => 'https://images.unsplash.com/photo-1564769625905-50e93615e769?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'judul' => 'Lomba Masak Tradisional Antar RT',
                'deskripsi' => 'Kompetisi memasak makanan tradisional antar RT dalam rangka memeriahkan hari besar nasional. Menampilkan kreativitas dan kelezatan masakan khas daerah.',
                'foto' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($galeris as $galeri) {
            Galeri::create($galeri);
        }
    }
}