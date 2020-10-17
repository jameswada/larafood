@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('tables.index')}}">Mesas</a></li>
   </ol>

   <h1>Mesas <a href="{{ route('tables.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('tables.search')}}" method="POST" class="form form-inline">
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
                   <th><small><b>Identificação</b></small></th>
                   <th><small><b>Descrição</b></small></th>
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($tables as $table) 
                     <tr>
                        <th>{{$table->identity}}</th>
                        <th>{{$table->description}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('tables.show', $table->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('tables.edit', $table->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$tables->appends($filters)->links() !!}
         @else
            {!!$tables->links() !!}
         @endif
      </div>
    </div>
@stop

