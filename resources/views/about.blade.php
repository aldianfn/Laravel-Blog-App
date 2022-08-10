@extends('template.main')

@section('content')
    <h4>{{ $name }}</h4>
    <p>{{ $email }}</p>
    <img src="assets/img/{{ $img }}" alt="{{ $name }}" class="rounded" style="width: 20%; height: 20%;">
@endsection