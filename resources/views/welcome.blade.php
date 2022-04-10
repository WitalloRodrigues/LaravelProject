@extends('layouts.main')
@section('title','HDC Events')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="events-container" class="col-md-12">          
@if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="card-container" class="row">
        @foreach($events as $event)
        <div class="card col-md-3">
        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="car-participants"> X participantes</p>
                <div class="row">
                    <a href="/events/{{ $event->id }}" class="btn btn-outline-warning" ><ion-icon name="newspaper-outline"></ion-icon>Saber mais</a>
                    <a href="/events/edit/{{$event->id}}" class="btn btn-outline-info edit-btn"><ion-icon name="create-outline"></ion-icon>editar</a>
                    <form action="/events/{{ $event->id }}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-outline-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>     
@endsection
  
