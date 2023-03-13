@extends('layouts.admin')
@section('content')
<h1>Nuovo post inserito</h1>
<p>
    Nuovo Post Inserito <br>
    Titolo: {{$lead->title}}
    Slug: {{$lead->slug}}
    Contenuto: {{$lead->content}}
</p>
@endsection