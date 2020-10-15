@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('products.index')}}">Produtos</a></li>
   </ol>

   <h1>Produtos <a href="{{ route('products.create')}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a></h1> 

@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('products.search')}}" method="POST" class="form form-inline">
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
                   <th><small><b>Imagem</b></small></th>
                   <th><small><b>Titulo</b></small></th>
                   <th width="370px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($products as $product) 
                     <tr>
                        <th><img src="{{ url("storage/{$product->image}")}}" alt="{{$product->title}}" style="max-width:50px"></th>
                        <th>{{$product->title}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('products.show', $product->id)}}" class="btn btn-sm btn-warning"> Exibir</a>
                           <a href="{{ route('products.edit', $product->id)}}" class="btn btn-sm btn-primary"> Editar</a>
                        </th>
                     </tr>
                  @endforeach
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$products->appends($filters)->links() !!}
         @else
            {!!$products->links() !!}
         @endif
      </div>
    </div>
@stop

