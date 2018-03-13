@extends('templates.index')

@section('title') Dashboard @endsection
@section('caption') Maitre @endsection



@section('content')

	<div class="span9">
        <div class="content">
            
            @if(Auth::user()->nivel_idnivel < 4)
            <div class="btn-controls">

                <div class="btn-box-row row-fluid">

                	<a href="{{route('ds-user-list')}}" class="btn-box big span4">
                		<i class="icon-user"></i>
                		<b>{{count(Auth::user()->all())}}</b>
                        <p class="text-muted">Usuários</p>
                    </a>

                    <a href="{{route('ds-prod-list')}}" class="btn-box big span4">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    <b>{{$prod_end}}</b>
                    <p class="text-muted">Produtos terminando de {{$prod_all}} Cadastrados</p>

                    </a><a href="#" class="btn-box big span4">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <b>{{$table}}</b>
                    <p class="text-muted">Mesas Ocupadas de {{$table_all}} Cadastradas</p>
                    </a>

                </div>

                <div class="btn-box-row row-fluid">
                    <div class="span8">
                        <div class="row-fluid">
                            <div class="span12">

                                <a href="#" class="btn-box small span4">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <b>Pedidos Realizados <h3>{{count($command)}}</h3></b></a>

                                <a href="#" class="btn-box small span4">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <b>Pedidos em Andamento <h3>{{$command_going}}</h3></b>
                                </a>

                                <a href="#" class="btn-box small span4">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <b>Pedidos em Finalizados <h3>{{$command_end}}</h3></b>
                                </a>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <!--<a href="#" class="btn-box small span4"><i class="icon-save"></i><b>Total Sales</b>
                                </a><a href="#" class="btn-box small span4"><i class="icon-bullhorn"></i><b>Social Feed</b>
                                </a><a href="#" class="btn-box small span4"><i class="icon-sort-down"></i><b>Bounce
                                    Rate</b> </a>-->
                            </div>
                        </div>
                    </div>
                    <ul class="widget widget-usage unstyled span4">
                        <li>
                            <p>
                                <strong>Produtos Cadastrados</strong> <span class="pull-right small muted">{{$prod_all}}%</span>
                            </p>
                            <div class="progress tight">
                                <span id="prod_all">
                                </span>
                            </div>
                        </li>
                       <!-- <li>
                            <p>
                                <strong>Produtos em falta</strong> <span class="pull-right small muted">{{$prod_end}}%</span>
                            </p>
                            <div class="progress tight">
                                <span id="prod_end">
                                </span>
                            </div>
                        </li>-->
                        <li>
                            <p>
                                <strong>Pedidos em andamento</strong> <span class="pull-right small muted">{{$command_going}}%</span>
                            </p>
                            <div class="progress tight">
                                <span id="command_going">
                                </span>
                            </div>
                        </li>
                       <!-- <li>
                            <p>
                                <strong>iPhone</strong> <span class="pull-right small muted">67%</span>
                            </p>
                            <div class="progress tight">
                                <div class="bar bar-danger" style="width: 67%;">
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>


            </div>
            <!--/#btn-controls-->
            @else

            <h1>Ola {{Auth::user()->name}},</h1>
                <h4>Seu nível de visualização: <span class="label label-warning">
                @foreach( $nivel as $n )
                    @if( $n->idNivel == Auth::user()->nivel_idnivel)
                        {{$n->nameNivel}}
                    @endif
                @endforeach</span></h4>
            <h4>O departamento que esta cadastrado(a): <span class="label label-warning">
                @foreach( $department as $d )
                    @if( $d->idDepartment == Auth::user()->department_iddepartment)
                        {{$d->nameDepartment}}
                    @endif
                @endforeach
                </span></h4>
            

            @endif

           <div class="module">
                <div class="module-head">
                    <h3>Estatística</h3>
                </div>
                <div class="module-body">
                    <div class="chart inline-legend grid">
                        <div id="placeholder2" class="graph" style="height: 500px">

                        <div id="piechart" style="width: 100%; height: 100%;"></div>

                        </div>
                    </div>
                </div>
            </div>


        </div>      
        <!--/.content-->

    </div>
<script>
window.onload = initPage;
function initPage(){
    $('#prod_all').append( '<div class="bar bar-success" style="width: '+"{{$prod_all}}"+'%">' );
    $('#prod_end').append( '<div class="bar bar-danger" style="width: '+"{{$prod_end}}"+'%">' );
    $('#command_going').append( '<div class="bar bar-warning" style="width: '+"{{$command_going}}"+'%">' );
}   
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produto', 'Quantidade'],
            @foreach( $chartCommand as $command)
                ['{{$command->titleMenu}}',{{$command->amount}}],
            @endforeach
        ]);

        var options = {
          title: 'Produtos mais Pedidos:'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
   </script>

@endsection