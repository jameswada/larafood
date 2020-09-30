@extends('adminlte::page')

@section('title', "Detalhes do Plano ({$plan->name} )")

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.index')}}">Planos</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.show',$plan->url)}}">{{ $plan->name}}</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('details.plans.index', $plan->url)}}">Detalhes</a></li>
   </ol>

   <h1>Detalhes do Plano({{$plan->name}}) <a href="{{ route('details.plans.create', $plan->url)}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-body">          
         @include('admin.includes.alerts')
         <table class="table table-striped table-hover">
             <thead class="thead-dark">
                <tr>
                   <th><small><b>Nome</b></small></th>
                   <th width="200px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($details as $detail) 
                     <tr>
                        <th>{{$detail->name}}</th>
                        <th style="width = 20px;">
                           <a href="{{ route('details.plans.edit', [$plan->url, $detail->id])}}" class="btn btn-sm btn-primary"> Editar</a>
                           <a href="{{ route('details.plans.show', [$plan->url, $detail->id])}}" class="btn btn-sm btn-warning"> Exibir</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
         </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$details->appends($filters)->links() !!}
         @else
            {!!$details->links() !!}
         @endif
      </div>
    </div>
@stop

