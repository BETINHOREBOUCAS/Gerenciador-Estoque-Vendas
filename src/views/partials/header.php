<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/dashboard.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/all.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/estoque.css">
    <link rel="stylesheet" href="<?= $base; ?>/assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="barra_menu">
        <div class="dados">
            <div class="name">Betinho Rebouças</div>
            <div class="img"><i class="fas fa-user-circle"></i></div>
        </div>

    </div>
    <div class="dash">
        <div class="opacity"></div>
        <div class="logo">
            <i class="fas fa-cubes"></i> Meu Estoque
        </div>
        <hr>
        <div class="dash_menu">
            <a href="<?= $base; ?>/">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-home"></i></div>
                    <div class="texto">Painel</div>
                </div>
            </a>
            <a href="<?= $base; ?>/clientes">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-user-tag"></i></div>
                    <div class="texto">Clientes</div>
                </div>
            </a>
            <a href="<?= $base; ?>/estoque">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-box-open"></i></div>
                    <div class="texto">Estoque</div>
                </div>
            </a>
            <a href="<?= $base; ?>/producao">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-pencil-ruler"></i></i></div>
                    <div class="texto">Produção</div>
                </div>
            </a>
            <a href="<?= $base; ?>/vendas">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                    <div class="texto">Vendas</div>
                </div>
            </a>
            <a href="<?= $base; ?>/colaboradores">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <div class="texto">Colaboradores</div>
                </div>
            </a>
            <a href="<?= $base; ?>/">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    <div class="texto">Financeiro</div>
                </div>
            </a>
            <a href="<?= $base; ?>/">
                <div class="dash_sub_menu">
                    <div class="icon"><i class="fas fa-sign-out-alt"></i></div>
                    <div class="texto">Sair</div>
                </div>
            </a>
        </div>
    </div>