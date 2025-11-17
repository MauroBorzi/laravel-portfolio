@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h1>IL MIO PORTFOLIO</h1>
                <h4 class="text-secondary mb-4">Ciao! Io sono Mauro e questo è il mio portfolio! =D</h4>

                <!-- Immagine -->
                <img src="{{ asset('images/portfolio-image.jpg') }}" alt="Portfolio Image" class="img-fluid rounded shadow-lg"
                    style="max-width: 600px;">
            </div>
        </div>
    </div>
@endsection
