@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome da Permissão</label>
    <input type="text" 
           name="name"
           value="{{$permission->name ?? old('name')}}"
           class="form-control" 
           placeholder="Nome da Permissão..." >
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" 
           name="description"
           class="form-control" 
           placeholder="Descrição do perfil..."
           value="{{$permission->description ?? old('description')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>