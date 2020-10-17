@extends('adminlte::page')

@section('title', "Detalhes da Mesa {$table->name}")

@section('content_header')
    <h1>Detalhes do Mesa <b>{{$table->name}}</b> </h1>
@stop

@section('content')
   <div class="card">
      <div class="card-body">
         <ul>
            <li>
               <strong>Identificador da Mesa: </strong>{{ $table->identity}}
            </li>
            <li>
               <strong>Descrição: </strong>{{ $table->description}}
            </li>
         </ul>

         
         @include('admin.includes.alerts')
         <form action="{{route('tables.destroy',$table->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar Mesa</button>
         </form>
      </div>
   </div>
@endsection