<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Laboratory of Applied Informatics</title>
    <link rel="stylesheet" href="style-common.css">
    <link rel="stylesheet" href="style-index.css">
</head>
<body>

<!-- Navigation -->
<header class="navbar">
    <div class="nav-shell">
        <!-- SVG curved bottom to create the white inward arc -->
        <div class="nav-curve" aria-hidden="true">
            <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="navGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                        <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ffffff;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <!-- Bottom curve with rounded corners -->
                <path d="M 0,0 L 0,40 Q 0,80 60,80 L 1380,80 Q 1440,80 1440,40 L 1440,0 Z" fill="#ffffff"/>
            </svg>
        </div>
        <div class="nav-content">
            <div class="logo">
                <img src="img/logo/logo.png" alt="Laboratory of Applied Informatics">
            </div>

            <nav>
                <ul>
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="pages/produk.php">Produk</a></li>
                    <li><a href="index.php">Mitra</a></li>
                    <li><a href="pages/berita.php">Berita</a></li>
                    <li><a href="pages/galeri.php">Galeri</a></li>
                    <li><a href="javascript:void(0);" onclick="return false;">Layanan</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Hero Section -->
<div class="hero">
    <img src="img/logo/gedung-sipil.jpg" alt="Gedung Sipil Politeknik Negeri Malang"/>
    <h1>ANGGOTA</h1>
</div>

<!-- Main Content -->
<main class="container">
    <!-- Kepala Laboratorium Section -->
    <div class="member-section">
        <h2>KEPALA LABORATORIUM</h2>
        <div class="research-grid" style="justify-content: center;">
            <!-- Head Researcher Card -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Kepala Laboratorium">
                    </div>
                </div>
                <div class="card-label">Kepala Lab</div>
                <div class="card-content">
                    <h4>Ir. Yan Watequlis Syaifudin, S.T., M.M.T., Ph.D</h4>
                    <p>Fokus pada inovasi dan penerapan teknologi terapan untuk industri.</p>
                    <a href="pages/profil-peneliti.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Peneliti Section -->
    <div class="member-section">
        <h2>PENELITI</h2>
        <div class="research-grid">
            <!-- Researcher Card 1 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Peneliti">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Iana Yoga Saputra, S.Kom., M.M.T.</h4>
                    <p>Information Extraction, Text Mining, Natural Language Processing, Text Mining, Digital Image Processing</p>
                    <a href="pages/profil-peneliti.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Researcher Card 2 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Peneliti">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Pramana Yoga Saputra, S.Kom., M.M.T.</h4>
                    <p>Information Extraction, Text Mining, Social Media Analytics, Digital Image Processing</p>
                    <a href="pages/profil-peneliti.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Researcher Card 3 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Peneliti">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Pramana Yoga Sap S.Kom., M.M.T.</h4>
                    <p>Information Extraction, Text Mining, Social Media Analytics, Digital Image Processing</p>
                    <a href="pages/profil-peneliti.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Asisten Laboratorium Section -->
    <div class="member-section">
        <h2>ASISTEN LABORATORIUM</h2>
        <div class="research-grid">
            <!-- Assistant Card 1 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Asisten">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Ahmad Zulkifli</h4>
                    <p>D4 Sistem Informasi Bisnis</p>
                    <a href="pages/profil.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Assistant Card 2 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Asisten">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Rina Amelia</h4>
                    <p>D4 Teknik Informatika</p>
                    <a href="pages/profil.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Assistant Card 3 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Asisten">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Fajar Nugroho</h4>
                    <p>D4 Sistem Informasi Bisnis</p>
                    <a href="pages/profil.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Magang Section -->
    <div class="member-section">
        <h2>MAGANG</h2>
        <div class="research-grid">
            <!-- Intern Card 1 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Magang">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Siti Fatimah</h4>
                    <p>D3 Manajemen Informatika</p>
                    <a href="pages/profil-magang.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Intern Card 2 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Magang">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Eko Prasetyo</h4>
                    <p>D3 Manajemen Informatika</p>
                    <a href="pages/profil-magang.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>

            <!-- Intern Card 3 -->
            <div class="research-card">
                <div class="card-avatar">
                    <div class="card-avatar-circle">
                        <img src="img/avatar-default.png" alt="Avatar Magang">
                    </div>
                </div>
                <div class="card-label">Anggota</div>
                <div class="card-content">
                    <h4>Andini Eka Amalia</h4>
                    <p>D4 Sistem Informasi Bisnis</p>
                    <a href="pages/profil-magang.php">
                        <button class="card-button">Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include 'footer.html'; ?>
</body>
</html>