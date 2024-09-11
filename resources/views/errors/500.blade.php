@extends('layouts.app', [
    'title' => 'Error del servidor'
])

@section('content')
    <h1>500 - Error del servidor</h1>
    <p>Ocurrió un problema interno en el servidor. Por favor, inténtalo más tarde.</p>
    <a href="/">Volver al inicio</a>
@endsection