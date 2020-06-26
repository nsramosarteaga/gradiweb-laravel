<div class="row">
    <div class="form-group col-lg-12">
        <label for="nombre" class="control-label">{{ 'Nombre *' }}</label>
        <input
        type="text"
        class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}"
        name="nombre"
        value="{{ isset($product->nombre)?$product->nombre:old('nombre') }}">
        {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group col-lg-12">
        <label for="descripcion" class="control-label">{{ 'Descripción *' }}</label>
        <textarea
            name="descripcion"
            rows="5"
            cols="100">{{ isset($product->descripcion)?$product->descripcion:old('descripcion') }}</textarea>
        {!! $errors->first('descripcion','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group col-lg-12">
        <label for="precio" class="control-label">{{ 'Precio *' }}</label>
        <input
        type="number"
        step="any"
        min="0"
        class="form-control {{ $errors->has('precio')?'is-invalid':'' }}"
        name="precio"
        value="{{ isset($product->precio)?$product->precio:old('precio') }}">
        {!! $errors->first('precio','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group col-lg-12">
        <label for="foto" class="control-label">Foto del producto *</label>
        @if($modo=='editar')
            <img class="form-control form-image" src="{{asset('images/' . $product->foto )}}" />
        @endif
          <input type="file" name="foto" value="{{old('foto')}}"/><br/>
          <span class="small">Formatos permitidos <b>(JPG, JPEG, PNG)</b> Tamaño máximo de 2MB.</span><br/>
          <span class="text-danger">{{ $errors->first('foto') }}</span>
          {!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
      </div>

</div>

<div class="row">
    <input type="submit" class="btn btn-success" value="{{ $modo=='crear' ? 'Guardar':'Actualizar' }}">
    &nbsp;<a href="{{url('products/'.$product->id)}}" class="btn btn-primary" >Regresar</a>
</div>

