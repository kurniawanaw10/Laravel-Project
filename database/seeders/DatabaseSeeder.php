<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wisata;
use App\Models\DataMobil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_user' => 'Admin',
            'alamat' => 'Jl. Arrahmah 3, Windan, Gumpang',
            'nomor_hp' => '081568446569',
            'email' => 'adminpalingserius@gmail.com',
            'password' => bcrypt('admin123'),
            'is_admin' => '1',
        ]);

        Wisata::create([
            'judul' => 'Solo Safari',
            'deskripsi' => '
            Wisata Solo Safari, yang terletak di Kota Solo, Jawa Tengah, adalah destinasi wisata yang menawarkan pengalaman safari di tengah kota. Pengunjung dapat menjelajahi keindahan satwa liar dari seluruh dunia dalam suasana yang aman dan terkontrol. Taman ini menampilkan berbagai macam hewan, mulai dari singa, harimau, dan cheetah hingga jerapah, zebra, dan kuda nil. Pengunjung dapat mengelilingi area dengan menggunakan kendaraan safari, melihat hewan berinteraksi dalam habitat alami mereka.
            Selain kendaraan safari, Solo Safari juga menawarkan kegiatan interaktif dengan hewan-hewan tertentu. Pengunjung dapat memberi makan hewan jinak seperti kelinci, kambing, dan burung-burung kecil. Ada pula pemandu yang akan memberikan informasi tentang flora dan fauna di taman ini, menjelaskan kebiasaan hidup dan karakteristik unik dari masing-masing spesies.
            Selain pengalaman bersama satwa liar, Solo Safari memiliki fasilitas tambahan seperti restoran, area bermain anak-anak, dan toko suvenir. Pengunjung dapat bersantai, menikmati makanan lezat, atau membeli oleh-oleh sebagai kenang-kenangan dari kunjungan mereka.
            Wisata Solo Safari adalah tempat ideal untuk menghabiskan waktu bersama keluarga, teman, atau bahkan dalam perjalanan solo. Dengan keanekaragaman satwa liar yang menakjubkan, pengaturan yang aman, dan berbagai kegiatan menarik, tempat ini memberikan pengalaman safari yang tak terlupakan bagi para pengunjung.',
            'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.0947608958395!2d110.85602197439013!3d-7.564646992449364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1700f747eb7f%3A0x7c093b150e757def!2sSolo%20Safari!5e0!3m2!1sen!2sid!4v1686636800070!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);

        Wisata::create([
            'judul' => 'Karimun Jawa',
            'deskripsi' => 'Wisata Karimun Jawa, terletak di Laut Jawa, adalah surga tropis yang menawarkan pesona alam yang memesona. Dengan pantai berpasir putih, air laut yang jernih, dan kehidupan bawah laut yang kaya, pulau-pulau di Karimun Jawa memikat para pengunjung dengan keindahan alamnya. Terdapat puluhan pulau di kawasan ini, yang membuat pengunjung dapat menjelajahi dan menikmati keindahan setiap sudutnya.
            Salah satu daya tarik utama Karimun Jawa adalah kegiatan snorkeling dan menyelam. Dengan terumbu karang yang masih terjaga dan keberagaman hayati laut yang menakjubkan, pengunjung dapat menemukan keajaiban bawah laut yang memukau. Terumbu karang yang indah dipenuhi dengan ikan berwarna-warni dan spesies laut lainnya yang memikat mata. Aktivitas snorkeling dan menyelam di Karimun Jawa akan membawa pengalaman yang tak terlupakan bagi para penyelam dan penggemar kehidupan laut.
            Selain kegiatan bawah laut, Karimun Jawa juga menawarkan keindahan pantai yang mempesona. Pantai-pantai seperti Pantai Tanjung Gelam dan Pantai Ujung Gelam menawarkan pemandangan yang spektakuler dengan pasir putih lembut dan air laut yang tenang. Pengunjung dapat bersantai di tepi pantai, berjemur di bawah sinar matahari, atau bermain air dengan ombak yang menyegarkan. Pemandangan matahari terbenam di Karimun Jawa juga sangat memukau dan menjadi momen yang tidak boleh dilewatkan.
            Karimun Jawa juga memiliki kekayaan alam lainnya, seperti hutan mangrove yang menakjubkan. Pengunjung dapat menjelajahi ekosistem hutan mangrove yang kaya akan keanekaragaman hayati, melihat burung-burung yang unik, dan menikmati keindahan alam yang alami. Pulau-pulau di sekitar Karimun Jawa juga menawarkan fasilitas akomodasi yang nyaman, restoran, dan tempat wisata lainnya yang dapat membuat kunjungan Anda semakin menyenangkan.
            Wisata Karimun Jawa adalah destinasi yang sempurna bagi pecinta alam dan penggemar kehidupan bawah laut. Dengan pantai yang mempesona, terumbu karang yang spektakuler, dan kekayaan alam yang melimpah, Karimun Jawa akan memberikan pengalaman liburan yang luar biasa dan tak terlupakan.',
            'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127013.93939899039!2d110.37042788287114!3d-5.829436627333245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e73ce192ccd0b69%3A0x28f5b92d9c1af25e!2sKarimun%20Jawa%20island!5e0!3m2!1sen!2sid!4v1686638185921!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);

        Wisata::create([
            'judul' => 'Gunung Bromo',
            'deskripsi' => 'Wisata Gunung Bromo adalah salah satu tempat wisata di indonesia yang menjadi favorit bagi wisatawan baik dalam negeri maupun luar negeri. Gunung Bromo terletak di Kabupaten Probolinggo. Gunung Bromo memiliki ketinggian sekitar 2392 mdpl. Memiliki kawah yang menjadi objek utama yang sering dikunjungi oleh wisatawan asing maupun lokal. Untuk sampai di bibir kawah, para wisatawan harus menaiki tangga yang cukup panjang. Gunung Bromo juga di kenal dengan sunrise dan sunsetnya. Tidak hanya pemandangan matahari terbit saja yang menjadi daya tarik utama Gunung Bromo, namun ada banyak sekali tempat wisata di sekitar Gunung Bromo yang jarang di explore oleh wisatawan.',
            'lokasi' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.777450357484!2d112.94986347398083!3d-8.021869380067026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd63f365f69c945%3A0x36aec022815992c9!2sBromo%20Tengger%20Semeru%20National%20Park!5e0!3m2!1sen!2sid!4v1686638306542!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
        ]);
    }
}
