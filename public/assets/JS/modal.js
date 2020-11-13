$(function(){
	
	//Ao clicar
	$('.modal_ajax').on('click', function(e){
		e.preventDefault();
		var info = $(this).attr('info');
		$('.titulo').html('<h3>'+info+'</h3>');
		$('.modal_bg').show();
		var link = $(this).attr('href');		
		
		$.ajax({
			url:link,
			type:'GET',
			success:function(html){
				//Vai adicionar dentro do modal
				$('.body').html(html);
			}
		});
	});
});

function fecharModal() {
	$('.modal_bg').hide();
}

$('#delete').bind('mouseover', function(){   
	$('#delete').attr("src", "assets/imagens/delete.gif");
});

$('#add').bind('mouseover', function(){   
	$('#add').attr("src", "assets/imagens/add.gif");
});

$('#edit').bind('mouseover', function(){   
	$('#edit').attr("src", "assets/imagens/edit.gif");
});