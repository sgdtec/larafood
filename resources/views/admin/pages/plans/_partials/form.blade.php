@include('admin.includes.alerts')

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
    <textarea cols="30" rows="3" 
           name="description"
           class="form-control" 
           placeholder="Descrição do plano..."
    >
           {{$plan->description ?? old('description')}}
    </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>