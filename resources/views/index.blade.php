@extends('layouts.app')
@section('content')
    <section class="select-camp">
        <div class="container">
            <h2 class="text-center">Simular Campeonatos</h2>
            <div class="row mt-4">
                <select id="campeonato" name="campeonato" class="form-control form-control-sm">
                    <option>Selecione um Campeonato</option>
                    @foreach($campeonatos as $camp)
                        <option value="{{$camp->id}}">{{$camp->nome}}</option>
                    @endforeach
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
        <div class="col-md-3 ml-md-auto card text-white bg-light mb-3 border-right border-light">
            <a href=""><div class="card-header">${response[0]}</div></a>
            <a href=""><div class="card-body">${response[0]}</div></a>
        </div>
    </div>


    <div class="semi row">
        <div class="col-md-3 ml-md-auto card text-white bg-light mb-3" style="max-width: 18rem;">
            <a href=""><div class="card-header">${response[0]}</div></a>
            <a href=""><div class="card-body">${response[0]}</div></a>
        </div>
        <div class="col-md-3 ml-md-auto"></div>
    </div>
--}}
@endsection
@section('scripts')
    <script type="text/javascript">
        function randomPlacar() {
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
                    let content = `
                    <div class="container">
                        <div class="col-md-12 p-3">
                            <div class="row">
                                <div class="col-md-3 card bg-light mb-3 border-right border-light">
                                    <div class="card-header" id="card-1"><span class="" id="time-1">${response[0]}</span><span>     -     </span><span class="" id="placar-1">${randomPlacar()}</span></div>
                                    <div class="card-body" id="card-2"><span class="" id="time-2">${response[1]}</span><span>     -     </span><span class="" id="placar-2">${randomPlacar()}</span></div>
                                </div>
                            </div>
                                    <div class="row">
                                        <div id="semi1" class="col-md-3 ml-md-auto card bg-light mb-3" style="max-width: 18rem;">
                                        </div>
                                        <div class="col-md-3 ml-md-auto"></div>
                                    </div>
                            <div class="row">
                                <div class="col-auto col-md-3 mr-auto card bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header" id="card-3"><span class="" id="time-3">${response[2]}</span><span>     -     </span><span class="" id="placar-3">${randomPlacar()}</span></div>
                                    <div class="card-body" id="card-4"><span class="" id="time-4">${response[3]}</span><span>     -     </span><span class="" id="placar-4">${randomPlacar()}</span></div>
                                </div>
                            </div>
                            <divclass="row">
                                <div class="col-md-3 ml-md-auto"></div>
                                <div id="final" class="col-md-3 ml-md-auto card bg-light mb-3 border-right border-light">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 card bg-light mb-3 border-right border-light">
                                    <div class="card-header" id="card-5"><span class="" id="time-5">${response[4]}</span><span>     -     </span><span class="" id="placar-5">${randomPlacar()}</span></div>
                                    <div class="card-body" id="card-6"><span class="" id="time-6">${response[5]}</span><span>     -     </span><span class="" id="placar-6">${randomPlacar()}</span></div>
                                </div>
                            </div>
                                <div class="row">
                                    <div id="semi2" class="col-md-3 ml-md-auto card bg-light mb-3" style="max-width: 18rem;">
                                    </div>
                                    <div class="col-md-3 ml-md-auto"></div>
                                </div>
                            <div class="row">
                                <div class="col-auto col-md-3 mr-auto card bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header" id="card-7"><span class="" id="time-7">${response[6]}</span><span>     -     </span><span class="" id="placar-7">${randomPlacar()}</span></div>
                                    <div class="card-body" id="card-8"><span class="" id="time-8">${response[7]}</span><span>     -     </span><span class="" id="placar-8">${randomPlacar()}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                    $("#tabela").html(content);
                    setTimeout(() => {
                        let semi = 1;
                        for(let i=1;i <= 8;i++) {
                            let placar1 = $("#placar-"+i).html();
                            let time1 = $("#time-"+i).html();
                            i += 1;
                            let placar2 = $("#placar-"+(i)).html();
                            let time2 = $("#time-"+(i)).html();
                            var semiContent = "";
                            if(parseInt(placar1) == parseInt(placar2)) {
                                $("#card-"+i).addClass('bg-danger');
                                i -= 1;
                                $("#card-"+i).addClass('bg-success');
                                semiContent = `
                                            <div id="card-semi${i}" class="card-header"><span class="" id="Timesemi${i}">${time1}</span><span>     -     </span><span class="" id="placar${i}">${randomPlacar()}</span></div>
                                `;
                            }
                            if(parseInt(placar1) > parseInt(placar2)) {
                                $("#card-"+i).addClass('bg-danger');
                                i -= 1;
                                $("#card-"+i).addClass('bg-success');
                                semiContent = `
                                            <div id="card-semi${i}" class="card-header"><span class="" id="Timesemi${i}">${time1}</span><span>     -     </span><span class="" id="placarSemi${i}">${randomPlacar()}</span></div>

                                `;
                            } else {
                                $("#card-"+i).addClass('bg-success');
                                i -= 1;
                                $("#card-"+i).addClass('bg-danger');
                                semiContent = `
                                            <div id="card-semi${i}" class="card-header"><span class="" id="Timesemi${i}">${time2}</span><span>     -     </span><span class="" id="placarSemi${i}">${randomPlacar()}</span></div>

                                `;
                            }
                            i += 1;
                            let semid = '#semi'+parseInt(semi);
                            $(semid).append(semiContent);
                            semi += 0.5;
                        }
                        $("#final").fadeOut();
                        setTimeout(() => {
                            for(let i=1;i <= 8;) {
                                console.log(i);
                                let placarSemi1 = $("#placarSemi"+i).html();
                                let timeSemi1 = $("#Timesemi"+i).html();
                                i += 2;
                                let placarSemi2 = $("#placarSemi"+(i)).html();
                                let timeSemi2 = $("#Timesemi"+(i)).html();
                                var finalContent = "";
                                if(parseInt(placarSemi1) == parseInt(placarSemi2)) {
                                    $("#card-semi"+i).addClass('bg-danger');
                                    i -= 2;
                                    $("#card-semi"+i).addClass('bg-success');
                                    finalContent = `
                                            <div class="card-header" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi1}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span></div>
                                    `;
                                }
                                if(parseInt(placarSemi1) > parseInt(placarSemi2)) {
                                    $("#card-semi"+i).addClass('bg-danger');
                                    i -= 2;
                                    $("#card-semi"+i).addClass('bg-success');
                                    finalContent = `
                                            <div class="card-header" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi1}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span></div>

                                `;
                                } else {
                                    $("#card-semi"+i).addClass('bg-success');
                                    i -= 2;
                                    $("#card-semi"+i).addClass('bg-danger');
                                    finalContent = `
                                            <div class="card-header" id="card-final${i}"><span class="" id="Timefinal${i}">${timeSemi2}</span><span>     -     </span><span class="" id="Finalplacar${i}">${randomPlacar()}</span></div>

                                    `;
                                }
                                i += 4;
                                $("#final").append(finalContent);
                            }
                            let Finalplacar1 = $("#Finalplacar1").html();
                            let Finalplacar5 = $("#Finalplacar5").html();
                            if(parseInt(Finalplacar1) > parseInt(Finalplacar5)) {
                                $("#card-final1").addClass('bg-success');
                                $("#card-final5").addClass('bg-danger');
                            } else {
                                $("#card-final5").addClass('bg-success');
                                $("#card-final1").addClass('bg-danger');
                            }
                            $("#final").fadeIn();
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
