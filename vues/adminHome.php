<!DOCTYPE html>
<html lang="fr">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <?php  require_once('portions/headadmin.php');  ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <?php require_once('portions/navigation.php'); ?>

  <?php if ($_SESSION['typeuser'] == '2'): ?>       
  <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Interface Administrateur</h1>
            <span class="meta">Bonjour Jean ! Heureux de vous revoir</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content -->
<div class="container">
  <div class="row" id="buttonnewarticle"> 
    <a href="index.php?action=newArticle"><button id="addarticle">AJOUTER UN ARTICLE</button></a>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h3>Panneau d'administration des articles</h3>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th id="tab_titre">
              Titre
            </th>
            <th>
              Contenu
            </th>
            <th>
              Date
            </th>
            <th id="tab_modif">
              Modif
            </th>
            <th id="tab_supp">
              Suppr
            </th>
          </thead>
          <tbody>
            <?php
            while ($article = $allposts->fetch())
              {
                ?>
            <tr>
              <td>
                <a href="index.php?action=post&id=<?php echo $article['id']; ?>" id="lirelasuite"><?= htmlspecialchars($article['title']); ?></a>
              </td>
              <td>
                <?php
            if (strlen(strip_tags($article['content'])) >= 350) {
                //trouve dernier espace après dernier mot de l'extrait.
                $space = strpos(strip_tags($article['content']), ' ', 350);               
                echo substr(strip_tags($article['content']), 0, $space).'...';
            }
            else 
                echo(strip_tags($article['content']));
                
        ?>
              </td>
              <td>
                <?php echo $article['date']; ?>
              </td>
              <td>
                <p title="Modifier">
                  <a href="index.php?action=editArticleView&id=<?php echo $article['id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a>
                </p>
              </td>
              <td>
                <p title="Supprimer">
                  <a href="index.php?action=suppArticle&id=<?php echo $article['id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>
                </p>
              </td>
            </tr>
            <?php
          }
          $allposts->closeCursor()
          ;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <h3>Panneau d'administration des commentaires</h3>
    <div class="table-responsive">
      <table id="mytablecomm" class="table table-bordred table-striped">
        <thead>
          <th class="iconcenter">
            Billet associé
          </th>
          <th class="iconcenter">
            Auteur
          </th>
          <th class="iconcenter">
            Commentaire
          </th>
          <th class="iconcenter">
            Date
          </th>
          <th class="iconcenter">
            Signalement
          </th>
          <th class="iconcenter">
            Désignaler
          </th>
          <th class="iconcenter">
            Supprimer
          </th>
        </thead>
        <tbody class="iconcenter">
          <?php
          while ($comment = $allcomments->fetch())
            {
              ?>
          <tr>
            <td>
              <?= htmlspecialchars($comment['title']); ?>
            </td>
            <td>
              <?= htmlspecialchars($comment['username']); ?>
            </td>
            <td>
              <?= htmlspecialchars($comment['content']); ?>
            </td>
            <td>
              <?php echo $comment['comment_date']; ?>
            </td>
            <td>
               <?= htmlspecialchars($comment['signalement'] ? 'Oui' : 'Non'); ?>
            </td>
            <td>
              <?php if ($comment['signalement'] == 1): ?>
              <p title="Modifier">
                <a href="index.php?action=unsignalComment&id=<?php echo $comment['id']; ?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-wrench"></span></button></a>
              </p>
              <?php endif;?>
            </td>
            <td>
              <p title="Supprimer">
                <a href="index.php?action=suppComment&id=<?php echo $comment['id']; ?>"><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button></a>
              </p>
            </td>
          </tr>
        <?php
        }
        $allcomments->closeCursor()
        ;?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php else: ?>
  <header class="masthead" style="background-image: url('/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>OOPS ! Accès refusé</h1>
            <span class="meta">Il faut être administrateur pour accéder à cette page</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
<?php endif;?>

<?php  require_once('portions/footer.php');  ?>