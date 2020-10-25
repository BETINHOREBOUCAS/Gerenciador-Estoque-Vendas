$('#form').bind('submit', function(e){
    e.preventDefault();

    var ordem = $('#ordem').val();
    console.log(ordem);

    $.ajax({
        type: 'GET',
        url: '../../ordem/cancelar/action/'+ordem,
        
        success:function(html){
            $('.modal_bg').hide();
            window.location.reload();
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#form_del').bind('submit', function(e){
    e.preventDefault();

    var id = $('#ordem').val();
    console.log(ordem);

    $.ajax({
        type: 'GET',
        url: 'clientes/excluir/action/'+id,
        
        success:function(html){
            $('.modal_bg').hide();
            window.location.reload();
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#form_estoque').bind('submit', function(e){
    e.preventDefault();

    var id = $('#produto').val();
    console.log(id);

    $.ajax({
        type: 'get',
        url: 'estoque/excluir/action/'+id,
        
        success:function(html){
            $('.modal_bg').hide();
            window.location.reload();
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#atividade').bind('submit', function(e){
    e.preventDefault();

    var atividade = $('#atividades').val();
    console.log(atividade);

    $.ajax({
        type: 'POST',
        data: {atividade:atividade},
        url: 'producao/addatividade',
        
        success:function(html){
            $('.modal_bg').hide();
            alert("Atividade "+ atividade + " adicionada com sucesso!");
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#producao').bind('submit', function(e){
    e.preventDefault();
    
    var colaborador = $('#colaborador').val();
    var produto = $('#produto').val();
    var qtd = $('#qtd').val();
    var data = $('#data').val();
    var servico = $('#servico').val();

    $.ajax({
        type: 'POST',
        data: {colaborador:colaborador, produto:produto, qtd:qtd, data:data, servico:servico},
        url: '../producao/addproducao',
        
        success:function(html){
            $('.modal_bg').hide();
            alert("Produto colocado em produção!");
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#pagamento').on('change', function(e){
    e.preventDefault();
    var colaborador = $('#id_colaborador').val();
    var pagamento = $(this).val();
    var ordenar = $('#ordenar').val();
    
    $.ajax({
        type: 'GET',
        data: {colaborador:colaborador, pagamento:pagamento, ordenar:ordenar},
        url: '../producao/detalhes/'+colaborador,
        
        success:function(html){
            $('.body').html(html);
        },
        erro:function(){
            alert("Occoreu um erro")
        }
    })
    
});

$('#ordenar').on('change', function(e){
    e.preventDefault();
    var colaborador = $('#id_colaborador').val();
    var ordenar = $(this).val();
    var pagamento = $('#pagamento').val();

    $.ajax({
        type: 'GET',
        data: {colaborador:colaborador, pagamento:pagamento, ordenar:ordenar},
        url: '../producao/detalhes/'+colaborador,
        
        success:function(html){
            $('.body').html(html);
        },
        erro:function(){
            alert("Occoreu um erro");
        }
    });
    
});

$('.pag').on('click', function(e){
    e.preventDefault();
    var sitPag = $('#pagamento').val();
    var ordenar = $('#ordenar').val();
    var colaborador = $(this).attr('colaborador');

    var sitAtual = $(this).attr('info');
    var idProducao = $(this).attr('info2');
    console.log(idProducao);
    $.ajax({
        type: 'POST',
        data: {sitAtual:sitAtual, idProducao:idProducao, sitPag:sitPag, ordenar:ordenar},
        url: '../producao/detalhes/'+colaborador,

        success:function(html){
            $('.body').html(html);
        },
        erro:function(){
            alert("Occoreu um erro");
        }
    });
});

$('.dataLevada').on('change', function(){
    var dt = $(this).val();
    var idProducao = $(this).attr('info2');

    $.ajax({
        type: 'GET',
        data: {dt:dt, idProducao:idProducao},
        url: '../producao/addData'
    });
});