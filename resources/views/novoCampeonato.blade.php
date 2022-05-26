@extends('layouts.app')
@section('content')
    <section class="tabela-jogos">
        <h2>Novo Campeonato</h2>
        <br><br>
        <div class="container">
            <div class="justify-content-center">
                <form method="POST" action="{{route('createCamp')}}">
                    @csrf
                    <h5 class="text-secondary">Digite o nome dos times</h5>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 1" name="Time_1">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 2" name="Time_2">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 3" name="Time_3">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 4" name="Time_4">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 5" name="Time_5">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 6" name="Time_6">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 7" name="Time_7">
                    </div>
                    <div class="form-group col-md-4">
                        <input required type="text" class="form-control" placeholder="Time 8" name="Time_8">
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </section>
@endsection
