@extends('adminlte::page')

@section('title', 'Cadastrar Novo Permissão')
@section('title', 'Cadastrar Novo Permissão')

@section('content_header')
    <h1>Cadastrar Novo Permissão</h1>
@stop

@section('content')
    <!-- <p>Listagem dos Permissão</p> -->
    <div class="card">
      <div class="card-body">
         <form action="{{ route('permissions.store')}}" class="form" method="POST">
            @csrf 
            
            @include('admin.pages.permissions._partials.form')
          </form>
      </div>
   </div> 

@endsection