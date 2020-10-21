@extends('adminlte::page')

@section('title', 'Permissões do Cargo'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('roles.index')}}">Permissões do Cargo</a></li>
   </ol>

   <h8>Permissões do Cargo <small><strong>{{$role->name}}</strong></small></h8> 
   <a href="{{ route('roles.permissions.available',$role->id )}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a>
@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('roles.permissions', [$role->id] )}}" method="POST" class="form form-inline">
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
                           <a href="{{ route('roles.permissions.detach', [$role->id,$permission->id ])}}" class="btn btn-sm btn-danger"> Desconectar</a>
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

