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
                    <span class="meta">Posted by<a href="#"> Jean Forteroche </a>on September 17, 2019</span>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h3><!--Insérer titre via php--></h3>
                <p>
                    <div id="testarticle">
                        <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>

          <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>

          <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>

          <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>

          <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p></div>
                    <!--Insérer article -->
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
            <div class="col-lg-8 col-md-10 mx-auto">
                <!--Ajouter for each commentaires-->
                <h3><!--Récupérer auteur et date--></h3>
                <p>
                    <!--Récupérer contenu du comm-->
                    <br />
                </p>
                <div>
                    <a href="ajouter php pour signaler"><img src="/images/signaler.png" class="signaler" alt="signaler"/>Signaler</a>
                </div>
                <br />
            </div>
        </div>
    </div>
</article>
<?php require_once('portions/footer.php'); ?>


