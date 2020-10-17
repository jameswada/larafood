@extends('adminlte::page')

@section('title', "Editar Mesa")

@section('content_header')
    <h1>Editar Mesa ({{$table->identity}})</h1>
@stop

@section('content')
    <!-- <p>Listagem dos Mesass</p> -->
    <div class="card">
      <div class="card-body">
         <form action="{{ route('tables.update', $table->id)}}" class="form" method="POST">
            @csrf 
            @method('PUT')
            @include('admin.pages.tables._partials.form')

           

         </form>
      </div>
   </div> 

@endsection