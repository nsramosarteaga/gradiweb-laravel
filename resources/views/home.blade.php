@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header text-white bg-dark">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-success float-right bg-white text-dark">Listar</a>
                    Productos</div>
            </div>
        </div>
    </div>
</div>
@endsection
