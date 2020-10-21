@extends('adminlte::page')

@section('title', 'Cargos do Usuario'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('users.index')}}">Cargos do Usuario</a></li>
   </ol>

   <h8>Cargos do Usuario <small><strong>{{$user->name}}</strong></small></h8> 
   <a href="{{ route('users.roles.available',$user->id )}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a>
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
                   <th width="300px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($roles as $role) 
                     <tr>
                        <th>{{$role->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('users.role.detach', [$user->id,$role->id ])}}" class="btn btn-sm btn-danger"> Desconectar</a>
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

