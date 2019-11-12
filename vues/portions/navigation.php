<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/index.php">Billet simple pour l'Alaska</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=biography">Biographie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=listAllPosts">Chapitres</a>
          </li>
          <?php if (!empty($_SESSION['typeuser']) &&($_SESSION['typeuser'] == '2')): ?>  
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=listPostsAdmin">Admin</a>
          </li>
          
          <?php endif;?>
          <?php if (!empty($_SESSION['username'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=deconnexion">Deconnexion</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=newUser">Inscription/Connexion</a>
          </li>
          <?php endif;?>
        </ul>
      </div>
    </div>
  </nav>
