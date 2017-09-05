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
    <form action="{{ route('avaliacao.lista.relatorio') }}" method="Post">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="modalidade">Gênero</label>
                    <select name="modalidade" class="form-control">
                        @foreach($modalidades as $modalidade)
                            <option value="{{ $modalidade->modalidade }}"> {{ $modalidade->modalidade }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->categoria}}"> {{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                    <label for="participacao">Participacao</label>
                    <select name="participacao" class="form-control">
                        @foreach($participacaos as $participacao)
                            <option value="{{ $participacao->participacao }}"> {{ $participacao->participacao }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{--</div>--}}

            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"> Avaliar</button>
            </div>
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