@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection


@section('content')

<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Lista de Pedidos</h3>
			</div>

			<div class="module-body">


			<div class="module">
							
							<div class="module-head">
								<h3>Pedidos</h3>
							</div>
							
								<div class="module-body table">

									<div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr class="odd gradeX">
											<th>#</th>
											<th>Pedido</th>
											<th>Quantidade</th>
											<th>Mesa</th>
											<th>Status</th>
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($command_list as $command)
											<tr>
												<td>{{$command->idCommand}}</td>
												<td>{{$command->titleMenu}}</td>
												<td>{{$command->amount}}</td>
												<td>{{$command->table}}</td>
												<td>
												@if( $command->status == 3 )
													<span class="label label-danger">{{$command->nameStatus}}</span>
												@elseif( $command->status == 4 ) 
													<span class="label label-warning">{{$command->nameStatus}}</span>
												@elseif( $command->status == 5 )
													<span class="label label-success">{{$command->nameStatus}}</span>
												@endif
												<td>
													<button class="btn btn-success" onclick="send('{{$command->idCommand}}','{{$command->table_token}}')">Finalizar</buton>
												</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Pedido</th>
											<th>Quantidade</th>
											<th>Mesa</th>
											<th>Status</th>
											<th>Ação</th>
										</tr>
									</tfoot>
								</table>							
								</div>
						</div>




			</div><!-- body -->

		</div>
		</div>
	</div>
	</div>
<script>
function send($id,$token)
{  
  	$url = "{{url('/kitchen-order/')}}"+"/"+$id+"/"+$token;
   	window.location.assign($url);
}	
</script>
@stop