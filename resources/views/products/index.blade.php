@extends('layouts.app')

@section('content')

    <div class="container mb-2">

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

        <a href="{{ url('products/create') }}" class="btn btn-success mb-2">Agregar Producto <i class="fa fa-plus-square fa-lg"></i></a>

        <table class="table table-light table-hover">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Foto</th>
                <th class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ ($products->currentpage()-1) * $products->perpage() + $loop->index + 1 }}</td>
                        <td>{{ $item->nombre }} </td>
                        <td>{{ $item->descripcion }}</td>
                        <td class="text-center">${{ number_format($item->precio,2) }}</td>
                        <td class="text-center">
                            <img class="table-img" src="{{asset('images/' . $item->foto)}}" alt="{{$item->nombre}}">
                        </td>
                        <td class="d-flex">
                            <a href="{{ url('/products/'.$item->id) }}" class="btn btn-primary btn-sm d-inline" title="Ver"> <i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center"> {{ $products->links() }}</div>

    </div>

  @endsection


