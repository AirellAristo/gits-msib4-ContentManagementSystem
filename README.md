<h2>Data Diri</h2>
<p>Nama : Airell Aristo Subagia</p>
<p>Asal Universitas : Universitas Kristen Duta Wacana</p>
<p>Tugas : Tugas 6 - Content Management System</p>
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

<h3>Login Page :</h3>
<ol>
    <li>Dikarenekan database baru saja di migrate sehingga bersih tanpa noda, silahkan registrasikan diri kamu terlebih dahulu</li>
    <li>Jika sudah,silahkan masukkan data yang telah kamu registrasikan tadi</li>
    <p>Ket: page selain login tidak dapat diakses jika kamu tidak login, dikarenakan menggunakan middleware('auth'). Yang dimana kamu harus login terlebih dahulu agar  dapat menjalankan page web yang tersedia</p>
</ol>
<br>

<h3>CRUD Produk</h3>
<hr>
<h4>Alur Pembuatan Produk :</h4>
<ol>
     <li>Tambahkan Kategori</li>
     <p>Ket : link berada pada dropdown menu di sebelah kanan dengan tulisan "Tambah Kategori"</p>
     <li>Masukkan Nama Kategori (Perlu diingat agar tidak memasukkan nama kategori yang sama karena sudah menggunakan validasi unique untuk setiap inputan)</li>
     <p>Ket : Perlu diingat agar tidak memasukkan nama kategori yang sama karena sudah menggunakan validasi unique untuk setiap inputan</p>
     <li>Tambahkan Produk</li>
     <p>Ket : link berada pada dropdown menu di sebelah kanan dengan tulisan "Tambah Produk"</p>
     <li>Masukkan data produk</li>
     <p>Ket : Tidak boleh ada field yang kosong dan nama produk harus beda dari yang lain(unique)</p>
     <li>Data Produk berhasil ditambahkan dan akan tertampil pada page utama</li>
</ol>

<h4>Alur Edit Produk :</h4>
<ol>
    <li>Klik Link "Edit/Hapus Produk" yang berada pada dropdown menu pada pojok kanan</li>
    <li>klik tombol "Edit Produk"</li>
    <li>Masukkan data apa saja yang ingin diedit</li>
    <p>Ket : Tidak boleh kosong TETAPI boleh sama dengan data awal, nama produk TIDAK BOLEH SAMA dengan nama produk yang lain, gambar boleh dikosongkan</p>
    <li>Data Produk berhasil diedit</li>
</ol>

<h4>Alur Hapus Produk :</h4>
<ol>
    <li>Klik Link "Edit/Hapus Produk" yang berada pada dropdown menu pada pojok kanan</li>
    <li>klik tombol "Hapus Produk"</li>
    <li>Alert window akan muncul silahkan klik "Oke"</li>
    <li>Data Produk berhasil dihapus</li>
</ol>
<br>

<h3>CRUD Kategori</h3>
<hr>
<h4>Alur Pembuatan Kategori :</h4>
<ol>
    <li>Klik Link "Tambah Kategori" yang berada pada dropdown menu pada pojok kanan</li>
    <li>Masukkan nama kategori yang diinginkan</li>
    <p>Ket : Nama kategori tidak boleh kosong dan tidak boleh sama satu sama lain</p>
    <li>Data kategori berhasil dihapus</li>
    <p>Ket : Untuk melihat nama Kategori yang telah dibuat silahkan klik link "Edit/Hapus kategori" yang berada pada dropdown menu pada pojok kanan</p>
</ol>

<h4>Alur Edit Kategori :</h4>
<ol>
    <li>Klik link "Edit/Hapus Kategori" yang berada pada dropdown menu pada pojok kanan</li>
    <li>Klik tombol "Edit Kategori"</li>
    <li>Masukkan nama kategori baru</li>
    <p>Ket : Tidak boleh kosong dan tidak boleh sama dengan nama produk lainnya, dan juga disaat pergantian kategori maka semua produk yang terhubung pada nama kategori tersebut akan terganti karenga menggunakan on cascade update</p>
    <li>Nama kategori berhasil diedit</li>
</ol>

<h4>Alur Hapus Kategori :</h4>
<ol>
    <li>Klik link "Edit/Hapus Kategori" yang berada pada dropdown menu pada pojok kanan</li>
    <li>Klik tombol "Hapus Kategori" yang berada pada dropdown menu pada pojok kanan</li>
    <li>Alert window akan muncul silahkan klik "Oke"</li>
    <li>Nama Kategori berhasil dihapus</li>
    <p>Ket : Jika kategori dihapus maka produk yang terhubung dengan kategori tersebut akan terhapus. Karena menggunakan on cascade delete</p>
</ol>

<h3>CRUD Keranjang</h3>
<hr>
<h4>Alur Menambahkan Produk ke Keranjang:</h4>
<ol>
    <li>Klik tombol "Beli Produk"</li>
    <li>Silahkan atur berapa banyak yang ingin dibeli menggunakan arrow key yang tersedia pada box </li>
    <p>Ket: Total yang harus dibayar tidak dapet diganti secara manual, akan tetapi akan terupdate secara otomatis pada saat pergantian jumlah beli</p>
    <li>Klik tombol "Beli" untuk memasukkan produk ke kerajang</li>
    <p>Ket: Jika produk yang akan dibeli sudah ada di dalam keranjang, maka jumlah produk akan tertambah secara otomatis</p>
    <li>Produk berhasil masuk kekeranjang. Untuk melihat apa saja yang telah dibeli silahkan klik gambar keranjang yang berada disamping dropdown menu diseblah kanan</li>
 </ol>

<h4>Alur edit Produk di Keranjang:</h4>
<ol>
    <li>Klik gambar keranjang yang berada disamping dropdown menu diseblah kanan</li>
    <li>Klik tombol "Edit"</li>
    <li>Silahkan masukkan berapa barang yang ingin dibeli</li>
    <li>Edit produk berhasil</li>
</ol>

<h4>Alur Hapus Produk di Keranjang:</h4>
<ol>
    <li>Klik gambar keranjang yang berada disamping dropdown menu diseblah kanan</li>
    <li>Klik tombol "Hapus"</li>
    <li>Produk berhasil dihapus dari keranjang</li>
</ol>
