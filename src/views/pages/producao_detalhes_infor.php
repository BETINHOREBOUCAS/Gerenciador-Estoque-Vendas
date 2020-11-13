<div class="infor" title="Voltar"><a href="" style="color: lightcoral; font-size:30pt ;"><i class="fas fa-arrow-circle-left"></i></a></div> <br>
<div class="table" style="width: 100%;">
    <?php if (!empty($dados)) : ?>
        <table class="table table-striped table-hover borda" style="text-align: center;">
            <thead>
                <tr style="vertical-align:middle">
                    <th style="vertical-align:middle">Datas do Recolhimento</th>
                    <th style="vertical-align:middle">Quantidade</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($dados as $value) : ?>
                    <?php
                    $dataRecolhida = new DateTime($value['data_recolhimento']);
                    $dataRecolhida = $dataRecolhida->format('d/m/Y');
                    ?>
                    <tr>
                        <td><?= $dataRecolhida; ?></td>
                        <td><?= $value['qtd_recolhido']; ?></td>
                    </tr>

                <?php endforeach ?>
            </tbody>

        </table>

    <?php else : ?>
        <center>
            <div>Nenhuma informação disponivel!</div>
        </center>
    <?php endif ?>
</div>

<script src="<?= $base; ?>/assets/js/acao_modal.js"></script>