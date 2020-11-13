<form method="get" id="atividade" config="excluir">
    <label for="atividade">Excluir Atividade:</label><br>
    <select name="atividades" id="atividades" class="form-control">
        <option value=""></option>
        <?php foreach($dados as $value):?>
            <option value="<?=$value['id'];?>"><?=$value['atividade'];?></option>
        <?php endforeach ?>
    </select>

    <input type="submit" value="Excluir" class="btn btn-success">

</form>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>