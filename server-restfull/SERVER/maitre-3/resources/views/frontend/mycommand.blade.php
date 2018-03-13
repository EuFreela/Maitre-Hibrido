@extends('templates.frontend')

@section('title') Maitre @endsection
@section('caption') Maitre @endsection

@section('caption-header') Um restaurante versátil e inovador @endsection
@section('sub-caption') Especialidades da casa @endsection

@section('content')


    <section id="menu-list" class="section-padding">
        <div class="container">

	        @if( Session::has('flash_msg') )
		        <div class="alert alert-warning alert-dismissible" role="alert">
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_msg') }}</div>
	     	@endif
			
			<span id="resp"></span>
            
            <div class="row">
               
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Minha Comanda</h1>
                    <p class="header-p">Abaixo esta a relação de pedidos. </p>
                </div>

            </div>

			
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Minha Comanda - Itens</div>

			  <!-- Table -->
			  <table class="table">
			  	<tr>
			  		<td>Pedido</td>
			  		<td>Valor</td>			  		
			  		<td>Quantidade</td>			  		
			  		<td>Total</td>
			  		<td>Status</td>
			  		<td>Tempo Aproximado</td>
			  		<td>Ação</td>
			  	</tr>
		  		@foreach( $mycommand as $command  )
					<tr>
						<td>{{$command->titleMenu}}</td>
						<td>{{$command->price}}</td>	
						<td>{{$command->amount}}</td>
						<td>{{$command->price*$command->amount}}</td>											
						<td>
							@if( $command->status == 3 )
								<span class="label label-danger">{{$command->nameStatus}}</span>
							@elseif( $command->status == 4 ) 
								<span class="label label-warning">{{$command->nameStatus}}</span>
							@elseif( $command->status == 5 )
								<span class="label label-success">{{$command->nameStatus}}</span>
							@endif
						</td>
						<td>{{$command->setup_time}}</td>
						<td>
							@if( $command->status == 3 )
								<button class="btn btn-danger" onclick="remove('{{$command->idCommand}}')">Excluir</button>
							@else
								---
							@endif
						</td>
					</tr>
		  		@endforeach
			  </table>
			</div>

						
			@if( DB::table('command')->where('table_token',$token)->where('status','<',5)->first() )
				<button class="btn btn-success" onclick="send()">Finalizar Pedido</button>			
				<button class="btn btn-danger" onclick="erase()">Cancelar Comanda</button>
			@else
				<h4>Aguarde enquanto seu pedido esta a caminho... </h4>
			@endif
			<a href="{{route('fr-home')}}" class="btn btn-primary">Retornar</a>
			
        </div>
    </section>

	
<script>
/*
| APAGAR
*/
function remove($id)
{
  if (confirm("Deseja realmente excluir este item?") == true) {

  	$url = "{{url('/command-del/')}}"+"/"+$id+"/"+"{{$token}}";
   	window.location.assign($url);

  }  
}
function send()
{  
  	$url = "{{url('/command-send/')}}"+"/"+"{{$token}}";
   	window.location.assign($url);
}
</script>
@stop