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
