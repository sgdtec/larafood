@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome da Categoria</label>
    <input type="text" 
           name="name"
           value="{{$category->name ?? old('name')}}"
           class="form-control" 
           placeholder="Nome da categoria..." >
</div>

<div class="form-group">
    <label>Nome da Categoria</label>
    <textarea name="description"
              cols="30"
              rows="5"
              class="form-control"
              placeholder="Breve descrição sobre a Categoria...">
              {{$category->description ?? old('description')}}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>