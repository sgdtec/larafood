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
    <textarea cols="30" rows="3" 
           name="description"
           class="form-control" 
           placeholder="Descrição do perfil..."
    >
           {{$permission->description ?? old('description')}}
    </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>