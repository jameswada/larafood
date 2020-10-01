@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('permissions.index')}}">Perfis</a></li>
   </ol>

   <h1>Perfis <a href="{{ route('permissions.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('permissions.search')}}" method="POST" class="form form-inline">
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
                   <th><small><b>Nome</b></small></th>
                   <th width="300px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($permissions as $permission) 
                     <tr>
                        <th>{{$permission->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('permissions.edit', $permission->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                           <a href="{{ route('permissions.show', $permission->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$permissions->appends($filters)->links() !!}
         @else
            {!!$permissions->links() !!}
         @endif
      </div>
    </div>
@stop

