@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection

@section('content')
<script>
$(function(){
   // FAZ QUALQUER COISA AQUI
   alert('Foi que nem um tiro...');
});
</script>

	<div class="row">
	<div class="span9">
		<div class="content">
		<div class="module">

			<div class="module-head">
				<h3>Criação do Menu</h3>
			</div>

			<div class="module-body">
			
				<form enctype="multipart/form-data" class="form-horizontal row-fluid" method="POST" action="">
				{{csrf_field()}}					
					
					<input type="hidden" value="{{$menu->codeMenu}}" name="code">

					<div class="control-group">
						<label class="control-label" for="basicinput">Categoria do menu</label>
						<div class="controls">
							<div class="dropdown">												
								<select required class="span8" name="menu_menucategory" id="menu_menucategory">								  
								  @if($menu_menuCategory)
									  @foreach( $menu_menuCategory as $mc )
									  	@if($mc->code == $menu->menucategory_code)
											<option selected value="{{ $mc->code }}">{{ $mc->name }}</option>
										@else
										<option value="{{ $mc->code }}">{{ $mc->name }}</option>
										@endif
									  @endforeach
								  @endif
								</select>
								@if ($errors->has('menu_menucategory'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('menu_menucategory') }}</strong>
		                        </span>
		                   	 	@endif
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="basicinput">Título</label>
						<div class="controls">
							<input type="text" id="basicinput" placeholder="Título do menu" class="span8" name="menu_title" value="{{$menu->titleMenu}}" required minlength="5">
							<span class="help-inline">Mínimo 5 caracteres</span>
							@if ($errors->has('menu_title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('menu_title') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Código do menu</label>
						<div class="controls">
							<input type="text" placeholder="Código" class="span8" name="menu_code" value="{{$menu->codeMenu}}" maxlength="5" required maxlength="5">
							<span class="help-inline">Máximo 5 digitos</span>
							@if ($errors->has('menu_code'))
                            <span class="help-block">
                                <strong>{{ $errors->first('menu_code') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Valor <span class="label label-danger">R$</span></label>
						<div class="controls">
							<input type="text" placeholder="Valor em Reais" class="span8" name="menu_amount" value={{$menu->amount}} required onkeyup="maskCurrent(this)">
							@if ($errors->has('menu_amount'))
                            <span class="help-block">
                                <strong>{{ $errors->first('menu_amount') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Tempo de Preparo</span></label>
						<div class="controls">
							<input type="time" placeholder="Tempo de prepação" class="span8" name="menu_setup_time" value="{{$menu->setup_time}}">
							@if ($errors->has('menu_setup_time'))
                            <span class="help-block">
                                <strong>{{ $errors->first('menu_setup_time') }}</strong>
                            </span>
                       	 	@endif
						</div>									
					</div>
							

					<div class="control-group">
						<label class="control-label" for="basicinput">Categorias</label>
						<div class="controls">
							<div class="dropdown">												
								<select class="span8" id="menu_category" required onchange="AjaxSearchProduct(this)">
								  <option  disabled selected>Selecione uma Categoria</option>
								  @if($join_prod_cate)
									  @foreach( $join_prod_cate as $join )
											<option value="{{ $join->codeCategory }}">{{ $join->nameCategory }}</option>
									  @endforeach
								  @endif
								</select>
								@if ($errors->has('menu_category'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('menu_category') }}</strong>
		                        </span>
		                   	 	@endif
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="basicinput">Produtos 
						<p>							
							<a href="#" class="btn btn-danger" onclick="erase()">Erase</a>
							<a href="#" class="btn btn-success" onclick="ajaxTempMenu()">ADD</a>
						</p></label>						
						<div class="controls">

							<div class="dropdown">
								
								<span id="opProd"></span>
								
								@if ($errors->has('menu_product'))
		                        <span class="help-block">
		                            <strong>{{ $errors->first('menu_product') }}</strong>
		                        </span>
		                   	 	@endif
							</div>
						</div>
					</div>


					<div class="control-group">
						<div class="controls">
							
							<span id="items">								
								@foreach($join_items_menu as $item)										
									<span class="btn btn-default" onclick="delItem(this)">{{$item->nameProduct}}<i class="fa fa-times" aria-hidden="true"></i><input type="hidden" name="menu_items[]" value="{{$item->nameProduct}}" ></span>&nbsp;&nbsp;				
								@endforeach
							</span>

						@if ($errors->has('menu_items'))
                        <span class="help-block">
                            <strong>{{ $errors->first('menu_items') }}</strong>
                        </span>
                   	 	@endif
                   	 	</div>
					</div>

					
					<div class="control-group">
						<label class="control-label" for="basicinput">Descrição do Menu</label>
						<div class="controls">
							<textarea class="span8" rows="5" name="menu_description">{{$menu->description}}</textarea>			
						@if ($errors->has('menu_description'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('menu_description') }}</strong>
	                        </span>
                   	 	@endif
                   	 	</div>
					</div>

					

					
					<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary">Salvar Menu</button>
						<a class="btn btn-warning" href="#" onclick="erase()">Cancelar</a>
					</div>
					</div>

			
				</form>



			</div>

		</div>
		</div>
	</div>
	</div>


<script>
function AjaxSearchProduct($object)
{	
	$url = '{{url("/menu-search/")}}'+"/"+$object.value;
	$r="";
	$.ajax({
		headers: 
		{
	    	'X-CSRF-Token': '{{csrf_field()}}'
	    },
		'url': $url,
		method: 'GET',
		success: function(data){
			$("#opProd").html("");
			$.each(data, function(i, val) {
			 	$r = $r + '<input type="checkbox" id="prod_box[]" value="'+val['nameProduct']+'" "> '+val['nameProduct']+'&nbsp&nbsp';
			});
			$("#opProd").append($r);
		}
	});
}
function ajaxTempMenu()
{		
	$p = '';
	$("input[type=checkbox][id='prod_box[]']:checked").each(function(){
    	$p = $p + '<span class="btn btn-default" onclick="delItem(this)"> '+$(this).val()+' <i class="fa fa-times" aria-hidden="true"></i><input type="hidden" name="menu_items[]" value="'+$(this).val()+'" ></span>&nbsp;&nbsp;';
	});		
	$("#items").append($p);	
}
function delItem($obj)
{
	$obj.remove();
}
function erase()
{	
	if (confirm("Deseja realmente excluir todos os items?") == true) {
		$("#items").html("");
	}
	
}
</script>

@stop
