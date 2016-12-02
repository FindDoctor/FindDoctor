$('#tipoPaciente').click(function () {
	$('#tipoCadastro').hide();
	$('#crm').remove();
	$('#formCadastro').show();
});

$('#tipoMedico').click(function () {
	$('#tipoCadastro').hide();
	$('#cpf').remove();
	$('#formCadastro').show();
});

$('#alterar_dados_btn').click(function () {
	$('#alterarDados').show();
	$( "input" ).prop( "disabled", false );
	$('#voltar_btn').show();
	$('#alterar_dados_btn').hide();
});

$('#voltar_btn').click(function () {
	$( "input" ).prop( "disabled", true );
	$('#alterarDados').hide();
	$('#voltar_btn').hide();
	$('#alterar_dados_btn').show();
});



var count = 0;

if($("#consultorios-list").children().length >= 5){
	$("#consultorios-btn").hide();
}


$("#consultorios-btn").click(

  function () {

	var novoConsultorio ='<li>'
							+'<div>'
								+'<div class="container panel panel-default" data-toggle="collapse" data-target="#consultorio' + count +'">'
									
									+'<div class="panel-heading">'
										+'<h3 class="panel-title" style="float:left;line-height:34px;"> Novo consultório</h3>'
									+'</div>'
							
									+'<div id="consultorio'+count+'" class="collapse panel-body">'

						   +'<form id="consultorios-form" accept-charset="UTF-8" enctype="multipart/form-data" method="POST">'	
								+'<input id="nome_consultorio" type="hidden" name="consultorio" >'
								+ '<table>'
									+ '<tbody>'
										+ '<tr>'
											+ '<td>'
												+ 'Telefone:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="telefone">'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'CEP:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="cep" >'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'Endereço:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="endereco">'
											+ '</td>'
										+ '</tr>'									

										+ '<tr>'
											+ '<td>'
												+ 'Número:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="numero">'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'Complemento:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="telefone">'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'Bairro:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="bairro">'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'Cidade:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="cidade">'
											+ '</td>'
										+ '</tr>'

										+ '<tr>'
											+ '<td>'
												+ 'Estado:'
											+ '</td>'

											+ '<td>'
												+ '<input type="text" name="estado">'
											+ '</td>'
										+ '</tr>'

									+ '</tbody>'
								+ '</table>'
								+ '<br>'

								+ '<input id="salvarConsultorio" formaction="{{ url(\'/atualizaConsultorio\') }}" type="submit" name="Salvarsubmit" value="Salvar" class="btn consultorio-btn" >'
								+ '<input id="removerConsultorio" formaction="{{ url(\'/removerConsultorio\') }}" type="submit" name="Removersubmit" value="Remover" class="btn consultorio-btn right" >'
							+ '</form>'
						+ '</div>'
					+ '</div>'
				+ '</div>'
			+ '</li>';


     $('#consultorios-list').append(novoConsultorio);
     count++;


	if($("#consultorios-list").children().length >= 5){
		$("#consultorios-btn").hide();
	}


  }
)