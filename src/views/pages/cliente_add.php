<?php $render('header'); ?>

<div class="form">
<div class="title">Dados Pessoais</div>
<hr>
<?php if (!empty($flash)) : ?>
<div class="msg msgDanger"><?=$flash;?></div>
<?php endif ?>
    <form method="post">

    <div class="caixa">
            <div>
                <label for="nome">Nome:</label> <br>
                <input type="text" name="nome" id="nome" class="form-control"> 
            </div>
            <div>
                <label for="endereco">Endereco:</label><br>
                <input type="text" name="endereco" id="endereco" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="estado">Estado:</label> <br>
                <input type="text" name="estado" id="estado" class="form-control"> 
            </div>
            <div>
                <label for="cidade">Cidade:</label><br>
                <input type="text" name="cidade" id="cidade" class="form-control"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="tel1">Celular1:</label> <br>
                <input type="text" name="tel1" id="tel1" class="form-control"> 
            </div>
            <div>
                <label for="tel2">Celular2:</label><br>
                <input type="text" name="tel2" id="tel2" class="form-control"> 
            </div>
        </div>

        <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>

    </form>
</div>

<?php $render('footer'); ?>