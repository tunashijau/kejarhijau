# Panduan kontribusi

## Maintainer

Kau adalah maintainer (pemilik repo ini). Kau bertugas untuk testing. Bingung cara testingnya? gunakan github cli (Cari sendiri cara downloadnya). Sesudah install, masukkan kode berikut secara berurutan.

```bash
# Ini untuk login akun github
gh auth login 

# Ini untuk checkout pull request. 
# Nomor sembilan ini mengartikan pull request ke 9. Tau kan? di pull request selalu ada #9 #10 dan seterusnya
gh pr checkout 9

# Yaudah testing. mungkin bisa pake Pest
```

## Kontributor

Nah, untuk kontributor, alurnya seperti ini.

1. Fork repository ini ke akun githubmu
2. Sesudah fork, clone dengan perintah:

```bash
git clone https://github.com/<nama-akun>/kejarhijau.git
```

3. Buat branch dengan perintah:

```bash
git checkout -b <nama-branch-terserah-gak-peduli>
```

4. Jika sudah masuk branch, ya sudah tinggal ubah-ubah saja.
5. Setelah selesai pengeditan yang menguras otak, masukkan perintah:

```bash
git add .
git commit -m "<Naming>: <Fiturnya apa?>"
```

6. Sudah selesai, tinggal masuk ke branch utama dengan:

```bash
git checkout main
```

7. Push ke repositorymu
8. Setelah push, buka halaman fork repositorymu lalu klik tombol contribute
9. Masukkin hal yang lu ubah dan tunggu buat di merge olah ADMINNNN...

## Kode utama berubah

Kalau kode utama berubah, sync fork terlebih dahulu lalu di terminal vscode masukkan:

```bash
git pull origin main
```

Dengan catatan kau berada di branch main saat pull

## Merge Conflict

Mampus...