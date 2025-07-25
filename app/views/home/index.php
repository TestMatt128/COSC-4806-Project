<?php require_once 'app/views/templates/header.php' ?>
<style>
body {
    background-color: #fefae0; /* cream */
    font-family: 'Segoe UI', sans-serif;
  }

  .hero-center {
    text-align: center;
    padding: 100px 20px 60px;
  }

  .hero-center h1 {
    font-size: 3.5rem;
    color: #111;
    font-weight: bold;
  }

  .hero-center p {
    font-size: 1.2rem;
    color: #333;
    margin-top: 10px;
    margin-bottom: 40px;
  }

  .search-bar {
    max-width: 500px;
    margin: 0 auto;
  }

  .search-bar input {
    border-radius: 0;
    border: 2px solid #000;
  }

  .search-bar button {
    border-radius: 0;
    background-color: #000;
    color: #fff;
    border: 2px solid #000;
  }

  .search-bar button:hover {
    background-color: #222;
  }
</style>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hello! Search up any movie you want to see reviews on.</h1>
            </div>
        </div>
    </div>

  <form action="/omdb/search" method="get" class="search-bar d-flex">
   <div class="col-12 d-flex justify-content-center">"
    <input 
      type="text" 
      name="title" 
      class="form-control me-2"
      placeholder="Search Movies" 
      required
    >
   </div>
    <button type="submit" class="btn">Search</button>
  </form>

<?php require_once 'app/views/templates/footer.php' ?>
