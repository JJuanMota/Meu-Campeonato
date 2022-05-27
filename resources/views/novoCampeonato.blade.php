@extends('layouts.app')
@section('content')
    <section class="tabela-jogos">
        <div class="container">
            <h2 class="text-center">Novo Campeonato</h2>
            <div class="row justify-content-center">
                <br><br>
                <form method="POST" action="{{route('createCamp')}}">
                    @csrf
                    <h5 class="text-center text-secondary">Digite o nome dos times</h5>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-8">
                            <input required type="text" class="form-control" placeholder="Insira o nome do seu campeonato" name="nome">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 1" name="time_1">
                        </div>
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 2" name="time_2">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 3" name="time_3">
                        </div>
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 4" name="time_4">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 5" name="time_5">
                        </div>
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 6" name="time_6">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 7" name="time_7">
                        </div>
                        <div class="form-group col-md-4">
                            <input required type="text" class="form-control" placeholder="Time 8" name="time_8">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <button type="submit" class=" btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
