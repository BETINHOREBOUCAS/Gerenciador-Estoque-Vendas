<form method="get" id="atividade" config="editar">
    <label for="atividade">Editar Atividade:</label><br>
    <select name="atividades" id="atividades" class="form-control">
        <option value=""></option>
        <?php foreach($dados as $value):?>
            <option value="<?=$value['id'];?>"><?=$value['atividade'];?></option>
        <?php endforeach ?>
    </select>

    <label for="">Para:</label>
    <input type="text" name="novaAtividade" id="novaAtividade" class="form-control">


    <input type="submit" value="Editar" class="btn btn-success">

</form>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>