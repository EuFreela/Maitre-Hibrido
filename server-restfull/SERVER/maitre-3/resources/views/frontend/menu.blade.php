@extends('templates.frontend')

@section('title') Maitre @endsection
@section('caption') Maitre @endsection

@section('caption-header') Um restaurante versátil e inovador @endsection
@section('sub-caption') Especialidades da casa @endsection

@section('menu')
    
    @if( $token )
    <input type="hidden" value="" id="token">
    @endif

    <input type="hidden" id="amount_global" name="amount_global" value="" />
  	<!-- menu -->    
    <section id="menu-list" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center marb-35">
                    <h1 class="header-h">Cardápio</h1>
                    <p class="header-p">Clique em alguma categoria e veja os produtos relacionados. </p>
                </div>
                <div class="col-md-12  text-center gallery-trigger">
                    <ul>
                        <li><a class="filter" data-filter="all" onClick="hidden()">Todos</a></li>
                        <li><a class="filter" data-filter=".category-1">Refeições</a></li>
                        <li><a class="filter" data-filter=".category-2">Lanches</a></li>
                        <li><a class="filter" data-filter=".category-3">Bebida</a></li>                        
                    </ul>
                     @if( Session::has('flash_msg') )
                    <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_msg') }}</div>
                     @endif
                     @if( Session::has('flash_msg_success') )
                        <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_msg_success') }}</div>
                     @endif
                     <span id="resp"></span>
                </div>
                

                <div id="Container">                   
             
                    @if($menu_list)
    
			          @foreach($menu_list as $mmc)   
			          @if($mmc->menucategory_code == 1) 
			          <div class="mix category-1 menu-restaurant" data-myorder="2">
			              <span class="clearfix">
			                 <a class="menu-title">{{$mmc->titleMenu}}</a>
			                <span style="left: 166px; right: 44px;" class="menu-line"></span>           
			                <span class="menu-price">R${{$mmc->amount}}</span>
			              </span>
			            <span class="menu-subtitle">{{$mmc->description}}</span><br>
			            <!--<img src="{{asset('templates/delicious/img/res01.jpg')}}" width="100" height="100">-->
			            Quantidade <input type="number" min="0" step="1" name="amount" id="amount" style="width:40px;font-size: 15px;" onchange="globalAmount(this)">&nbsp;<button class="btn btn-warning" onClick="Add('{{$mmc->codeMenu}}',$('#amount_global').val())">ADD <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
			          </div>
			          @endif
			          @endforeach
			      

			          @foreach($menu_list as $mmc)   
			          @if($mmc->menucategory_code == 2)                 
			          <div class="mix category-2 menu-restaurant" data-myorder="2">
			              <span class="clearfix">
			              <a class="menu-title">{{$mmc->titleMenu}}</a>                
			                <span style="left: 166px; right: 44px;" class="menu-line"></span>
			                <span class="menu-price">R${{$mmc->amount}}</span>
			              </span>
			            <span class="menu-subtitle">{{$mmc->description}}</span><br>
			            Quantidade <input type="number" min="0" step="1" name="amount" id="amount" style="width:40px;font-size: 15px;" onchange="globalAmount(this)">&nbsp;<button class="btn btn-warning" onClick="Add('{{$mmc->codeMenu}}',$('#amount_global').val())">ADD <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
			          </div>
			          @endif
			          @endforeach

			          @foreach($menu_list as $mmc)   
			          @if($mmc->menucategory_code == 3)
			          <div class="mix category-3 menu-restaurant" data-myorder="2">
			              <span class="clearfix">
			               <a class="menu-title">{{$mmc->titleMenu}}</a>
			                <span style="left: 166px; right: 44px;" class="menu-line"></span>
			                <span class="menu-price">R${{$mmc->amount}}</span>
			              </span>
			            <span class="menu-subtitle">{{$mmc->description}}</span><br>
			            Quantidade <input type="number" min="1" step="1" name="amount" id="amount" style="width:40px;font-size: 15px;" onchange="globalAmount(this)">&nbsp;<button class="btn btn-warning" onClick="Add('{{$mmc->codeMenu}}',$('#amount_global').val())">ADD <i class="fa fa-cart-plus" aria-hidden="true"></i></button>            
			          </div>
			          @endif
			          @endforeach
			          
			      @endif
                  

                </div>

            </div>
        </div>
    </section>
    <!--/ menu -->


<script>
	
/*
| ADICIONAR PEDIDOS NA COMANDA
*/
 function Add($codeMenu,$amount){
    

    if( !$amount )	$amount = "1";
    $url = "{{url('/command-add/')}}"+"/"+$codeMenu+"/"+$amount+"/"+$('#token').val();
    
    $.ajax({

        headers: 
        {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        
        type    :"GET",
        
        url     :$url,
        
        success :function(response) {
          $resp = '<div class="alert alert-success alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span></button>Sucesso! O item foi adicionado em sua comanda.</div>';
          $('#resp').append($resp);
        
        },
        error: function (e)  {
          $resp = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                        '<span aria-hidden="true">&times;</span></button>Erro! Não foi possível adicionar o item em sua comanda. Talvez precise reservar uma mesa.</div>';
          $('#resp').append($resp);
        }
        
    });


    $('#amount_global').val('');

 }
//-------------------------------

function globalAmount($obj){
    document.getElementById('amount_global').value = $obj.value;
}

</script>
    
@stop