<!DOCTYPE html>
<html lang="fr">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Billet simple pour l'Alaska, blog de J. Forteroche">
    <meta name="author" content="Elsa Pioli">
    <title>Billet Simple pour l'Alaska - J. Forteroche</title>
    <!-- Bootstrap core CSS -->
    <link href="/design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="/design/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="/design/css/clean-blog.min.css" rel="stylesheet">
    <link href="/design/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./design/js/jsadmin.js"></script>
    <script src="https://cdn.tiny.cloud/1/v3wdjvkng5w5vqlcq3lhwk8uw6sey7z3xvz6k00at0nhfpuz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="/design/tinymce/fr_FR.js"></script>
    <script src="/design/tinymce/tinyconfig.js"></script>
  </head>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <?php require_once('portions/navigation.php'); ?>
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
  <div class="row">
    <div class="col-md-12">
      <h3>Panneau d'administration des articles</h3>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th>
              Titre
            </th>
            <th>
              Contenu
            </th>
            <th>
              Date
            </th>
            <th>
              Modifier
            </th>
            <th>
              Supprimer
            </th>
          </thead>
          <tbody>
            <?phpwhile ($article = $posts->
            fetch()){?>
            <tr>
              <td>
                <?= htmlspecialchars($article['title']); ?>
              </td>
              <td>
                <?= htmlspecialchars($article['content']); ?>
              </td>
              <td>
                <?php echo $article['date']; ?>
              </td>
              <td>
                <p data-placement="top" data-toggle="tooltip" title="Modifier">
                  <button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>
                </p>
              </td>
              <td>
                <p data-placement="top" data-toggle="tooltip" title="Supprimer">
                  <button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                </p>
              </td>
            </tr>
            <?php}$posts->
            closeCursor();?>
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
          <th>
            Billet associé
          </th>
          <th>
            Auteur
          </th>
          <th>
            Commentaire
          </th>
          <th>
            Date
          </th>
          <th>
            Signalement
          </th>
          <th>
            Modifier
          </th>
          <th>
            Supprimer
          </th>
        </thead>
        <tbody>
          <?phpwhile ($comment = $allcomments->
          fetch()){?>
          <tr>
            <td>
              <?= htmlspecialchars($comment['FK_post']); ?>
            </td>
            <td>
              <?= htmlspecialchars($comment['author']); ?>
            </td>
            <td>
              <?= htmlspecialchars($comment['content']); ?>
            </td>
            <td>
              <?php echo $comment['comment_date']; ?>
            </td>
            <td>
              <?= htmlspecialchars($comment['signalement']); ?>
            </td>
            <td>
              <p data-placement="top" data-toggle="tooltip" title="Edit">
                <button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#editcomm" ><span class="glyphicon glyphicon-pencil"></span></button>
              </p>
            </td>
            <td>
              <p data-placement="top" data-toggle="tooltip" title="Delete">
                <button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#deletecomm" ><span class="glyphicon glyphicon-trash"></span></button>
              </p>
            </td>
          </tr>
          <?php}$allcomments->
          closeCursor();?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true"><div class="modal-dialog">
  <div class="modal-content">
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
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
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
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
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
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<hr>
<?php  require_once('portions/footer.php');  ?>