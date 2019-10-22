<?php require_once('portions/head.php'); ?>
<?php require_once('portions/navigation.php'); ?>


<header class="masthead" style="background-image: url('/img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1>Inscription / Connexion</h1>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="container">
    <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto" id="formulaireconnexion">
                <h2>Se connecter !</h2>
                <span><em>Si vous n'avez pas de compte, cliquez <a href="index.php?action=newUser" id="ici">ICI</a> afin d'accéder au formulaire d'inscirption</em></span>

                <form action="index.php?action=checkconnexion" method="post">
                </br>
                        <div>
                            <label for="username">Pseudo</label>
                            <br />
                            <input type="text" id="username" name="username" />
                        </div>
                        <br/>
                        <div>
                            <label for="password">Mot de Passe</label>
                            <br />
                            <input type="password" id="password" name="password" />
                        </div>
                        <br/>
                        <div>
                            <input type="submit" value="Connexion" name="connexion" />
                        </div>
                </form>
        </div>
    </div>
</div>

<?php require_once('portions/footer.php'); ?>