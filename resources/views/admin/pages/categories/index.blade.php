@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('categories.index')}}">Categorias</a></li>
   </ol>

   <h1>Categorias <a href="{{ route('categories.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('categories.search')}}" method="POST" class="form form-inline">
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
                   <th><small><b>Descrição</b></small></th>
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($categories as $category) 
                     <tr>
                        <th>{{$category->name}}</th>
                        <th>{{$category->description}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('categories.show', $category->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$categories->appends($filters)->links() !!}
         @else
            {!!$categories->links() !!}
         @endif
      </div>
    </div>
@stop

