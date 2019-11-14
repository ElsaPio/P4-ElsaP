<?php
ob_start();
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
        <h1>Les 5 derniers chapitres...</h1>
      </br>
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

              <?php
            if (strlen(strip_tags($article['content'])) >= 350) {
                //trouve dernier espace après dernier mot de l'extrait.
                $space = strpos(strip_tags($article['content']), ' ', 350);               
                echo substr(strip_tags($article['content']), 0, $space).'...';
            }
            else 
                echo(strip_tags($article['content']));
                
        ?>
              
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
          <a class="btn btn-primary float-right" href="index.php?action=listAllPosts">Voir tous les billets &rarr;</a>
        </div>
      </div>
    </div>
  </div>

<?php
$content = ob_get_clean();
require('template.php'); ?>