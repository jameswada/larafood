@include('admin.includes.alerts')

<div class="form group">
   <label>Nome:</label>
   <input type="text" name="identity" class="form-control" placeholder="Nome:"
   value="{{ $table->identity ?? old('identity')}}">
</div>
<div class="form group">
   <label>Descrição:</label>
   <textarea name="description" cols="30" rows="5" class="form-control">
      {{$table->description??''}}
   </textarea>
</div>

<div class="form group">
   <button type="submit" class="btn btn-dark mt-2">Enviar</button>
</div>