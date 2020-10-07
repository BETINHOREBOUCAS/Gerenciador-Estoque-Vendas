<?php $render('header', ['usuario' => $usuario]); ?>

<div class="info">

    <div class="resp">
        <div class="saldo">
            <div class="text">
                <div class="desc">Saldo Disponível</div>
                <div class="resul">R$ 100,00</div>
            </div>
            <div class="icons" id="icon1">
                <i class="fas fa-wallet"></i>
            </div>
        </div>

        <div class="liberar">

            <div class="text">
                <div class="desc">Saldo à Receber</div>
                <div class="resul">R$ 10.000,00</div>
            </div>
            <div class="icons" id="icon2">
                <i class="fas fa-hand-holding-usd"></i>
            </div>
        </div>
    </div>

    <div class="resp">
        <div class="despesas">

            <div class="text">
                <div class="desc">Despesas</div>
                <div class="resul">R$ 10.100,00</div>
            </div>
            <div class="icons" id="icon3">
                <i class="fas fa-arrow-circle-down"></i>
            </div>
        </div>

        <div class="vendas">

            <div class="text">
                <div class="desc">Vendas no Mês</div>
                <div class="resul">10</div>
            </div>
            <div class="icons" id="icon3">
                <i class="fas fa-chart-bar"></i>
            </div>
        </div>
    </div>

</div>

<div class="detalhes">
    <div class="ult_vendas">
        <div class="desc">Últimas Vendas</div>
        <div class="table">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="ult_pagamentos">
        <div class="desc">Últimos Pagamentos</div>
        <div class="table">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                    <tr>
                        <td>Betinho</td>
                        <td>R$ 100,00</td>
                    </tr>
                    <tr>
                        <td>Nikaele</td>
                        <td>R$ 200,00</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>

<?php $render('footer'); ?>