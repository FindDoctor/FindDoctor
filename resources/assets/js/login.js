$('#tipo').change(function () {
	if ($("select option:selected").val() == 0)
		$('#loginForm').attr('action', baseUrl + "/login");
	else
		$('#loginForm').attr('action', baseUrl + "/medico/login");
});
