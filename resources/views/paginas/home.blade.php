@extends('templates.base')

@section('titulo', 'Home')

@section('css')
	@parent

	<style>
		body {
			padding-top: 50px;
			padding-bottom: 20px;
		}
	</style>
@endsection

@section('conteudo')
	<h1>Hello, world!</h1>
	<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
	<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
@endsection

@section('js')
	@parent

	<script>
		$(document).ready(function () {
			console.log("Carregado");
			alert("teste");
		})
	</script>
@endsection
