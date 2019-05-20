@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading" style="color:#A4A4A4;"><h4>Categoría&nbsp;&nbsp;<b> > </b>&nbsp;&nbsp;Ayuda&nbsp;&nbsp;<b> > </b>&nbsp;&nbsp;Colombia</h4></div>
			<div class="panel-body">
				
                  
                 
				<div class="result-colombia">
					<h1>What is Lorem Ipsum?</h1><br><br>
				<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha</h5><br>

				<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha</h5><br>

				<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha</h5><br>
				    <a href="{{ url('/') }}"><img src="images/icon/logo.png" width="20%" ></a>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
@include('content.categorias')
@include('content.footer')
@endsection