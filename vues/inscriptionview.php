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
       <div class="col-lg-8 col-md-10 mx-auto" id="formulaireinscription">
                <h2>S'inscrire !</h2>
                <span><em>Si vous avez déjà un compte, cliquez <a href="index.php?action=connexion" id="ici">ICI</a> afin d'accéder à la page de connexion</em></span>

                <form action="index.php?action=addUser" method="post">
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
                            <label for="checkpassword">Confirmation du mot de passe</label>
                            <br />
                            <input type="password" id="checkpassword" name="checkpassword" />
                        </div>
                        <br/>
                        <div>
                            <input type="submit" value="Inscription" name="inscription" />
                        </div>
                </form>
        </div>
    </div>
</div>

<?php require_once('portions/footer.php'); ?>