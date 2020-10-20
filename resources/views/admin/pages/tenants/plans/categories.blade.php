@extends('adminlte::page')

@section('title', 'Categorias do Produto'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('products.index')}}">Produtos</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('products.categories', $product->id)}}">Categorias</a></li>
   </ol>

   <h8>Categorias do Produto <small><strong>{{$product->title}}</strong></small></h8> 
   <a href="{{ route('products.categories.available',$product->id )}}" class="btn btn-info">
          <i class='fas fa-plus'></i> Adicionar
   </a>
@stop

@section('content')
    <div class="card">

       <div class="card-body">
          <table class="table table-striped table-hover">
             <thead class="thead-dark">
                <tr>
                   <th><small><b>Nome</b></small></th>
                   <th width="50px"><small><b>Ações</b></small></th>
                </tr>
             </thead>
             <tbody>
                  @foreach($categories as $category) 
                     <tr>
                        <th>{{$category->name}}</th>
                        <th style="width:20px;">
                           <a href="{{ route('products.categories.detach', [$product->id,$category->id ])}}" class="btn btn-sm btn-danger"> Desconectar</a>
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

