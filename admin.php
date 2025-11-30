<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Anggota</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body { background: #f4f7f6; }
        .admin-container { max-width: 900px; margin: 40px auto; padding: 20px; }
        .admin-card { background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px; padding: 20px; }
        .admin-card h2 { margin-bottom: 20px; color: #0A2346; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc; }
        .btn { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .btn-primary { background-color: #FF8C42; color: white; }
        .btn-danger { background-color: #e74c3c; color: white; }
        .btn-secondary { background-color: #7f8c8d; color: white; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #0A2346; color: white; }
        .actions button { margin-right: 5px; }
    </style>
</head>
<body>
    <!-- Navbar Sederhana untuk Admin -->
    <header class="navbar">
        <div class="nav-content" style="background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
            <div class="logo">
                <a href="index.php"><img src="img/logo.png" alt="Logo"></a>
            </div>
            <h1 style="color: #0A2346;">Halaman Admin</h1>
            <a href="index.php" style="text-decoration: none; font-weight: bold;">Lihat Halaman Publik</a>
        </div>
    </header>

    <main class="admin-container">
        <!-- Form untuk Menambah/Mengedit Anggota -->
        <div class="admin-card">
            <h2 id="form-title">Tambah Anggota Baru</h2>
            <form id="anggota-form">
                <input type="hidden" id="anggota-id">
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="peran">Peran</label>
                    <select id="peran" required>
                        <option value="Kepala Lab">Kepala Lab</option>
                        <option value="Peneliti">Peneliti</option>
                        <option value="Asisten">Asisten</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi/Keahlian</label>
                    <textarea id="deskripsi" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" id="cancel-edit" class="btn btn-secondary" style="display:none;">Batal Edit</button>
            </form>
        </div>

        <!-- Tabel Daftar Anggota -->
        <div class="admin-card">
            <h2>Daftar Anggota</h2>
            <table id="anggota-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan dimuat di sini oleh JavaScript -->
                </tbody>
            </table>
        </div>
    </main>

    <script>
        const form = document.getElementById('anggota-form');
        const formTitle = document.getElementById('form-title');
        const tableBody = document.querySelector('#anggota-table tbody');
        const anggotaIdInput = document.getElementById('anggota-id');
        const cancelEditBtn = document.getElementById('cancel-edit');

        // Fungsi untuk memuat anggota
        async function loadAnggota() {
            const response = await fetch('api/get_anggota.php');
            const anggota = await response.json();
            tableBody.innerHTML = '';
            anggota.forEach(a => {
                const row = `
                    <tr>
                        <td>${a.nama}</td>
                        <td>${a.peran}</td>
                        <td class="actions">
                            <button class="btn btn-secondary" onclick="editAnggota(${a.id}, '${a.nama}', '${a.peran}', '${a.deskripsi || ''}')">Edit</button>
                            <button class="btn btn-danger" onclick="deleteAnggota(${a.id})">Hapus</button>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

        // Fungsi untuk mengirim data (tambah/update)
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const id = anggotaIdInput.value;
            const data = {
                nama: document.getElementById('nama').value,
                peran: document.getElementById('peran').value,
                deskripsi: document.getElementById('deskripsi').value,
            };

            let url = 'api/manage_anggota.php';
            let method = 'POST';

            if (id) { // Jika ada ID, berarti ini mode edit
                method = 'PUT';
                data.id = id;
            }

            await fetch(url, {
                method: method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            form.reset();
            anggotaIdInput.value = '';
            formTitle.innerText = 'Tambah Anggota Baru';
            cancelEditBtn.style.display = 'none';
            loadAnggota();
        });

        // Fungsi untuk masuk mode edit
        function editAnggota(id, nama, peran, deskripsi) {
            anggotaIdInput.value = id;
            document.getElementById('nama').value = nama;
            document.getElementById('peran').value = peran;
            document.getElementById('deskripsi').value = deskripsi;
            formTitle.innerText = 'Edit Anggota';
            cancelEditBtn.style.display = 'inline-block';
            window.scrollTo(0, 0);
        }

        // Fungsi untuk menghapus anggota
        async function deleteAnggota(id) {
            if (confirm('Apakah Anda yakin ingin menghapus anggota ini?')) {
                await fetch('api/manage_anggota.php', {
                    method: 'DELETE',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: id })
                });
                loadAnggota();
            }
        }

        // Event untuk tombol batal edit
        cancelEditBtn.addEventListener('click', () => {
            form.reset();
            anggotaIdInput.value = '';
            formTitle.innerText = 'Tambah Anggota Baru';
            cancelEditBtn.style.display = 'none';
        });

        // Muat data saat halaman pertama kali dibuka
        document.addEventListener('DOMContentLoaded', loadAnggota);
    </script>
</body>
</html>