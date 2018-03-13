@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection



@section('content')
	
	
		<div class="row">
			<div class="span9">
				<div class="content">

				<div class="module">

					<div class="module-head">
						<h3>Todos os Usuários do Sistema</h3>
					</div>

					<div class="module-body">

						<div class="module">
							
							<div class="module-head">
								<h3>Tabela de Usuários</h3>
							</div>
							
								<div class="module-body table">								
								
								 <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Status</th>
											<th>Nivel</th>
											<th>Departamento</th>
											<th>Nome</th>
											<th>Email</th>
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($user_list as $list)
											<tr id="_user_id">
												<td>{{$list->id}}</td>
												<td>
													@foreach($user_status as $status)
														@if($list->status_codestatus == $status->codeStatus)
															{{$status->nameStatus}}
														@endif
													@endforeach
												</td>
												<td>
													@foreach($user_nivel as $nivel)
														@if($list->nivel_idnivel == $nivel->idNivel)
															{{$nivel->nameNivel}}
														@endif
													@endforeach
												</td>
												<td>
													@foreach($user_department as $department)
														@if($list->department_iddepartment == $department->idDepartment)
															{{$department->nameDepartment}}
														@endif
													@endforeach
												</td>
												<td>{{$list->name}}</td>
												<td>{{$list->email}}</td>
												<td>
													<a href="{{url('/user-show/')}}{{'/'.$list->id}}" class="btn btn-primary">Editar</a>&nbsp;
													<a href="#" onClick="delUser('{{$list->id}}')" class="btn btn-danger">Excluir</a>
												</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Status</th>
											<th>Nivel</th>
											<th>Departamento</th>
											<th>Nome</th>
											<th>Email</th>
											<th>Ação</th>
										</tr>
									</tfoot>
								</table>							
								</div>
						</div>

					</div>
				</div>
			</div>

		</div>

	</div>
<script>
function delUser($id)
{
	if (confirm("Deseja realmente excluir este produto?") == true) {
		$url = $(location).attr('href');
		var str = $url.replace("user-list", "user-del");
		var str2 = str.replace("#","");
		var newUrl1 = str2+"/"+$id;
		window.location.replace(newUrl1);
	}
}
</script>
@stop