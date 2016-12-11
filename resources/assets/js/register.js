$(document).ready(function(){
   $('#cpf_input').mask('000.000.000-00', {reverse: true});
   $('#cep').mask('00000-000');
});

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

$('#cep').focusout(function () {
	//Nova variável "cep" somente com dígitos.
    var cep = $('#cep').val().replace(/\D/g, '');

	//Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $('#endereco').val("...");
            $('#bairro').val("...");
            $('#cidade').val("...");
            $('#estado').val("...");

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=cep_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        }
        else {
            //cep é inválido.
			$('#endereco').val("");
            $('#bairro').val("");
            $('#cidade').val("");
            $('#estado').val("");
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
		//cep é inválido.
		$('#endereco').val("");
		$('#bairro').val("");
		$('#cidade').val("");
		$('#estado').val("");
    }
});


if($("#consultorios-list").children().length >= 5){
	$("#consultorios-btn").hide();
}


$('#btn-add').click(function(){
	$('#li_novo_consultorio').show();
	$(this).hide();
});
