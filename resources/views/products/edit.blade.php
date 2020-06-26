@extends('layouts.app')

@section('content')

    <div class="container mb-2">

        <div class="row justify-content-center">
            <div class="col-lg-8 m-2">

                <form action="{{ route('products.update',$product->id) }}" class="form-horizontal mb-4" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PATCH')
                    @include('products.form',['modo'=>'editar'])
                </form>

            </div>
        </div>

    </div>

@endsection


@section('SectionTitle', 'Actualizar Datos del Producto ')
