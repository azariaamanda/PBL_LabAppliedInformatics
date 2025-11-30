document.addEventListener("DOMContentLoaded", function() {
    // Tentukan path footer berdasarkan lokasi halaman saat ini
    const currentPath = window.location.pathname;
    const footerPath = currentPath.includes('/pages/') ? '../footer.html' : './footer.html';

    // Muat footer
    fetch(footerPath)
        .then(response => response.text())
        .then(data => {
            const placeholder = document.getElementById('footer-placeholder');
            if (placeholder) {
                placeholder.innerHTML = data;
            }
        })
        .catch(error => console.error('Error loading footer:', error));
});