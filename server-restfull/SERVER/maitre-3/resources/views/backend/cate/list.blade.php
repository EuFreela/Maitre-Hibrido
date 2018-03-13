@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Lista de Categorias</h3>
			</div>

			<div class="module-body">


			<div class="module">
							
							<div class="module-head">
								<h3>Categorias</h3>
							</div>
							
								<div class="module-body table">

									<div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Nome</th>
											<th>Imagem</th>
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($cate_list as $cate)
											<tr>
												<td>{{$cate->idCategory}}</td>
												<td>{{$cate->codeCategory}}</td>
												<td>{{$cate->nameCategory}}</td>
												<td>
												@if($cate->img)
												<img src='{{asset($path_img.$cate->img.".jpg")}}' width="75" height="75">
												@else
												Não há imagem
												@endif
												</td>
												<td>
													<a href="{{url('/category-show/')}}{{'/'.$cate->idCategory}}" class="btn btn-primary">Editar</a>&nbsp;
													<a href="#" onClick="delUser('{{$cate->idCategory}}')" class="btn btn-danger">Excluir</a>
												</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Nome</th>
											<th>Imagem</th>
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
		var str = $url.replace("category-list", "category-del");
		var str2 = str.replace("#","");
		var newUrl1 = str2+"/"+$id;
		window.location.replace(newUrl1);
	}
}
</script>
@stop
