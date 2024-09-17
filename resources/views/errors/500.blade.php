@extends('layouts.app', [
    'title' => 'Error del servidor'
])

@section('content')
    <h1>500 - Página no encontrada</h1>
    <p>Lo sentimos, la página que buscas no existe.</p>
    <a href="{{url('/')}}">Volver al inicio</a>
@endsection
