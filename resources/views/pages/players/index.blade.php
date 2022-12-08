@extends('master.main')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')

    @component('components.players.player-list', ['players' => $players])
    @endcomponent

@stop
