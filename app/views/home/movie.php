<?php require_once 'app/views/templates/header.php'; ?>
<style>
  body{
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
  }
  .movie-container p,
  .movie-container h1,
  .movie-container h2,
  .movie-container label {
    color: #333, important;
  }
  select,
  input,
  button{
    color: #000;
  }
  list-group-item{
    background-color: #fffbe6; 
      color: #000;
    }
    .card.bg-dark .card-text {
      color: #f8f9fa !important;
    }
</style>

<div class="container py-5 movie-container">
  <div class="row">
    <div class="col-md-4 text-center mb-5">
      <img src="<?=htmlspecialchars($movie['Title']); ?>" alt="Poster" class="img-fluid rounded shadow">
    </div> 
    <div class="col-md-8">
      <h2 class="mt-3"><?=htmlspecialchars($movie['Title']); ?></h2>
      <p><strong>Genre</strong> <?=htmlspecialchars($movie['Genre']); ?></p>
      <p><strong>Plot</strong> <?=htmlspecialchars($movie['Plot']); ?></p>
      <p><strong>Actors</strong> <?=htmlspecialchars($movie['Actors']); ?></p>
      
<?php require_once 'app/views/templates/footer.php'; ?>