<?php require_once('portions/head.php'); ?>
<?php require_once('portions/navigation.php'); ?>
<!-- Article -->
<header class="masthead" style="background-image: url('/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>Chapitre à lire....</h1>
                    <span class="meta">Ecrit par<a href="#"> Jean Forteroche </a></span>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h2><?= htmlspecialchars($post['title']) ?></h2>
                <p>
                    <div id="testarticle">
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p></div>
                    <br />
                    <h2>Commentaires</h2>
                    <form action="XXX" method="post">
                        <div>
                            <label for="name">Auteur</label>
                            <br />
                            <input type="text" id="name" name="name" />
                        </div>
                        <div>
                            <label for="content">Commentaire</label>
                            <br />
                            <textarea id="content" name="content"></textarea>
                        </div>
                        <div>
                            <input type="submit" />
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
</article>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto" id="onecomment">
                 <?php
                 while ($comment = $comments->fetch())
                 {
                 ?>
        
                <h5 id="titlecomment"><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></h5>

                <p class="commentsp">
                    <?= nl2br(htmlspecialchars($comment['content'])) ?>
                    <br />
                </p>

                <?php
                }
                ?>
                <br />
            </div>

            <div class="col-lg-8 col-md-10 mx-auto">
                <div>
                    <a href="ajouter php pour signaler"><img src="/img/signaler.png" class="signaler" alt="signaler"/>Signaler</a>
                </div>
            </div>
        </div>
    </div>
</article>
<?php require_once('portions/footer.php'); ?>


