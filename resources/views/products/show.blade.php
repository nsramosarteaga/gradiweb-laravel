@extends('layouts.app')

@section('content')

    <div class="container mb-2 d-flex justify-content-center">

        <div class="col-md-4">

            @if(Session::has('Mensaje'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ Session::get('Mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <script>
                showMessageNotification( Session::get('Mensaje') );
                </script>
            @endif

            <div class="card mb-4 text-dark bg-white">
            <img class="card-img-top" src="{{asset('images/' . $product->foto)}}" alt="{{$product->nombre}}">
               <div class="card-body">
                    <h5 class="card-title">{{$product->nombre}}</h5>
                    <p class="card-text">{{$product->descripcion}}</p>
               </div>
               <div class="bottom-wrap">

                    <form action="{{ url('/products/'.$product->id) }}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="m-1 btn btn-danger btn-sm d-inline float-right" onclick="return confirm('Se borrará el producto, ¿Seguro desea borrar el registro?');" title="Borrar"> <i class="fa fa-trash"></i></button>
                    </form>

                    <a href="{{ url('/products/'.$product->id.'/edit') }}" class="m-1 btn btn-warning btn-sm d-inline float-right" title="Editar"> <i class="fa fa-edit"></i></a>
                    <div class="price-wrap h5">
                        <span class="price-new">$ {{ number_format($product->precio,2) }}</span>
                        <!-- <del class="price-old">$1980</del> -->
                    </div> <!-- price-wrap.// -->
                </div> <!-- bottom-wrap.// -->

                <div class="card-footer">
                    <a href="{{url('products')}}" class="btn btn-primary btn-block" ><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                </div>
            </div>
         </div>
    </div>

@endsection

@section('SectionTitle', 'Ficha del Producto ')
