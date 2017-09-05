@extends('layouts.admin')

@section('links')
    <link rel="stylesheet" href="{{ asset('bower_components/datatables/media/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('conteudo')
    {{ dump($coreografias) }}
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Jurado</th>
                    <th>Coreografia</th>
                    <th>Tipo</th>
                    <th>Notas</th>
                    <th>Comentários</th>
                    {{--<th>Ações</th>--}}
                </tr>
                </thead>
                <tbody>
                    @foreach($coreografias as $coreografia)
                        <tr>
                            <td>{{ $coreografia->jurado->nome }}</td>
                            <td>{{ $coreografia->coreografia->nomecoreografia }}</td>
                            <td>{{ $coreografia->tipo }}</td>
                            <td>{{ $coreografia->nota_01 }}</td>
                            <td>{{ $coreografia->comentario }}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{--<tfoot>--}}
                {{--<tr>--}}
                    {{--<th>Rendering engine</th>--}}
                    {{--<th>Browser</th>--}}
                    {{--<th>Platform(s)</th>--}}
                    {{--<th>Engine version</th>--}}
                    {{--<th>CSS grade</th>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            </table>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(function () {
            $('#example1').DataTable()
        })
    </script>
@endsection