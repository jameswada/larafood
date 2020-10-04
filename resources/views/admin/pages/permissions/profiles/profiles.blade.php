@extends('adminlte::page')

@section('title', 'Perfis da Permissão'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('permissions.index')}}">Perfis da Permissão</a></li>
   </ol>

   <h8>Perfis da Permissão <small><strong>{{$permission->name}}</strong></small></h8> 

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
                  @foreach($profiles as $profile) 
                     <tr>
                        <th>{{$profile->name}}</th>
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
            {!!$profiles->appends($filters)->links() !!}
         @else
            {!!$profiles->links() !!}
         @endif
      </div>
    </div>
@stop

