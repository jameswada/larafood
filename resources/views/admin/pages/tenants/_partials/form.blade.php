@include('admin.includes.alerts')

<div class="form group">
   <label>*Logo:</label>
   <input type="file" name="logo" class="form-control">
</div>
<div class="form group">   
   <label>*Nome:</label>
   <input type="text" name="name" class="form-control" placeholder="Nome:"
   value="{{ $tenant->name ?? old('name')}}">
</div>
<div class="form group">
   <label>*CNPJ:</label>
   <input type="number" name="cnpj" class="form-control" placeholder="CNPJ:"
   value="{{ $tenant->cnpj ?? old('cnpj')}}">
</div>
<div class="form group">
   <label>*E-mail:</label>
   <input type="text" name="email" class="form-control" placeholder="E-mail:"
   value="{{ $tenant->email ?? old('email')}}">  
</div>
<div class="form group">
   <label>*Ativo:</label>
   <select name="active" class="form control">
      <option value="Y" @if(isset($tenant) && $tenant-> active == 'Y') selected @endif >Sim</option>
      <option value="N" @if(isset($tenant) && $tenant-> active == 'N') selected @endif >Não</option>
   </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form group">
   <label>Data cadastro:</label>
   <input type="date" name="subscription" class="form-control" placeholder="Data Cadastro:"
   value="{{ $tenant->subscription ?? old('subscription')}}">  
</div>
<div class="form group">
   <label>Data expiração:</label>
   <input type="date" name="expires_at" class="form-control" placeholder="Expira em"
   value="{{ $tenant->expires_at ?? old('expires_at')}}">  
</div>
<div class="form group">   
   <label>Identificador:</label>
   <input type="text" name="subscription_id" class="form-control" placeholder="Nome:"
   value="{{ $tenant->subscription_id ?? old('subscription_id')}}">
</div>
<div class="form group">
   <label>Suspenso:</label>
   <select name="subscription_suspended" class="form control">
      <option value="Y" @if(isset($tenant) && $tenant-> subscription_suspended == 'Y') selected @endif >Sim</option>
      <option value="N" @if(isset($tenant) && $tenant-> subscription_suspended == 'N') selected @endif >Não</option>
   </select>
</div>
<div class="form group">
   <button type="submit" class="btn btn-dark mt-2">Enviar</button>
</div>