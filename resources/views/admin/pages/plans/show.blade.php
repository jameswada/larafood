@extends('adminlte::page')

@section('title', "Detalhe do  Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do Plano <b>{{$plan->name}}</b> </h1>
@stop

@section('content')
   <div class="card">
      <div class="card-body">
         <ul>
            <li>
               <strong>Nome: </strong>{{ $plan->name}}
            </li>
            <li>
               <strong>URL: </strong>{{ $plan->url}}
            </li>
            <li>
               <strong>Preço: </strong>{{ number_format($plan->price,2,',','.')}}
            </li>
            <li>
               <strong>Descrição: </strong>{{ $plan->description}}
            </li>
         </ul>

         
         @include('admin.includes.alerts')
         <form action="{{route('plans.destroy',$plan->url)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar Plano</button>
         </form>
      </div>
   </div>
@endsection