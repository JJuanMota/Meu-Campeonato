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
    <section id="tabela" class="tabela-jogos bg-dark d-none">
    </section>


{{--
<div class="semi">

</div>

    <div class="final row">
        <div class="col-md-3 ml-md-auto"></div>
        <div class="col-md-3 ml-md-auto card text-white">
            <a href=""><div class="bg-light p-2">${response[0]}</div></a>
            <a href=""><div class="bg-light p-2">${response[0]}</div></a>
        </div>
    </div>


    <div class="semi row">
        <div class="col-md-3 ml-md-auto card text-white" style="max-width: 18rem;">
            <a href=""><div class="bg-light p-2">${response[0]}</div></a>
            <a href=""><div class="bg-light p-2">${response[0]}</div></a>
        </div>
        <div class="col-md-3 ml-md-auto"></div>
    </div>
--}}
@endsection
@section('scripts')
    <script type="text/javascript">
        function randomPlacar() { // FUNÇÃO PARA RANDOMIZAR PLACAR
            let index = Math.floor(Math.random() * 10);
            return index;
        }
        $("#campeonato").change(function () {

            $.ajax({
                url: "{{route('geraCampeonato')}}",
                type: "POST",
                data: {
                    'id' : $("#campeonato").val(),
                    '_token': '{{csrf_token()}}'
                },
                dataType: 'JSON',
                success: function(response) {
                    // INICIANDO TABELA DE JOGOS
                    let content = `
                    <div class="container">
                        <div class="col-md-12 p-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="bg-light p-2" id="card-1"><span class="" id="time-1">${response[0]}</span><span>     -     </span><span class="" id="placar-1">${randomPlacar()}</span></div>
                                    <div class="bg-light p-2" id="card-2"><span class="" id="time-2">${response[1]}</span><span>     -     </span><span class="" id="placar-2">${randomPlacar()}</span></div>
                                </div>
                                <div class="row col-md-9 ml-md-auto" style="margin-bottom: -10%; margin-top: 5%;">
                                    <div id="semi1" class="col-md-4 " style="max-width: 18rem;"></div>
                                    <div id="terceiro-lugar" class="col-md-4" style="margin-top: 15%; margin-bottom: -30%;"></div>
                                    <div id="final" class="col-md-4 " style="margin-top: 15%; margin-bottom: -30%;"></div>
                                </div>

                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-auto col-md-3 mr-auto" style="max-width: 18rem;">
                                    <div class="bg-light p-2" id="card-3"><span class="" id="time-3">${response[2]}</span><span>     -     </span><span class="" id="placar-3">${randomPlacar()}</span></div>
                                    <div class="bg-light p-2" id="card-4"><span class="" id="time-4">${response[3]}</span><span>     -     </span><span class="" id="placar-4">${randomPlacar()}</span></div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="bg-light p-2" id="card-5"><span class="" id="time-5">${response[4]}</span><span>     -     </span><span class="" id="placar-5">${randomPlacar()}</span></div>
                                    <div class="bg-light p-2" id="card-6"><span class="" id="time-6">${response[5]}</span><span>     -     </span><span class="" id="placar-6">${randomPlacar()}</span></div>
                                </div>
                                    <div class="row col-md-9 ml-md-auto" style="margin-bottom: -10%; margin-top: 5%;">
                                        <div id="semi2" class="col-md-4"></div>
                                    </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-auto col-md-3 mr-auto" style="max-width: 18rem;">
                                    <div class="bg-light p-2" id="card-7"><span class="" id="time-7">${response[6]}</span><span>     -     </span><span class="" id="placar-7">${randomPlacar()}</span></div>
                                    <div class="bg-light p-2" id="card-8"><span class="" id="time-8">${response[7]}</span><span>     -     </span><span class="" id="placar-8">${randomPlacar()}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $("#tabela").html(content);
                    setTimeout(() => {
                        let semi = 1;
                        for(let i=1;i <= 8;i++) {
                            // TABELA PARA ELIMINATORIAS DAS QUARTAS DE FINAIS
                            let placar1 = $("#placar-"+i).html();
                            let time1 = $("#time-"+i).html();
                            i += 1;
                            let placar2 = $("#placar-"+(i)).html();
                            let time2 = $("#time-"+(i)).html();
                            var semiContent = "";
                            if(parseInt(placar1) == parseInt(placar2)) {
                                $("#card-"+i).addClass('bg-danger');
                                $("#card-"+i).removeClass('bg-light');
                                i -= 1;
                                $("#card-"+i).removeClass('bg-light');
                                $("#card-"+i).addClass('bg-success');
                                semiContent = `
                                            <div id="card-semi${i}" class="bg-light p-2"><span class="" id="Timesemi${i}">${time1}</span><span>     -     </span><span class="" id="placar${i}">${randomPlacar()}</span></div>
                                `;
                            }
                            else if(parseInt(placar1) > parseInt(placar2)) {
                                $("#card-"+i).addClass('bg-danger');
                                $("#card-"+i).removeClass('bg-light');
                                i -= 1;
                                $("#card-"+i).removeClass('bg-light');
                                $("#card-"+i).addClass('bg-success');
                                semiContent = `
                                            <div id="card-semi${i}" class="bg-light p-2"><span class="" id="Timesemi${i}">${time1}</span><span>     -     </span><span class="" id="placarSemi${i}">${randomPlacar()}</span></div>

                                `;
                            } else {
                                $("#card-"+i).addClass('bg-success');
                                $("#card-"+i).removeClass('bg-light');
                                i -= 1;
                                $("#card-"+i).removeClass('bg-light');
                                $("#card-"+i).addClass('bg-danger');
                                semiContent = `
                                            <div id="card-semi${i}" class="bg-light p-2"><span class="" id="Timesemi${i}">${time2}</span><span>     -     </span><span class="" id="placarSemi${i}">${randomPlacar()}</span></div>

                                `;
                            }
                            i += 1;
                            let semid = '#semi'+parseInt(semi);
                            $(semid).append(semiContent);
                            semi += 0.5;
                        }
                        setTimeout(() => {
                            // TABELA PARA ELIMINATORIAS DAS SEMI FINAIS
                            for(let i=1;i <= 8;) {
                                let placarSemi1 = $("#placarSemi"+i).html();
                                let timeSemi1 = $("#Timesemi"+i).html();
                                i += 2;
                                let placarSemi2 = $("#placarSemi"+(i)).html();
                                let timeSemi2 = $("#Timesemi"+(i)).html();
                                var finalContent = "";
                                var terceiroContent = "";
                                if(parseInt(placarSemi1) == parseInt(placarSemi2)) {
                                    $("#card-semi"+i).addClass('bg-danger');
                                    $("#card-semi"+i).removeClass('bg-light');
                                    i -= 2;
                                    $("#card-semi"+i).removeClass('bg-light');
                                    $("#card-semi"+i).addClass('bg-success');
                                    finalContent = `
                                            <div class="bg-light p-2" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi1}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span><span id="vencedor${i}"></span></div>
                                    `;
                                    terceiroContent = `
                                            <div class="bg-light p-2" id="card-terceiro${i}"><span class="" id="Timeterceiro${i}">${timeSemi2}</span><span>     -     </span><span class="" id="Terceiroplacar${i}">${randomPlacar()}</span><span id="terceiro${i}"></span></div>
                                    `;
                                }
                                else if(parseInt(placarSemi1) > parseInt(placarSemi2)) {
                                    $("#card-semi"+i).addClass('bg-danger');
                                    $("#card-semi"+i).removeClass('bg-light');
                                    i -= 2;
                                    $("#card-semi"+i).removeClass('bg-light');
                                    $("#card-semi"+i).addClass('bg-success');
                                    finalContent = `
                                            <div class="bg-light p-2" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi1}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span><span id="vencedor${i}"></span></div>

                                    `;
                                    terceiroContent = `
                                            <div class="bg-light p-2" id="card-terceiro${i}"><span class="" id="Timeterceiro${i}">${timeSemi2}</span><span>     -     </span><span class="" id="Terceiroplacar${i}">${randomPlacar()}</span><span id="terceiro${i}"></span></div>

                                    `;
                                } else {
                                    $("#card-semi"+i).addClass('bg-success');
                                    $("#card-semi"+i).removeClass('bg-light');
                                    i -= 2;
                                    $("#card-semi"+i).removeClass('bg-light');
                                    $("#card-semi"+i).addClass('bg-danger');
                                    finalContent = `
                                            <div class="bg-light p-2" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi2}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span><span id="vencedor${i}"></span></div>

                                    `;
                                    terceiroContent = `
                                            <div class="bg-light p-2" id="card-terceiro${i}"><span class="" id="Timeterceiro${i}">${timeSemi1}</span><span>     -     </span><span class="" id="Terceiroplacar${i}">${randomPlacar()}</span><span id="terceiro${i}"></span></div>

                                    `;
                                }
                                i += 4;
                                $("#final").append(finalContent);
                                $("#terceiro-lugar").append(terceiroContent);
                            }
                            // TABELA PARA RESULTADO DAS FINAIS
                            let Finalplacar1 = $("#Finalplacar1").html();
                            let Finalplacar5 = $("#Finalplacar5").html();
                            if(parseInt(Finalplacar1) == parseInt(Finalplacar5)) {
                                var primeiro = $("#Timefinal1").html();
                                var segundo = $("#Timefinal5").html();
                                $("#card-final1").addClass('bg-warning');
                                $("#card-final1").removeClass('bg-light');
                                $("#card-final5").removeClass('bg-light');
                                $("#card-final5").addClass('bg-secondary');

                                $("#vencedor1").html(' - VENCEDOR');
                                $("#vencedor5").html(' - 2º LUGAR');
                            }
                            else if(parseInt(Finalplacar1) > parseInt(Finalplacar5)) {
                                var primeiro = $("#Timefinal1").html();
                                var segundo = $("#Timefinal5").html();
                                $("#card-final1").addClass('bg-warning');
                                $("#card-final1").removeClass('bg-light');
                                $("#card-final5").removeClass('bg-light');
                                $("#card-final5").addClass('bg-secondary');

                                $("#vencedor1").html(' - VENCEDOR');
                                $("#vencedor5").html(' - 2º LUGAR');
                            } else {
                                primeiro = $("#Timefinal5").html();
                                segundo = $("#Timefinal1").html();
                                $("#card-final5").addClass('bg-warning');
                                $("#card-final5").removeClass('bg-light');
                                $("#card-final1").removeClass('bg-light');
                                $("#card-final1").addClass('bg-secondary');
                                $("#vencedor5").html(' - VENCEDOR');
                                $("#vencedor1").html(' - 2º LUGAR');
                            }

                            let Terceiroplacar1 = $("#Terceiroplacar1").html();
                            let Terceiroplacar5 = $("#Terceiroplacar5").html();
                            if(parseInt(Terceiroplacar1) > parseInt(Terceiroplacar5)) {
                                var terceiro = $("#Timeterceiro1").html();
                                $("#card-terceiro1").css("background-color", "#cd7f32");
                                $("#card-terceiro1").removeClass('bg-light');
                                $("#card-terceiro5").removeClass('bg-light');
                                $("#card-terceiro5").addClass('bg-danger');
                                $("#terceiro1").html(' - 3º LUGAR');
                            } else {
                                terceiro = $("#Timeterceiro5").html();
                                $("#card-terceiro5").css("background-color", "#cd7f32");
                                $("#card-terceiro1").removeClass('bg-light');
                                $("#card-terceiro5").removeClass('bg-light');
                                $("#card-terceiro1").addClass('bg-danger');
                                $("#terceiro5").html(' - 3º LUGAR');
                            }
                            $.ajax({
                                url: "{{route('salvaCampeonato')}}",
                                type: "POST",
                                data: {
                                    'id' : $("#campeonato").val(),
                                    '_token': '{{csrf_token()}}',
                                    'primeiro' : primeiro,
                                    'segundo'  : segundo,
                                    'terceiro' : terceiro
                                },
                                dataType: 'JSON',
                                success: function(response) {
                                    console.log('success');
                                },
                                error: function(response) {
                                    console.log('error');
                                }

                            });
                        }, "3000");
                    }, "3000");

                    $("#tabela").removeClass('d-none');
                },
                error: function(response) {

                }

            });
        });

    </script>
@endsection
