@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome do Perfil</label>
    <input type="text" 
           name="name"
           value="{{$profile->name ?? old('name')}}"
           class="form-control" 
           placeholder="Nome do Perfil..." >
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text"
           name="description"
           class="form-control" 
           placeholder="Descrição do perfil..."
           value="{{$profile->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>