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
            <h1>Modifier un billet...</h1>
            <span class="meta">Bonjour Jean ! Heureux de vous revoir</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content -->

  <div class="row" id="newarticle">
    <div class="col-md-12">
      <h3>Editer l'article :</h3>
      
      <form action="index.php?action=editArticle&id=<?php echo $post['id']; ?>" method="post">
        <div class="form-group">
          <input class="form-control" type="text" name="title" value="<?php echo $post['title']; ?>" placeholder="Titre">
        </div>
      
        <div class="form-group">
          <textarea rows="2" class="form-control" name="content" id="tinyarea" placeholder="Contenu"> <?php echo $post['content']; ?> </textarea>
        </div>

        <div class="modal-footer ">
          <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Enregistrer l'article</button>
        </div>
      </form>
    </div>
  </div>


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