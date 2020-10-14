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