@extends('templates.front')

@section('title') Maitre @endsection
@section('caption') Maitre @endsection

@section('caption-header') Um restaurante versátil e inovador @endsection
@section('sub-caption') Especialidades da casa @endsection

@section('content')
      
      <input type="hidden" value="pv40jVgG7Pj2oXdsCimlvg0dboCx70flumIRBemnySWSFM3CtSfnwkznZt9q" id="table_token">
      <input type='hidden' value="" id="amount_global">
      
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

      <div class="mix category-4 menu-restaurant" data-myorder="2">

        <span id="respCommand"></span>
        <span id="total"></span>
        
      </div>


      <div class="mix category-5 menu-restaurant" data-myorder="2">

        <span id="respOrders"></span>
        <span id="totalOrder"></span>
        
      </div>


                    
<script>
  function hidden()
  {
    $('#totalOrder').html('');
    $('#respOrders').html('');
    $('#respCommand').html('');    
    $('#total').html('');
  }

  function globalAmount($obj)
  {
    $('#amount_global').val($obj.value)
  }

 function Add($codeMenu,$amount){
    
    $token = $('#table_token').val();

    if( !$amount )
      $amount = "1";

    $url = "{{url('/command-add/')}}"+"/"+$codeMenu+"/"+$amount+"/"+$token;

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
                        '<span aria-hidden="true">&times;</span></button>Erro! Não foi possível adicionar o item em sua comanda.</div>';
          $('#resp').append($resp);
        }
    });


    $('#amount_global').val('');

 } 

 function ajaxMyCommand()
 {

     $url = "{{url('/command-list/')}}"+"/"+$('#table_token').val();
     $total = 0;
     $("#respCommand").html('');
     $.getJSON($url, function(result){
          $.each(result, function(i, field){

            if( field['status'] == 3){
              $resp = '<span class="clearfix" onClick="remove('+field['idCommand']+')">'+
                '<a class="menu-title">'+field['titleMenu']+'</a>'+
                '<span style="left: 166px; right: 44px;" class="menu-line"></span>'+
                '<span class="menu-price">'+field['price']+" x"+field['amount']+'  <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Excluir</button></span><br><br>'+
                '</span>';
              
              $total = $total + (parseFloat(field['price'])*parseInt(field['amount']));

              $t = ' <span class="clearfix"><h3>Total: <span class="menu-line"></span>&nbsp;<span class="label label-warning">R$ '+$total.toFixed(2)+'</span></h3></span><button class="btn btn-success" onclick="send()"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Enviar Comanda</button>&nbsp;<button class="btn btn-danger" onclick="erase()"><i class="fa fa-times" aria-hidden="true"></i> Cancelar Comanda</button></span>';

              $("#respCommand").append( $resp );
              $('#total').html('');
              $('#total').append( $t );
            }

          });
      });
 }

function remove($id)
{
  if (confirm("Deseja realmente excluir este item?") == true) {
    
    $token = $('#table_token').val();

    $.ajax({
      headers: 
      {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('/command-del/')}}"+"/"+$id+"/"+$token,
      type: "GET",
      success: function(data){ ajaxMyCommand(); },
      error: function (e)  {
        $resp = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span></button>Erro! Não foi possível excluir o item de sua comanda.</div>';
        $('#resp').append($resp);
      }
    });

  }
  
}

function erase()
{
  if (confirm("Deseja realmente cancelar a Comanda?") == true) {
    
    $token = $('#table_token').val();

    $.ajax({
      headers: 
      {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('/command-erase/')}}"+"/"+$token,
      type: "GET",
      success: function(data){  
         $resp = '<div class="alert alert-success alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span></button>Sucesso! Comanda cancelada.</div>';
        $('#resp').append($resp);
        $('#total').html('');
        $("#respCommand").html('');
      },
      error: function (e)  {
        $resp = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span></button>Erro! Não foi possível excluir o item de sua comanda.</div>';
        $('#resp').append($resp);
      }
    });
  }
  
}

function send()
{

  if (confirm("Deseja realmente finalizar sua Comanda? Ao finalizá-la seu pedido será encaminhado à fila.") == true) {

    $token = $('#table_token').val();

    $.ajax({
      headers: 
      {
          'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{url('/command-send/')}}"+"/"+$token,
      type: "GET",
      success: function(data){  
         $resp = '<div class="alert alert-success alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span></button>Sucesso! Comanda enviada. Acompanhe seus pedido.</div>';
        $('#resp').append($resp);
        $('#total').html('');
        $("#respCommand").html('');
      },
      error: function (e)  {
        $resp = '<div class="alert alert-danger alert-dismissible" role="alert">'+
                      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                      '<span aria-hidden="true">&times;</span></button>Erro! Não foi enviar a comanda.</div>';
        $('#respOrders').append($resp);
      }
    });

  }

}

function ajaxMyOrders()
 {

     $url = "{{url('/command-order-list/')}}"+"/"+$('#table_token').val();
     $total = 0;
     $("#respOrders").html('');
     $.getJSON($url, function(result){
          $.each(result, function(i, field){

            if( field['status'] > 3){
              $resp = '<span class="clearfix" onClick="remove('+field['idCommand']+')">'+
                '<a class="menu-title">'+field['titleMenu']+'</a>'+
                '<span style="left: 166px; right: 44px;" class="menu-line"></span>'+
                '<span class="menu-price">'+field['price']+" x"+field['amount']+'</span>'+
                '</span>';
              
              $total = $total + (parseFloat(field['price'])*parseInt(field['amount']));

              $t = ' <span class="clearfix"><h3>Total: <span class="menu-line"></span>&nbsp;<span class="label label-warning">R$ '+$total.toFixed(2)+'</span></h3></span>'+field['description']+'<p><span class="label label-primary">'+field['nameStatus']+'</span></p><button class="btn btn-danger" onclick="erase()"><i class="fa fa-times" aria-hidden="true"></i> Cancelar Pedido</button></span>';

              $("#respOrders").append( $resp );
              $('#totalOrder').html('');
              $('#totalOrder').append( $t );
            }

          });
      });
 }

</script>

@stop