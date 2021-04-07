@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Nome do Plano</label>
    <input type="text" 
           name="name"
           value="{{$plan->name ?? old('name')}}"
           class="form-control" 
           placeholder="Nome do plano..." >
</div>
<div class="form-group">
    <label>Preço do Plano</label>
    <input type="text" 
           name="price"
           value="{{$plan->price ?? old('price')}}"
           class="form-control" 
           placeholder="Preço do plano..." >
</div>
<div class="form-group">
    <label>Descrição</label>
    <input type="text" 
           name="description" 
           class="form-control" 
           placeholder="Descrição sobre o plano..." 
           value="{{ $plan->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>