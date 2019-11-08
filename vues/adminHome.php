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
                <p data-placement="top" data-toggle="tooltip" title="Modifier">
                  <a href="index.php?action=editArticleView&id=<?php echo $article['id']; ?>"><button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a>
                </p>
              </td>
              <td>
                <p data-placement="top" data-toggle="tooltip" title="Supprimer">
                  <a href="index.php?action=suppArticle&id=<?php echo $article['id']; ?>"><button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a>
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
            Modifier
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
              <p data-placement="top" data-toggle="tooltip" title="Modifier">
                <button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#editcomm" ><span class="glyphicon glyphicon-pencil"></span></button>
              </p>
            </td>
            <td>
              <p data-placement="top" data-toggle="tooltip" title="Supprimer">
                <a href="index.php?action=suppComment&id=<?php echo $comment['id']; ?>"><button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#deletecomm" ><span class="glyphicon glyphicon-trash"></span></button></a>
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
</div>
<!-- <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title custom_align" id="Heading">Modifier l'article</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <input class="form-control" type="text" placeholder="Titre">
      </div>
      <div class="form-group">
        <textarea rows="2" class="form-control" id="tinyarea" placeholder="Contenu"></textarea>
      </div>
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Mettre à jour</button>
    </div>
  </div> -->
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"><div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title custom_align" id="Heading">Supprimer l'article</h4>
    </div>
    <div class="modal-body">
      <div class="alert alert-danger">
        <span class="glyphicon glyphicon-warning-sign"></span>
          Confirmez-vous la suppression ?
      </div>
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
    </div>
  </div>
</div>
</div>
-->
<div class="modal fade" id="editcomm" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"><div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title custom_align" id="Heading">Modifier le commentaire</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="Modifier le commentaire"></textarea>
      </div>
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Mettre à jour</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--
<div class="modal fade" id="deletecomm" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"><div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title custom_align" id="Heading">Supprimer le commentaire</h4>
    </div>
    <div class="modal-body">
      <div class="alert alert-danger">
        <span class="glyphicon glyphicon-warning-sign"></span>
          Confirmez-vous la suppression ?
      </div>
    </div>
    <div class="modal-footer ">
      <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
    </div>
  </div>
</div>
</div>
-->
<hr>

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