<?php $render('header', ['usuario' => $usuario]); ?>

<div class="form">
<div class="title">Editar Colaborador</div>
<hr>
<?php if (!empty($flash)) : ?>
<div class="msg msgSuccess"><?=$flash;?></div>
<?php endif ?>
    <form method="post">

    <div class="caixa">
            <div>
                <label for="nome">Nome:</label> <br>
                <input type="text" name="nome" id="nome" class="form-control" value="<?=$colaborador['nome'];?>"> 
            </div>
            <div>
                <label for="endereco">Endereco:</label><br>
                <input type="text" name="endereco" id="endereco" class="form-control" value="<?=$colaborador['endereco'];?>"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="funcao">Função:</label> <br>
                
                <select name="funcao" id="funcao" class="form-control" style="width: 100%">
                    <option value=""></option>
                   <?php foreach ($atividades as $value) : ?> 
                    <option value="<?=$value['atividade'];?>" <?= $value['atividade'] == $colaborador['funcao']?"selected":""?>><?=$value['atividade'];?></option>
                    <?php endforeach ?>
                </select>
                
            </div>
            <div>
                <label for="status">Status:</label><br>
                <select name="status" id="status" class="form-control">
                    <option value="Ativo" <?=$colaborador['status'] == 'Ativo'?'selected':'';?>>Ativo</option>
                    <option value="Inativo" <?=$colaborador['status'] == 'Inativo'?'selected':'';?>>Inativo</option>
                </select>
            </div>
            <div>
                <label for="preco">Preço Combinado:</label><br>
                <input type="text" name="preco" id="preco" class="form-control" value="<?=$colaborador['preco'];?>"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="tel1">Celular1:</label> <br>
                <input type="text" name="tel1" id="tel1" class="form-control" value="<?=$colaborador['telefone1'];?>"> 
            </div>
            <div>
                <label for="tel2">Celular2:</label><br>
                <input type="text" name="tel2" id="tel2" class="form-control" value="<?=$colaborador['telefone2'];?>"> 
            </div>
        </div>

        <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>

    </form>
</div>

<?php $render('footer'); ?>