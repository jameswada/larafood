@extends('adminlte::page')

@section('title', 'Categorias disponiveis para o Produto'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('products.index')}}">Produtos</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('products.categories', $product->id)}}">Categorias</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('products.categories.available', $product->id)}}">Disponiveis</a></li>
   </ol>

   <h8>Categorias disponiveis para o Produto <small><strong>{{$product->title}}</strong></small></h8> 
@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('products.categories.available', $product->id)}}" method="POST" class="form form-inline">
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
                   <th width="50px">#</th>
                   <th><small><b>Nome</b></small></th>
                </tr>
             </thead>
             <tbody>
               <form action="{{ route('products.categories.attach', $product->id)}}" method="POST">
                  @csrf
                     @foreach($categories as $category) 
                        <tr>
                           <td>
                              <input type="checkbox" name="categories[]" value="{{$category->id}}"></input>
                           </td>
                           <td>{{$category->name}}</td>
                        </tr>
                     @endforeach

                     <tr>
                        <td colspan="500"> 
                           @include('admin.includes.alerts')
                           @if(!($categories->count()==0))
                              <button type="submit" class="btn btn-success">Vincular</button>                     
                           @endif 
                        </td>
                     </tr>
               </form>
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

