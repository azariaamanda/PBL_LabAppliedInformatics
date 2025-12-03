<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'koneksi.php'; 

$upload_directory = "uploads/magang/";

if (isset($_POST['submit_pendaftaran'])) {
    
    if (!isset($conn) || !$conn) {
        die("<script>alert('Error: Koneksi database PostgreSQL tidak tersedia.'); window.location.href='pendaftaranmagang.html';</script>");
    }

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $program = $_POST['program'];
    $semester = $_POST['semester'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $durasi_text = $_POST['durasi'];

    preg_match('/\d+/', $durasi_text, $matches);
    $durasi_int = isset($matches[0]) ? (int)$matches[0] : 0;
    
    $jenis_pendaftaran = "Magang";
    $id_kategori_mhs = $id_kategori_magang;
    $portofolio = null; 

function handle_upload($file_key, $base_dir, $sub_folder, $conn, $required = false) {
    
    $upload_dir = $base_dir . $sub_folder . '/'; 
    
    if (!is_dir($upload_dir)) {
        if (!mkdir($upload_dir, 0777, true)) {
            die("<script>alert('Gagal membuat folder $upload_dir. Cek izin folder uploads.'); window.history.back();</script>");
        }
    }

    if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {

        if ($_FILES[$file_key]['size'] > 2097152) {
            die("<script>alert('Ukuran file $file_key melebihi batas (2MB).'); window.history.back();</script>");
        }

        $file_name = $_FILES[$file_key]['name'];
        $file_tmp_name = $_FILES[$file_key]['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Cek ekstensi file (sesuai yang diizinkan di form HTML)
        $allowed_ext_doc = ['pdf', 'doc', 'docx'];
        $allowed_ext_img = ['jpg', 'jpeg', 'png'];

        $is_doc = in_array($file_key, ['transkrip', 'cv', 'surat']);
        $is_img = ($file_key == 'foto');

        if (($is_doc && !in_array($file_ext, $allowed_ext_doc)) || ($is_img && !in_array($file_ext, $allowed_ext_img))) {
             die("<script>alert('Format file $file_key tidak valid.'); window.history.back();</script>");
        }

        $new_file_name = $file_key . '' . time() . '' . uniqid() . '.' . $file_ext;
        $upload_path = $upload_dir . $new_file_name;

        // Pindahkan file ke direktori target
        if (move_uploaded_file($file_tmp_name, $upload_path)) {
            // Kembalikan path relatif ke direktori utama magang (uploads/magang/)
            // Contoh: foto3x4/foto12345.jpg
            return $sub_folder . '/' . $new_file_name; 
        } else {
            die("<script>alert('Gagal mengunggah/memindahkan file $file_key. Cek izin folder uploads.'); window.history.back();</script>");
        }
    } elseif ($required) {
        die("<script>alert('File $file_key wajib diunggah.'); window.history.back();</script>");
    }

    return null; 
}

    $foto_path = handle_upload('foto', $upload_directory, 'foto3x4', $conn, true); 
    $surat_path = handle_upload('surat', $upload_directory, 'surat_magang', $conn, true);
    $transkrip_path = handle_upload('transkrip', $upload_directory, 'transkrip_nilai', $conn, false);
    $cv_path = handle_upload('cv', $upload_directory, 'curriculum_vitae', $conn, false);

    $sql = "INSERT INTO pendaftaran (
                id_kategori_mhs, jenis_pendaftaran, nama_lengkap, nim, program_studi, 
                semester, no_telp, email, durasi, foto_3x4, 
                transkrip_nilai, cv, portofolio, surat_magang
            ) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14)";

    $params = array(
        $id_kategori_mhs,
        $jenis_pendaftaran,
        $nama,
        $nim,
        $program,
        $semester,
        $telepon,
        $email,
        $durasi_int,
        $foto_path,
        $transkrip_path,
        $cv_path,
        $portofolio,
        $surat_path
    );

    $result = pg_query_params($conn, $sql, $params);
    
    if ($result) {
        echo "<script>alert('Pendaftaran berhasil dikirim! Kami akan menghubungi Anda segera.'); window.location.href='pendaftaranmagang.html';</script>";
    } else {
        echo "<script>alert('Pendaftaran gagal disimpan. Error: " . pg_last_error($conn) . "'); window.history.back();</script>";
    }
    pg_close($conn);

} else {
    header("Location: pendaftaranmagang.html");
    exit();
}
?>