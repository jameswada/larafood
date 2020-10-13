@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuario')

@section('content_header')
    <h1>Cadastrar Novo Usuario</h1>
@stop

@section('content')
    <!-- <p>Listagem dos Usuarios</p> -->
    <div class="card">
      <div class="card-body">
         <form action="{{ route('users.store')}}" class="form" method="POST">
            @csrf 
            
            @include('admin.pages.users._partials.form')
          </form>
      </div>
   </div> 

@endsection