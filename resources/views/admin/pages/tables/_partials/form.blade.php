@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label>Identificador da Mesa</label>
    <input type="text" 
           name="identify"
           value="{{$table->identify ?? old('identify')}}"
           class="form-control" 
           placeholder="Identificador da Mesa..." >
</div>

<div class="form-group">
    <label>Descrição</label>
    <textarea name="description"
              cols="30"
              rows="5"
              class="form-control"
              placeholder="Breve descrição sobre a Mesa...">
              {{$table->description ?? old('description')}}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-info">Enviar</button>
</div>