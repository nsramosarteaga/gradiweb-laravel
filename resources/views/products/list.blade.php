@extends('layouts.productos')

@section('content')

    <div class="container mb-2">

        @if(Session::has('Mensaje'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ Session::get('Mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <script>
            showMessageNotification( Session::get('Mensaje') );
            </script>
        @endif

        <div class="row">
            @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card mb-4 text-dark bg-white">
                    <img class="card-img-top" src="{{asset('images/' . $item->foto)}}" alt="{{$item->nombre}}">
                       <div class="card-body">
                            <h5 class="card-title">{{$item->nombre}}</h5>
                            <p class="card-text">{{$item->descripcion}}</p>
                       </div>
                       <div class="bottom-wrap">
                            <a href="" class="btn btn-sm btn-outline-dark float-right">Ordenar ahora</a>
                            <div class="price-wrap h5">
                                <span class="price-new">$ {{ number_format($item->precio,2) }}</span>
                                <!-- <del class="price-old">$1980</del> -->
                            </div> <!-- price-wrap.// -->
                        </div> <!-- bottom-wrap.// -->
                    </div>
                 </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center"> {{ $products->links() }}</div>
    </div>



  @endsection


