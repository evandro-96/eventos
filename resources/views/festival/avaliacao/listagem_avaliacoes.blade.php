<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Festival de dança</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="danceicon" href="{{asset('img/danceicon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/danceicon.ico')}}">
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    Modalidade : {{ $modalidade }}<br>
                    Categoria : {{ $categoria }}<br>
                    Participacao : {{ $participacao }}
                </h2>
            </div>
            <!-- /.col -->
        </div>

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Academia</th>
                        <th>Notas</th>
                        <th>Colocação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $colocacao = 0;
                    ?>
                    @foreach($notas as $index => $nota)

                        <tr>
                            <td>{{ $nota['id_inscricao'] }}</td>
                            <td>
                                <b>Academia: </b>{{ $nota['academia'] }} <br>
                                <b>Coreografia: </b>{{ $nota['coreografia'] }} <br>
                                {{ $nota['modalidade'] }} , {{ $nota['categoria'] }} , {{  $nota['participacao'] }}<br>
                            </td>
                            <td>
                                @if(isset($nota['1']))
                                    {{$nota['1'][0]->nome}}:  {{$nota['1'][1]}}<br>
                                @endif

                                @if(isset($nota['2']))
                                    {{$nota['2'][0]->nome}}:  {{$nota['2'][1]}}<br>
                                @endif

                                @if(isset($nota['3']))
                                    {{$nota['3'][0]->nome}}:  {{$nota['3'][1]}}<br>

                                @endif

                                @if(isset($nota['4']))
                                    {{$nota['4'][0]->nome}}:  {{$nota['4'][1]}}<br>

                                @endif

                                @if(isset($nota['5']))
                                    {{$nota['5'][0]->nome}}:  {{$nota['5'][1]}}<br>

                                @endif

                                @if(isset($nota['6']))
                                    {{$nota['6'][0]->nome}}:  {{$nota['6'][1]}}<br>
                                @endif
                                <b>Nota Final: {{ round($nota['total'], 1) }}</b>
                            </td>
                            <td>{{ sizeof($notas) - $colocacao}}º</td>
                            <?php $colocacao++ ?>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
