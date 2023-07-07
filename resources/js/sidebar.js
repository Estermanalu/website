// Ambil semua tautan dalam sidebar
const sidebarLinks = document.querySelectorAll('.sidebar a');

// Iterasi melalui setiap tautan
sidebarLinks.forEach(link => {
  // Tambahkan event listener untuk setiap tautan
  link.addEventListener('click', () => {
    // Hapus class active dari semua tautan
    sidebarLinks.forEach(link => link.classList.remove('active'));

    // Tambahkan class active untuk tautan yang sedang diklik
    link.classList.add('active');
  });
});
