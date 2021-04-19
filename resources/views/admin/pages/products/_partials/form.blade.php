@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome do Produto</label>
    <input type="text" 
           name="title"
           value="{{$product->title ?? old('title')}}"
           class="form-control" 
           placeholder="Nome da categoria..." >
</div>

<div class="form-group">
    <label>Preço do Produto</label>
    <input type="text" 
           name="price"
           value="{{$product->price ?? old('price')}}"
           class="form-control" >
</div>

<div class="form-group">
    <label>Imagem</label>
    <input type="file"
           name="image"
           value="{{$produt->image ?? old('image')}}"
           class="form-control"
           placeholder="Buscar imagem...">
</div>

<div class="fomr-group">
    <label>Descrição</label>
    <textarea name="description"
              cols="30"
              rows="5"
              class="form-control">
              {{ $product->description ?? old('description') }}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>