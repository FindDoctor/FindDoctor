$('#tipoPaciente').click(function () {
	$('#tipoCadastro').hide();
	$('#crm').remove();
	$('#foto').remove();
	$('#formCadastro').attr('action', '/paciente/register').show();
});

$('#tipoMedico').click(function () {
	$('#tipoCadastro').hide();
	$('#cpf').remove();
	$('#formCadastro').attr('action', '/medico/register').show();
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


if($("#consultorios-list").children().length >= 5){
	$("#consultorios-btn").hide();
}


$('#btn-add').click(function(){
	$('#li_novo_consultorio').show();
	$(this).hide();
});

$(document).ready(function(){
   $('#cpf_input').mask('000.000.000-00', {reverse: true});     
});
