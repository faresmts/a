@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Seus pets,  {{ Auth::user()->name }}</h2>

            @for()

            @endfor

            <div class="card mt-4">
                <div class="card-body container">
                    <div class="row">
                        <img class="img-rounded col-3" src="https://source.unsplash.com/random/250x250/?cat-black" alt="" srcset="">
                        <div class="col-8 mx-3 mt-4">
                            <h3>Kassandra</h3>
                            <ul class="list-group">
                                <li class="list-group-item">Espécie: Gato doméstico</li>
                                <li class="list-group-item">Raça: SRD</li>
                                <li class="list-group-item">Cor: preta</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body container">
                    <div class="row">
                        <img class="img-rounded col-3" src="https://source.unsplash.com/random/250x250/?cat-bi-colour-magpie" alt="" srcset="">
                        <div class="col-8 mx-3 mt-4">
                            <h3>Kurumim</h3>
                            <ul class="list-group">
                                <li class="list-group-item">Espécie: Gato doméstico</li>
                                <li class="list-group-item">Raça: SRD</li>
                                <li class="list-group-item">Cor: preto e branco</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body container">
                    <div class="row">
                        <img class="img-rounded col-3" src="https://source.unsplash.com/random/250x250/?cat-tuxedo" alt="" srcset="">
                        <div class="col-8 mx-3 mt-4">
                            <h3>Kurumim</h3>
                            <ul class="list-group">
                                <li class="list-group-item">Espécie: Gato doméstico</li>
                                <li class="list-group-item">Raça: SRD</li>
                                <li class="list-group-item">Cor: preto e branco</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
