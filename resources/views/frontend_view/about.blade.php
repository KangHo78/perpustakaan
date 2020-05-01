@extends('layouts_frontend._main')

@section('content')
<section class="premium-section spad">
    <div class="container">
        <div class="section-title">
            <h2>About</h2>
        </div>
        <section class="songs-details-section">
            <div class="container-fluid">
                <div class="song-details-box">
                    <h3>Tujuan</h3>
                    <p class="mb-3">
                        Dengan dibuatnya perpustakaan dryas berbasis laravel ini untuk menempuh mata kuliah
                        <strong>Pengembangan Teknologi Web</strong> yang dibimbing oleh Bapak <strong>Hermanto,
                            S.Kom.,M.MT.,ITIL.,COBIT,SFC</strong>. Dengan spesifikasi perangkat lunak:
                        <ul>
                            <li><strong>DBMS:</strong><span>PostGreSQL</span></li>
                            <li><strong>Visual Canvas:</strong><span>Creately</span></li>
                            <li><strong>Web UI Mockup Tools:</strong><span>Protopie</span></li>
                        </ul>
                    </p>
                </div>
                <div class="song-details-box">
                    <h3>Ketentuan</h3>
                    <p class="text-justify">
                        Perpustakaan universitas XYZ adalah sebuah perpustakaan yang cukup besar yang mempunyai
                        kurang-lebih 10.000 anggota, 100.000 judul buku dengan total koleksi sebanyak 250.000 (secara
                        rata-rata terdapat 2,5 salinan per buku). Setiap saat, sekitar 10 persen dari total koleksi
                        tersebut
                        sedang dalam status dipinjam. Para pustakawan berusaha untuk menjamin agar buku-buku yang
                        yang ingin dipinjam oleh para anggotanya tersedia pada saat para anggotanya akan meminjam
                        buku-buku tersebut. Selain itu, pada setiap saat para pustakawan harus mengetahui secara pasti
                        berapa jumlah salinan dari setiap buku yang dikoleksi oleh perpustakaan dan berapa jumlah yang
                        sedang berstatus dipinjam. Sebuah katalog dari semua buku yang dikoleksi tersedia secara
                        online. Katalog ini menyajikan daftar buku yang terdiri dari pengarang, judul, dan area
                        subyeknya. Untuk setiap judul buku, deskripsi dari buku yang dapat terdiri satu kalimat hingga
                        beberapa halaman, dicatat dalam katalog. Pustakawan yang menangani bagian referensi
                        menginginkan untuk dapat mengakses deskripsi tersebut pada saat terdapat permintaan informasi
                        mengenai buku dari para anggotanya. Staf perpustakaan terdiri dari kepala perpustakaan,
                        pustakawan yang diasosiakan dengan jurusan , pustakawan referensi, staf untuk pemimjaman,
                        dan asisten pustakawan.</p>
                    <p class="text-justify">
                        Sebuah buku dapat dipinjam paling lama selama 21 hari. Pada setiap saat,
                        setiap anggota perpustakaan hanya diperbolehkan meminjam lima buah buku. Para anggota
                        perpustakaan
                        biasanya mengembalikan buku-buku yang dipinjam dalam waktu tiga hingga empat minggu.
                        Sebagian besar anggota mengetahui bahwa mereka mempunyai tenggang waktu selama satu
                        minggu sebelum peringatan dikirim kepada mereka, sehingga mereka mencoba untuk
                        mengembalikan buku-buku yang dipinjam sebelum tenggang waktu berakhir. Sekitar 5 persen
                        dari anggota harus dikirimi peringatan untuk mengembalikan buku. Sebagian besar buku-buku
                        yang habis masa waktu pinjamnya dikembalikan dalam kurun waktu satu bulan setelah batas
                        waktu pengembalian. Kurang lebih 5 persen dari buku-buku yang waktu pinjamnya sudah
                        terlampaui tidak pernah dikembalikan. Kategori anggota perpustakaan paling aktif diberikan
                        kepada mereka yang melakukan peminjaman buku sekurang-kurangnya 10 kali dalam setahun.
                        Satu persent anggota teratas melakukan peminjaman sebanyak 15 persen, dan 10 persen anggota
                        teratas melakukan peminjaman sebanyak 40 persen. Sekitar 20 persen anggota termasuk anggota
                        tidak aktif, yaitu anggota yang tidak pernah melakukan peimjaman.</p>
                    <p class="text-justify">
                        Untuk menjadi seorang anggota perpustakaan, pelamar harus mengisi sebuah borang yang berisi
                        nomor registrasi mahasiswa, alamat kampus dan alamat tetap, dan beberapa nomor telpon.
                        Pustakawan memberikan kartu anggota yang nomornya dapat dibaca otomatis oleh mesin dan
                        disertai dengan pasfoto. Kartu anggota tersebut berlaku untuk empat tahun. Ssatu bulan
                        sebelum
                        masa berlaku kartu habis, peringatan dikirim kepada anggota untuk melakukan perpanjangan.
                        Para dosen universitas dimasukkan sebagai anggota secara otomatis. Untuk ini, jika ada dosen
                        baru yang bergabung di universitas, informasi dari dosen baru tersebut diambilkan dari basis
                        data dosen dan kartu anggota perpustakaan dikirim ke alamat kampus yang bersangkutan. Para
                        dosen
                        diperbolehkan untuk melakukan melakukan peminjaman buku selama tiga bulan dan diberukan
                        waktu tenggang selama dua minggu. Peringatan mengenai perpanjangan buku yang dipinjam
                        oleh para dosen dikirim ke alamat kampus mereka. Perpustakaan tidak meminjamkan beberapa
                        buku khusus, seperti buku-buku rereferensi, buku-buku dengan kategori langka, dan peta. Para
                        pustakawan harus dapat membedakan buku-buku yang diperbolahkan dipinjam dan buku-buku
                        yang tidak dipebolehkan dipinjam. Selain itu, para pustakawan memiliki satu daftar beberapa
                        buku yang menarik untuk dimiliki oleh perpustakaan tetapi tidak dapat memperolehnya, seperti
                        buku-buku langka dan buku-buku yang dinyatakan hilang atau rusak tetapi belum diganti. Para
                        pustakawan harus difasilitasi sebuah sistem yang dapat mecatat buku-buku yang tidak
                        diperbolehkan dipinjam dan buku-buku yang perlu diadakan. Oleh karena beberapa buku dapat
                        memiliki judul yang sama, maka judul buku tidak dapat digunakan sebagai alat identifikasi.
                        Setiao buku diidentifikasi berdasarkan International Standard Book Number (ISBN) yang
                        merupakan kode internasional yang unik untuk setiap buku yang didaftarkan pada lembaga
                        pemberi ISBN. Dua buah buku dengan judul yang sama daoat mempunyai ISBN yang berbeda
                        jika keduanya ditulis dalam bahasa yang berbeda atau jika keduanya memiliki sampul yang
                        berbeda (hardcover atau softcover). Setiap edisi dari buku yang sama memiliki ISBN yang
                        berbeda. Sistem basis data yang akan dikembangkan harus didesain untuk dapat mencatat
                        mengenai anggota perpustakaan, semua buku yang dikoleksi, katalog, dan aktivitas peminjaman
                        buku.</p>
                </div>
            </div>
        </section>
    </div>
</section>
@endsection