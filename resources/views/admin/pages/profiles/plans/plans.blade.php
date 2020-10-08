@extends('adminlte::page')

@section('title', 'Planos do Perfil'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('profiles.index')}}">Perfis</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('profiles.plans',$profile->id)}}">Planos</a></li>
   </ol>

   <h8>Planos do Perfil <small><strong>{{$profile->name}}</strong></small></h8> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('plans.search')}}" method="POST" class="form form-inline">
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
                  @foreach($plans as $plan) 
                     <tr>
                        <th>{{$plan->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('plans.profile.detach', [$plan->id,$profile->id ])}}" class="btn btn-sm btn-danger"> Desconectar</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$plans->appends($filters)->links() !!}
         @else
            {!!$plans->links() !!}
         @endif
      </div>
    </div>
@stop

