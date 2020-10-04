@extends('adminlte::page')

@section('title', 'Permissões disponiveis ao Perfil'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('profiles.index')}}">Permissões disponiveis ao Perfil</a></li>
   </ol>

   <h8>Permissões disponiveis ao Perfil <small><strong>{{$profile->name}}</strong></small></h8> 
@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('profiles.permissions.available', $profile->id)}}" method="POST" class="form form-inline">
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
               <form action="{{ route('profiles.permissions.attach', $profile->id)}}" method="POST">
                  @csrf
                     @foreach($permissions as $permission) 
                        <tr>
                           <td>
                              <input type="checkbox" name="permissions[]" value="{{$permission->id}}"></input>
                           </td>
                           <td>{{$permission->name}}</td>
                        </tr>
                     @endforeach

                     <tr>
                        <td colspan="500"> 
                           @include('admin.includes.alerts')

                           <button type="submit" class="btn btn-success">Vincular</button>                     
                        </td>
                     </tr>
               </form>
             </tbody>
          </table>       
       </div>
      <div class="card-footer">     
         @if (isset($filters))
            {!!$permissions->appends($filters)->links() !!}
         @else
            {!!$permissions->links() !!}
         @endif
      </div>
    </div>
@stop

