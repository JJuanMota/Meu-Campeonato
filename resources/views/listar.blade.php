@extends('layouts.app')
@section('content')
    <section class="select-camp">
        <div class="container">
            <h2 class="text-center">Simular Campeonatos</h2>
            <div class="row mt-4">
                <select id="campeonato" name="campeonato" class="form-control form-control-sm">
                    <option>Selecione um Campeonato</option>
                    @if(!empty($campeonatos))
                        @foreach($campeonatos as $camp)
                            <option value="{{$camp->id}}">{{$camp->nome}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </section>
    <br>
    <section id="tabela" class="tabela-jogos">
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#campeonato").change(function () {
            $.ajax({
                url: "{{route('listaCampeonatos')}}",
                type: "POST",
                data: {
                    'id' : $("#campeonato").val(),
                    '_token': '{{csrf_token()}}'
                },
                dataType: 'JSON',
                success: function(response) {
                    var content = `
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Nome do Campeonato</th>
                              <th scope="col">Vencedor</th>
                              <th scope="col">Segundo lugar</th>
                              <th scope="col">Terceiro lugar</th>
                              <th scope="col">Participante 1</th>
                              <th scope="col">Participante 2</th>
                              <th scope="col">Participante 3</th>
                              <th scope="col">Participante 4</th>
                              <th scope="col">Participante 5</th>
                              <th scope="col">Participante 6</th>
                              <th scope="col">Participante 7</th>
                              <th scope="col">Participante 8</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>${response['nome']}</td>
                              <td>${response['vencedor']}</td>
                              <td>${response['segundo_lugar']}</td>
                              <td>${response['terceiro_lugar']}</td>
                              <td>${response['time_1']}</td>
                              <td>${response['time_2']}</td>
                              <td>${response['time_3']}</td>
                              <td>${response['time_4']}</td>
                              <td>${response['time_5']}</td>
                              <td>${response['time_6']}</td>
                              <td>${response['time_7']}</td>
                              <td>${response['time_8']}</td>
                            </tr>
                          </tbody>
                        </table>
                    `;
                    $("#tabela").html(content);
                },
                error: function(response) {

                }

            });
        });
    </script>
@endsection
