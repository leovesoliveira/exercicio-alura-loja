<?php
include 'cabecalho.php';
include 'logica-usuario.php';
?>

<h1>Olá Mundo, Bem Vindo a Leoves'Store!</h1>

<?php if (usuarioEstaLogado()) { ?>
<div class="alert alert-dark text-center" role="alert">
    Você está logado com <strong><?= usuarioLogado() ?></strong>
    | <a class="alert-link" href="logout.php">Sair</a>
</div>
<?php } else { ?>

<div class="row">
    <div class="offset-md-4 col-md-4">
        <div class="card text-center">
            <div class="card-header">
                <h2>Login</h2>
            </div>

            <div class="card-body">


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
<?php } ?>

<?php include 'rodape.php'; ?>
