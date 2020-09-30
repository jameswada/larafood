@extends('adminlte::page')

@section('title', "Detalhe ({$plan->name} )")

@section('content_header')
   <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{ route('admin.index')}}">Dashboard</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.index')}}">Planos</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('plans.show',$plan->url)}}">{{ $plan->name}}</a></li>
      <li class="breadcrumb-item"> <a href="{{ route('details.plans.index', $plan->url)}}">Detalhes</a></li>
      <li class="breadcrumb-item active"> <a href="{{ route('details.plans.edit', [$plan->url,$detail->id])}}">Detalhes</a></li>
   </ol>

   <h1>Detalhe ({{$plan->name}}) </h1> 

@stop

@section('content')
   <div class="card">
      <div class="card-body">
         <ul>
            <li>
               <strong>Nome:</strong> {{ $detail->name }}
            </li>
         </ul>
      </div>
      <div class="card-footer">
         <form action="{{ route('details.plans.destroy',[$plan->url,$detail->id] )    }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar o Detalhe ({{ $detail->name}}) do Plano ({{$plan->name}}) </button>
         </form>
      </div>
   </div>
@endsection