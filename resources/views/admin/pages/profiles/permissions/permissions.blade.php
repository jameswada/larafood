@extends('adminlte::page')

@section('title', 'Permissões do Perfil'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('profiles.index')}}">Permissões do Perfil</a></li>
   </ol>

   <h8>Permissões do Perfil <small><strong>{{$profile->name}}</strong></small></h8> 
   <a href="{{ route('profiles.permissions.available',$profile->id )}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a>
@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('profiles.search')}}" method="POST" class="form form-inline">
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
                           <a href="{{ route('profiles.permissions.detach', [$profile->id,$permission->id ])}}" class="btn btn-sm btn-danger"> Desconectar</a>
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

