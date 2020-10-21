@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('roles.index')}}">Cargos</a></li>
   </ol>

   <h1>Cargos <a href="{{ route('roles.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('roles.search')}}" method="POST" class="form form-inline">
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
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($roles as $role) 
                     <tr>
                        <th>{{$role->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('roles.edit', $role->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                           <a href="{{ route('roles.show', $role->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('roles.permissions', $role->id)}}" class="btn btn-sm btn-warning"> <i class="fa fa-address-card"></i> </a>
 
                         </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
       <div class="card-footer">     
         @if (isset($filters))
            {!!$roles->appends($filters)->links() !!}
         @else
            {!!$roles->links() !!}
         @endif
      </div>

    </div>

@stop

