<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wisata Air Panas Wong Pulungan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .hero {
      background-image: url('https://images.unsplash.com/photo-1526483360412-f4e41a572c33?auto=format&fit=crop&w=1400&q=80');
      background-size: cover;
      background-position: center;
      height: 80vh;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
    }
  </style>
</head>
<body>

  <!-- Hero -->
  <section class="hero">
    <div class="text-center">
      <h1 class="display-4">Wisata Air Panas Wong Pulungan</h1>
      <p class="lead">Nikmati kehangatan alam dan relaksasi alami</p>
    </div>
  </section>

  <!-- Deskripsi -->
  <section class="container my-5">
    <h2 class="text-center mb-4">Tentang Wisata</h2>
    <p class="text-center">
      Terletak di tengah alam pedesaan, Air Panas Wong Pulungan adalah destinasi favorit untuk relaksasi dan kesehatan. 
      Air panas alami dari perut bumi dipercaya memiliki manfaat untuk kulit dan kebugaran tubuh.
    </p>
  </section>

  <!-- Galeri -->
  <section class="container mb-5">
    <h2 class="text-center mb-4">Galeri</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded" alt="Air Panas 1">
      </div>
      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded" alt="Pemandian Alam">
      </div>
      <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1598151645489-6efb40211a7a?auto=format&fit=crop&w=600&q=80" class="img-fluid rounded" alt="Lingkungan Asri">
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    &copy; <?= date("Y") ?> Wisata Air Panas Wong Pulungan. All rights reserved.
  </footer>

</body>
</html>
