@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Lista de Produtos</h3>
			</div>

			<div class="module-body">


			<div class="module">
							
							<div class="module-head">
								<h3>Produtos</h3>
							</div>
							
								<div class="module-body table">

									
								<div class="module-body table">
                                    <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                                        width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Estoque</th>
											<th>Nome</th>
											<th>Categoria</th>
											<th>Imagem</th>									
											<th>Ação</th>
										</tr>
									</thead>
									<tbody>										
										@foreach($prod_list as $prod)
											<tr>
												<td>{{$prod->idProduct}}</td>
												<td>{{$prod->codeProduct}}</td>
												<td>{{$prod->stockProduct}}</td>
												<td>{{$prod->nameProduct}}</td>
												<td>
												@foreach($cate_list as $cate)
													@if($cate->codeCategory == $prod->category_codeCategory)
														{{$cate->nameCategory}}
													@endif
												@endforeach
												</td>
												<td><img src="{{$path_img.$prod->img.'.jpg'}}" width="75" height="75"></td>		
												<td>
													<a href="{{url('/product-show/')}}{{'/'.$prod->idProduct}}" class="btn btn-primary">Editar</a>&nbsp;
													<a href="#" onClick="delUser('{{$prod->idProduct}}')" class="btn btn-danger">Excluir</a>
												</td>
											</tr>
										@endforeach										
									</tbody>
									<tfoot>
										<tr>
											<th>#</th>
											<th>Code</th>
											<th>Estoque</th>
											<th>Nome</th>
											<th>Categoria</th>											
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
	if (confirm("Deseja realmente excluir este produto?") == true) {
		$url = $(location).attr('href');
		var str = $url.replace("product-list", "product-del");
		var str2 = str.replace("#","");
		var newUrl1 = str2+"/"+$id;
		window.location.replace(newUrl1);
	}
}
</script>
@stop
