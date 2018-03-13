@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection



@section('content')
	
	
		<div class="row">
			<div class="span9">
				<div class="content">

				<div class="module">

					<div class="module-head">
						<h3>API Tokens</h3>
					</div>

					<div class="module-body">

						<div class="module">
							
							<div class="module-head">
								<h3>Tabela de Usuários e seus Respectivos Api Tokens</h3>
							</div>
							
								<div class="module-body table">

									<div class="div-right">
										<label>	Busca: <input type="text" aria-controls="DataTables_Table_0"></label>
									</div>
								
								<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Email</th>
											<th>API Token</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($user_list as $list)
											<tr>
												<td>{{$list->id}}</td>	
												<td>{{$list->email}}</td>
												<td>{{$list->api_token}}</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Email</th>
											<th>API Token</th>
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

	
@stop