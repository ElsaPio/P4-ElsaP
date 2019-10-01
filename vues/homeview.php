<?php
require_once('portions/head.php');
?>
<?php
require_once('portions/navigation.php');
?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Billet simple pour l'Alaska</h1>
            <span class="subheading">Un récit de Jean Forteroche</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->


  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <?php
         while ($article = $posts->fetch()) 
         {
         ?>
       <div class="post-preview">
          <a href="index.php?action=post&id=<?php echo $article['id']; ?>">
            <h2 class="post-title">
              <?= htmlspecialchars($article['title']); ?>
           </h2>
         </a>
            <h5 class="post-subtitle">
              <?= htmlspecialchars($article['content']); ?> 
              <em> <a href="index.php?action=post&id=<?php echo $article['id']; ?>" id="lirelasuite">...[lire la suite]</a></em>
            </h5>
          </a>
          <p class="post-meta">Posté par
            <a href="/vues/biographie.php">Jean Forteroche</a>
            le <?php echo $article['date']; ?> 
          </p>
        </div>
        <hr>
        <hr>
         <?php
         }
         $posts->closeCursor();
         ?>
       <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Billets + anciens &rarr;</a>
        </div>
      </div>
    </div>
  </div>



  <hr>

  <?php
  require_once('portions/footer.php');
  ?>