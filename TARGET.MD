# SOFTWARE DESCRIPTION
Bus Trans UPN adalah sebuah perusahaan penyedia layanan transportasi umum. 
Trans UPN menerapkan sistem bus rapid transit (BRT) pada jaringan antarkota dan/atau kabupaten dalam satu lingkup wilayah aglomerasi perkotaan.
Driver dan kondektur bus Trans UPN dibayar per kilometer untuk setiap perjalananya. 
Driver dibayar Rp. 3.000/Km sedangkan kondektur dibayar Rp. 1.500/Km. 
Trans UPN memiliki belasan hingga puluhan bus. Tetapi tidak semua bus beroperasi, ada bus yang menjadi bus cadangan atau sedang dalam perbaikan.
Dari narasi singkat diatas, buatlah sebuah aplikasi berbasis web untuk membantu Perusahaan Bus Trans UPN untuk mengelola data Bus, Driver, dan Kondektur dengan ketentuan sebagai berikut:

# TARGET
[v] Database sistem sudah ditentukan dan disiapkan
[v] Nama database tidak boleh diubah (“transupn”)
[v] Implementasikan dengan framework CodeIgniter 3.

[v] Buat operasi CRUD untuk trans_upn
[v] bus page
	[v] Buat operasi CRUD untuk bus
	[v] Jika bus beroperasi / aktif (status: 1) data ditandai dengan warna hijau.
	[v] Jika bus merupakan bus cadangan (status:2) data ditandai dengen warna kuning.
	[v] Jika bus dalam perbaikan/rusak (status: 0) data ditandai dengan warna merah.
	[v] Tampilkan juga jumlah KM total yang telah ditempuh.
	[v] Berikan juga opsi filter data berdasarkan status bus.
[v] driver page
	[v] Buat operasi CRUD untuk driver
	[v] Tampilkan juga detail perjalanan dan jumlah KM total yang telah ditempuh oleh driver
	[v] Buat halaman untuk mengitung pendapatan driver per bulan (3000/km)
	[v] ada opsi memilih bulan tertentu
[v] kondektur page
	[v] Buat operasi CRUD untuk kondektur
	[v] Tampilkan juga detail perjalanan dan jumlah KM total yang telah ditempuh oleh kondektur
	[v] Buat halaman untuk mengitung pendapatan kondektur per bulan (1500/km)
	[v] ada opsi memilih bulan tertentu
