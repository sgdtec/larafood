@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome do Usuário</label>
    <input type="text" 
           name="name"
           value="{{$user->name ?? old('name')}}"
           class="form-control" 
           placeholder="Nome do usuário..." >
</div>
<div class="form-group">
    <label>E-mail do Usuário</label>
    <input type="text" 
           name="email"
           value="{{$user->email ?? old('email')}}"
           class="form-control" 
           placeholder="Informe o e-mail do usuário..." >
</div>
<div class="form-group">
    <label>Senha</label>
    <input type="password" 
           name="password"
           class="form-control" 
           placeholder="Informe uma senha" >
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>