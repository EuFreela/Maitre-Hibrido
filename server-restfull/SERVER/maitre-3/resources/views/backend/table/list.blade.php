@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Lista de Mesas Cadastradas</h3>
			</div>

			<div class="module-body">


			<div class="module">
							
							<div class="module-head">
								<h3>Mesas</h3>
							</div>
							
								<div class="module-body table">
																	

								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Status</th>
											<th>token</th>
											<th>qrcode</th>							
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($table_list as $tb)
											<tr>
												<td>{{$tb->idTable}}</td>
												<td>{{$tb->codeTable}}</td>
												<td>{{$tb->statusname}}</td>												
												<td>{{substr($tb->token,-15)}}...</td>												
												<td>
													<img src="{{$path.$tb->img.'.jpg'}}" width="75" height="75">
												</td>		
												<td>
													<a href="{{url('/table-show/').'/'.$tb->idTable}}" class="btn btn-success">Editar</a>
													<a href="{{url('/table-reserve/').'/'.$tb->token}}" class="btn btn-primary">Reservar/Liberar</a>													<a href="#" onClick="delUser('{{$tb->idTable}}')" class="btn btn-danger">Excluir</a>
												</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Status</th>
											<th>token</th>
											<th>qrcode</th>							
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
function delUser($id)
{
	if (confirm("Deseja realmente excluir esta tabela?") == true) {
		$url = $(location).attr('href');
		var str = $url.replace("table-list", "table-del");
		var str2 = str.replace("#","");
		var newUrl1 = str2+"/"+$id;
		window.location.replace(newUrl1);
	}
}
</script>
@stop
