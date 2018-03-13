@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Lista de Menu</h3>
			</div>

			<div class="module-body">

						<div class="module">
							
							<div class="module-head">
								<h3>Menus</h3>
							</div>
							
								<div class="module-body table">

									<div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Nome</th>
											<th>Items</th>
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>
											
											@foreach($menu_list_unique as $menu)
											<tr>
												<td>{{$menu->codeMenu}}</td>
												<td>{{$menu->titleMenu}}</td>
												<td>{{$menu->description}}</td>												
												<td>
													<p><a href="{{route('ds-menu-show',$menu->codeMenu)}}" class="btn btn-primary">Editar&nbsp;</a></p>
													<a href="#" onClick="delUser('{{$menu->codeMenu}}')" class="btn btn-danger">Excluir</a>
												</td>
												
											</tr>
											@endforeach

									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Nome</th>
											<th>Items</th>
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
	if (confirm("Deseja realmente excluir eesta categoria?") == true) {
		$url = $(location).attr('href');
		var str = $url.replace("menu-list", "menu-del");
		var str2 = str.replace("#","");
		var newUrl1 = str2+"/"+$id;
		window.location.replace(newUrl1);
	}
}
</script>
@stop
