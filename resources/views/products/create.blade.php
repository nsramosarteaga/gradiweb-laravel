@extends('layouts.app')

@section('content')

    <div class="container mb-2">

        <div class="row justify-content-center">
            <div class="col-lg-8 m-2">
                <form action="{{ url('/products') }}" class="form-horizontal mb-4" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('products.form',['modo'=>'crear'])
                </form>
            </div>
        </div>

    </div>

@endsection


@section('SectionTitle', 'Crear Producto ')
