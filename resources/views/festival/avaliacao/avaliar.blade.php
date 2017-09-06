@extends('layouts.admin')

@section('conteudo')

    @if (session('status'))
        <div class="alert alert-success alert-dismissable">
            {{ session('status') }}
        </div>
    @endif

    <div class="box-header with-border">
        <h3 class="box-title">Avaliação de Coreográfias</h3>
    </div>
    <form action="{{ route('avaliacao.salvar') }}" method="post">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="nome">Jurado</label>
                    <select name="jurado" class="form-control">
                        @foreach($jurados as $index => $jurado)
                            <option value="{{ $jurado }}"> {{ $index }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="nome">Coreografia</label>
                    <select name="coreografia" class="form-control">
                        @foreach($coreografia as $index => $coreografia)
                            <option value="{{ $coreografia }}"> {{ $index }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-control" id="tipo">
                        <option value="1">Ballet Clássico de Repertório</option>
                        <option value="2">Geral</option>
                        <option value="3">Mostra Avaliada</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div id="notas">
                </div>
                <h2 class="pull-right" id="total-notas"></h2>
            </div>
            <hr>
            <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="nome" id="comentario">Comentários</label>
                    <textarea name="comentarios" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"> Avaliar</button>
        </div>
    </form>
@endsection

@section('scripts')
    <script src="{{ asset('js/GeradorDeForm.js') }}"></script>

    <script>
        $(document).ready(camposDeNotas($('#tipo').val()));
        $('#tipo').on('change', () => recarregaCampo($('#tipo').val()));
        $('.campo-nota').change(() => somaNotas());
    </script>
@endsection