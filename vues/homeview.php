<?php require_once('portions/head.php'); ?>
<?php require_once('portions/navigation.php'); ?>

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
 <?php
        while ($donnees = $req->fetch())
        {
        ?>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">
          <a href="vues/articleview.php">
            <h2 class="post-title">
              <?php echo htmlspecialchars($donnees['title']); ?>
            </h2>
            <h5 class="post-subtitle">
              <?php echo htmlspecialchars($donnees['content']); ?> <em><a href="google.fr">...[lire la suite]</a></em>
            </h5>
          </a>
          <p class="post-meta">Posté par
            <a href="#">Jean Forteroche</a>
            le <?php echo $donnees['date']; ?> :</p>
        </div>
          <?php
        }
        $req->closeCursor();
        ?>
        <hr>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Billets + anciens &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <?php require_once('portions/footer.php'); ?>