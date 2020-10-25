<?php $render('header', ['usuario' => $usuario]); ?>

<div class="form">
<div class="title">Adicionar Produto</div>
<hr>
<?php if (!empty($flash)) : ?>
<div class="msg msgSuccess"><?=$flash;?></div>
<?php endif ?>
    <form method="post">

    <div class="caixa">
            <div>
                <label for="nome">Nome:</label> <br>
                <input type="text" name="nome" id="nome" class="form-control" value="<?=$produtos['nome'];?>"> 
            </div>
            <div>
                <label for="cor">Cor:</label><br>
                <input type="text" name="cor" id="cor" class="form-control" value="<?=$produtos['cor'];?>"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="tamanho">Tamanho:</label> <br>
                
                <select name="tamanho" id="tamanho" class="form-control" style="width: 100%;">
                    <option value=""></option>
                    <option value="Extra Pequena" <?=$produtos['tamanho'] == 'Extra pequena'?'selected':'';?>>Extra Pequena</option>
                    <option value="Pequena" <?=$produtos['tamanho'] == 'Pequena'?'selected':'';?>>Pequena</option>
                    <option value="Média" <?=$produtos['tamanho'] == 'Média'?'selected':'';?>>Média</option>
                    <option value="Grande" <?=$produtos['tamanho'] == 'Grande'?'selected':'';?>>Grande</option>
                    <option value="Extra Grande" <?=$produtos['tamanho'] == 'Extra grande'?'selected':'';?>>Extra Grande</option>
                    <option value="Gigante" <?=$produtos['tamanho'] == 'Gigante'?'selected':'';?>>Gigante</option>
                </select>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label><br>
                <input type="text" name="quantidade" id="quantidade" class="form-control" value="<?=$produtos['quantidade'];?>"> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="preco">Preço:</label> <br>
                <input type="text" name="preco" id="preco" class="form-control" value="<?=$produtos['preco'];?>"> 
            </div>
            <div>
                <label for="varanda">Varanda:</label><br>
                <select name="varanda" id="varanda" class="form-control">
                    <option value=""></option>
                    <option value="6 rosas" <?=$produtos['varanda'] == '6 rosas'?'selected':'';?>>6 Rosas</option>
                    <option value="3 pano" <?=$produtos['varanda'] == '3 pano'?'selected':'';?>>3 Pano</option>
                    <option value="duplex" <?=$produtos['varanda'] == 'duplex'?'selected':'';?>>Duplex</option>
                </select>              
                
            </div>
            <div>
                <label for="corda">Punho:</label><br>
                <select name="punho" id="punho" class="form-control">
                    <option value=""></option>
                    <option value="Corda" <?=$produtos['punho'] == 'Corda'?'selected':'';?>>Corda</option>
                    <option value="Trancelim" <?=$produtos['punho'] == 'Trancelim'?'selected':'';?>>Trancelim</option>
                </select> 
            </div>
        </div>

        <div class="caixa">
            <div>
                <label for="acabamento">Acabamento:</label> <br> 
                <select name="acabamento" id="acabamento" class="form-control">
                    <option value=""></option>
                    <option value="tranca" <?=$produtos['acabamento'] == 'tranca'?'selected':'';?>>Trança</option>
                    <option value="bainha" <?=$produtos['acabamento'] == 'bainha'?'selected':'';?>>Bainha</option>
                    <option value="1 grade" <?=$produtos['acabamento'] == '1 grade'?'selected':'';?>>1 Grade</option>
                    <option value="2 grade" <?=$produtos['acabamento'] == '2 grade'?'selected':'';?>>2 Grade</option>
                </select>
            </div>
            
            <div>
                <label for="comprimento">Comprimento:</label> <br>
                <input type="text" name="comprimento" id="comprimento" class="form-control" value="<?=$produtos['comprimento'];?>"> 
            </div>
            <div>
                <label for="largura">Largura:</label><br>
                <input type="text" name="largura" id="largura" class="form-control" value="<?=$produtos['largura'];?>"> 
            </div>
            <div>
                <label for="peso">Peso:</label><br>
                <input type="text" name="peso" id="peso" class="form-control" value="<?=$produtos['peso'];?>"> 
            </div>
        </div>

        <div class="caixa"><input type="submit" value="Salvar" class="btn btn-success"></div>

    </form>
</div>

<?php $render('footer'); ?>