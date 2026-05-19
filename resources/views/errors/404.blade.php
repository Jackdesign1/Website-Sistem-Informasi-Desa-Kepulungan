<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Halaman Tidak Ditemukan - Desa Kepulungan</title>
   <style>
      :root { --primary: #2c3e50; --accent: #3498db; --bg: #f8fafc; }
      body { font-family: 'Inter', system-ui, sans-serif; background: var(--bg); color: var(--primary); display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; padding: 20px; }
      .card { background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); text-align: center; max-width: 600px; width: 100%; transition: transform 0.3s ease; }
      .card:hover { transform: translateY(-5px); }
      .error-code { font-size: 8rem; font-weight: 900; margin: 0; background: linear-gradient(135deg, var(--primary), var(--accent)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; line-height: 1; }
      h1 { font-size: 1.5rem; margin-top: 0; }
      p { color: #64748b; margin-bottom: 2rem; }
      
      .search-box { position: relative; margin-bottom: 2rem; }
      .search-box input { width: 100%; padding: 12px 20px; border: 2px solid #e2e8f0; border-radius: 10px; outline: none; box-sizing: border-box; transition: border-color 0.2s; }
      .search-box input:focus { border-color: var(--accent); }
      
      .quick-links { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; text-align: left; }
      .link-item { padding: 12px; background: #f1f5f9; border-radius: 8px; text-decoration: none; color: var(--primary); font-size: 0.9rem; display: flex; align-items: center; transition: background 0.2s; }
      .link-item:hover { background: #e2e8f0; }
      .link-item i { margin-right: 10px; }
      
      .btn-home { display: inline-block; margin-top: 2rem; padding: 12px 30px; background: var(--primary); color: white; text-decoration: none; border-radius: 10px; font-weight: bold; transition: opacity 0.2s; }
      .btn-home:hover { opacity: 0.9; }
   </style>
</head>
<body>
   <div class="card">
      <div class="error-code">404</div>
      <h1>Halaman Tidak Ditemukan</h1>
      <p>Maaf, informasi yang Anda cari tidak tersedia atau telah dipindahkan.</p>

      <div class="quick-links" id="linkContainer">
         <a href="/" class="link-item">🏠 Beranda</a>
         <a href="/profil-desa" class="link-item">👥 Profil Desa</a>
         <a href="/anggaran" class="link-item">📊 Transparansi</a>
         <a href="/informasi" class="link-item">📰 Berita Desa</a>
         <a href="/galeri" class="link-item">🖼️ Galeri</a>
         <a href="/kontak" class="link-item">📞 Hubungi Kami</a>
      </div>

      <a href="/" class="btn-home">Kembali ke Beranda</a>
   </div>

   <script>
      function filterLinks(query) {
         const links = document.querySelectorAll('.link-item');
         const container = document.getElementById('linkContainer');
         let hasResults = false;
         
         links.forEach(link => {
            const text = link.textContent.toLowerCase();
            if (text.includes(query.toLowerCase())) {
               link.style.display = 'flex';
               hasResults = true;
            } else {
               link.style.display = 'none';
            }
         });
      }
   </script>
</body>
</html>