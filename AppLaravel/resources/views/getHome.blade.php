@extends('layout.layout')

@section('title', 'Buscador de cep')

@section('conteudo')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <h4><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg> Erro!</h4>
                            <h6>{{ $errors->first() }}</h6>
                        </div>    
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Buscador de Endereços</h2>
                                <p>Entre com o cep e aproveite!</p>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Digite o cep:</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                    </p>
                                </div>
                            </div>

                            <form class="signin-form" action="{{ route('search') }}" method="GET">
                                <div class="form-group mb-3">
                                    <label class="label" for="name"></label>
                                    <input id="cep" type="text" name="cep" placeholder="Ex: 88110633" class="form-control input-md" minlength="8" maxlength="8" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Buscar</button>
                                </div>
                            </form>                
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection