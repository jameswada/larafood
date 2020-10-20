@extends('adminlte::page')

@section('tenant', "Detalhes do Empresas {$tenant->name}")

@section('content_header')
    <h1>Detalhes do Empresas <b>{{$tenant->name}}</b> </h1>
@stop

@section('content')
   <div class="card">
      <div class="card-body">
         <img src="{{ url("storage/{$tenant->logo}")}}" alt="{{$tenant->name}}" style="max-width:50px">
           
         <ul>
            <li>
               <strong>Plano: </strong>{{ $tenant->plan->name}}
            </li>
            <li>
               <strong>Nome: </strong>{{ $tenant->name}}
            </li>
            <li>
               <strong>CNPJ: </strong>{{ $tenant->cnpj}}
            </li>            
            <li>
               <strong>URL: </strong>{{ $tenant->url}}
            </li>
            <li>
               <strong>Email: </strong>{{ $tenant->email}}
            </li>
            <li>
               <strong>Ativo: </strong>{{ $tenant->active=='Y'?'Sim':'Não'}}
            </li>        
         </ul>          
         <hr>  
         <h1>Assinatura</h1>
         <ul> 
            <li>
               <strong>identificação: </strong>{{ $tenant->subscription_id}}
            </li>    
            <li>
               <strong>Inicio em: </strong>{{ $tenant->subscription}}
            </li>

            <li>
               <strong>Expira em: </strong>{{ $tenant->expires_at}}
            </li>

            <li>
               <strong>Situação: </strong>{{ $tenant->subscription_suspended=='Y'?'Sim':'Não'}}
            </li>

            
         </ul>

         
         @include('admin.includes.alerts')
         <form action="{{route('tenants.destroy',$tenant->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar Empresa</button>
         </form>
      </div>
   </div>
@endsection