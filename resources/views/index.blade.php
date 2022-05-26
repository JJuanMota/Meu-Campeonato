@extends('layouts.app')
@section('content')
    <section class="select-camp">
        <div class="container">
            <div class="row">
                <select class="form-control form-control-sm">
                    <option>Selecione um Campeonato</option>
                </select>
            </div>
        </div>
    </section>
    <section class="tabela-jogos bg-dark d-none">
        <div class="container">
            <div class="col-md-12 p-3">
                <div class="row">
                    <div class="col-md-2 card text-white bg-light mb-3 border-right border-light">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 ml-md-auto card text-white bg-light mb-3" style="max-width: 18rem;">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                    <div class="col-md-3 ml-md-auto"></div>
                </div>
                <div class="row">
                    <div class="col-auto col-md-3 mr-auto card text-white bg-light mb-3" style="max-width: 18rem;">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 ml-md-auto"></div>
                    <div class="col-md-3 ml-md-auto card text-white bg-light mb-3 border-right border-light">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                </div>
                <br><br>

                <div class="row">
                    <div class="col-md-2 card text-white bg-light mb-3 border-right border-light">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 ml-md-auto card text-white bg-light mb-3" style="max-width: 18rem;">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                    <div class="col-md-3 ml-md-auto"></div>
                </div>
                <div class="row">
                    <div class="col-auto col-md-3 mr-auto card text-white bg-light mb-3" style="max-width: 18rem;">
                        <a href=""><div class="card-header">Time</div></a>
                        <a href=""><div class="card-body">Time</div></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
