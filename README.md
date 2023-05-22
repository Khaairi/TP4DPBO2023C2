# TP4DPBO2023C2
Saya Mochamad Khaairi NIM 2106416 mengerjakan TP4 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Tugas
* Buatlah database berdasarkan kode tersebut
* Ubah arsitektur project tersebut menggunakan MVC
* Tambahkan tabel baru (1 - 2) yang berelasi dengan tabel yang sudah ada (Tabel dan Relasinya bebas ya)
* Buat CRUD dari tabel  baru tersebut

## Desaign Program
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/885ffb5e-9819-4dc9-8659-ee23d6313dbb)

Pada program ini terdapat 2 tabel yaitu:
1. Tabel Members yang berisi 6 atribut dengan atribut `id` sebagai primary keynya. Tabel ini memiliki relasi many to one dengan tabel Groups dengan foreign key ada pada atribut `groups`
2. Tabel Groups yang berisi 3 atribut dengan atribut `id` sebagai primary keynya. Tabel ini memiliki relasi one to many dengan tabel Members

## Penjelasan alur
1. Ketika pertama kali mengakses, pengguna akan ditampilkan dengan halaman home yang berisi data Members
2. Pengguna dapat menekan tombol add new jika akan menambahkan data Members dan akan diarahkan ke halaman create new member
3. Pada halaman create new member terdapat form untuk mengisi data member dan menekan tombol submit untuk menyimpan data
4. Pada halaman home yaitu pada list data member terdapat action untuk edit dan hapus data
5. Jika menekan tombol edit maka akan diarahkan ke halaman edit yang form field nya sudah terisi dengan data member yang akan diubah
6. Pada halaman Groups terdapat list dari data groups dan form tambah group di sebelah kanan
7. Sama seperti members, pada groups juga terdapat action untuk mengubah dan menghapus data

## Dokumentasi
Halaman home
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/c559f966-596b-48a5-8402-470552823887)

Halaman create new members
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/836284dd-cdcb-4d0a-8e8a-0b05d308e32a)

Halaman edit members
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/fb770cbc-20c4-4885-a661-bab5fe9d15f2)

Halaman groups
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/f2219d1e-8ff3-4246-affc-6229f7d2a4b4)

edit groups
![image](https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/75979076-0ae5-463a-a6a7-708d379b647d)

Testing

https://github.com/Khaairi/TP4DPBO2023C2/assets/100757455/5f731de4-eb52-4d75-89a5-842c577fd7c3
