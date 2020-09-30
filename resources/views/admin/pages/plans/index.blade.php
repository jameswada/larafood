@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('plans.index')}}">Planos</a></li>
   </ol>

   <h1>Planos <a href="{{ route('plans.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

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
                   <th><small><b>Preço</b></small></th>
                   <th width="300px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($plans as $plan) 
                     <tr>
                        <th>{{$plan->name}}</th>
                        <th>R$ {{ number_format($plan->price,2,',','.')}}</th>
                        <th style="width=20px;">
                           <a href="{{ route('details.plans.index', $plan->url)}}" class="btn btn-sm btn-success"> Detalhes</a>
                           <a href="{{ route('plans.edit', $plan->url)}}" class="btn btn-sm btn-primary"> Editar</a>
                           <a href="{{ route('plans.show', $plan->url)}}" class="btn btn-sm btn-warning"> Exibir</a>
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

