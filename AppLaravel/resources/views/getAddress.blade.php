@extends('layout.layout2')

@section('title', 'Resultado da Busca')

@section('conteudo')

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                @if($data)
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <table class="table table-bordered table-hover table-light" style="width: 80%; margin-top:100px;">
                            <thead>
                                <tr>
                                    <th scope="col">CEP</th>
                                    <th scope="col">CIDADE</th>
                                    <th scope="col">ESTADO</th>
                                    <th scope="col">RUA</th>
                                    <th scope="col">BAIRRO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$data->cep}}</td>
                                    <td>{{$data->localidade}}</td>
                                    <td>{{$data->uf}}</td>
                                    <td>{{$data->logradouro}}</td>
                                    <td>{{$data->bairro}}</td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                    <div class="form-group">
                        <a href="{{route('home')}}" class="btn btn-primary" style="margin-left: 500px; text-decoration:none;">Nova Busca</a>
                    </div> 
                </div>
            @endif
            </div>
        </div>
        <video autoplay loop muted>
        	<source src="{{asset('video/highway-loop.mp4')}}" type="video/mp4" />
        </video>
    </div>

@endsection

