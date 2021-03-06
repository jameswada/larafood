@extends('adminlte::page')

@section('title', 'Perfis disponiveis para o Plano'  )

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.index')}}">Planos</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.profiles', $plan->id)}}">Perfis</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('plans.profiles.available', $plan->id)}}">Disponiveis</a></li>
   </ol>

   <h8>Perfis disponiveis para o Plano <small><strong>{{$plan->name}}</strong></small></h8> 
@stop

@section('content')
    <div class="card">
       <div class="card-header">
         <form action="{{ route('plans.profiles.available', $plan->id)}}" method="POST" class="form form-inline">
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
               <form action="{{ route('plans.profiles.attach', $plan->id)}}" method="POST">
                  @csrf
                     @foreach($profiles as $profile) 
                        <tr>
                           <td>
                              <input type="checkbox" name="profiles[]" value="{{$profile->id}}"></input>
                           </td>
                           <td>{{$profile->name}}</td>
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
            {!!$profiles->appends($filters)->links() !!}
         @else
            {!!$profiles->links() !!}
         @endif
      </div>
    </div>
@stop

