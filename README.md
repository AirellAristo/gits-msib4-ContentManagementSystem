<h2>Data Diri</h2>
<p>Nama : Airell Aristo Subagia</p>
<p>Projek Akhir : PWL-PresensiKu</p>
<br>

<h2>Cara Penggunaan :</h2>
<h3>Inisiasi awal :</h3>
<ol> 
    <li>Clone repo ini terlebih dahulu</li>
    <li>Run composer install</li>
    <li>Run cp .env.example .env (Tolong disesuaikan sesuai dengan database kamu)</li>
    <p>Ket: Tambahkan FILESYSTEM_DISK="public" pada .env (JIKA BELUM ADA SAJA !)</p>
    <li>Run php artisan key:generate</li>
    <li>Run php artisan migrate:fresh</li>
    <li>Run php artisan storage:link</li>
    <p>Ket: Digunakan untuk link folder penyimpanan gambar (/storage/app/public) ke folder public agar dapat diakses</p>
    <li>Run php artisan serve</li>
</ol>
