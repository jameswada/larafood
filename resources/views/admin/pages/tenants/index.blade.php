@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('tenants.index')}}">Empresas</a></li>
   </ol>

   <h1>Empresas <a href="{{ route('tenants.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('tenants.search')}}" method="POST" class="form form-inline">
            @csrf
            <input type="text" name="filter" placeholder="Filtro" class="form-control"
                        value="{{ $filters['filter'] ?? ''  }}">
            <button type="submit" class="btn btn-dark">Filtrar</button>
         </form>  
       </div>
       <div class="card-body">
          <table class="table table-striped table-hover">
             <thead class="thead-dark">
                <tr>
                   <th><small><b>logo</b></small></th>
                   <th><small><b>name</b></small></th>
                   <th><small><b>cnpj</b></small></th>
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($tenants as $tenant) 
                     <tr>
                        <th><img src="{{ url("storage/{$tenant->logo}")}}"  style="max-width:50px"></th>
                        <th>{{$tenant->name}}</th>                        
                        <th>{{$tenant->cnpj}}</th>
                        <th style="width:10px;">
                           <a href="{{ route('tenants.show', $tenant->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('tenants.edit', $tenant->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                         </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$tenants->appends($filters)->links() !!}
         @else
            {!!$tenants->links() !!}
         @endif
      </div>
    </div>
@stop

