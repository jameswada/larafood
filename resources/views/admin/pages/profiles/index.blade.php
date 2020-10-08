@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('profiles.index')}}">Perfis</a></li>
   </ol>

   <h1>Perfis <a href="{{ route('profiles.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

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
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($profiles as $profile) 
                     <tr>
                        <th>{{$profile->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('profiles.edit', $profile->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                           <a href="{{ route('profiles.show', $profile->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('profiles.permissions', $profile->id)}}" class="btn btn-sm btn-warning"> <i class="fa fa-key"></i> </a>
                           <a href="{{ route('profiles.plans', $profile->id)}}" class="btn btn-sm btn-info"> <i class="fa fa-list-alt"></i> </a>
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

