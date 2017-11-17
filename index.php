<?php include 'cabecalho.php'; ?>

<h1>Olá Mundo, Bem Vindo a Leoves'Store!</h1>

<div class="row">
    <div class="offset-md-4 col-md-4">
        <div class="card text-center">
            <div class="card-header">
                <h2>Login</h2>
            </div>

            <div class="card-body">
                <?php if (isset($_GET["login"]) && $_GET["login"]==true) : ?>
                <p class="alert-success text-center">Logado com sucesso!</p>
                <?php endif ?>

                <?php if (isset($_GET["login"]) && $_GET["login"]==false) : ?>
                <p class="alert-danger text-center">Usuário ou senha inválido!</p>
                <?php endif ?>

                <form action="login.php" method="post">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email...">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Password...">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'rodape.php'; ?>
