@extends('master.main')

@section('styles')
@stop

@section('scripts')
@stop

@section('content')

    @component('components.players.player-form-edit', ['player' => $player, 'countries' => $countries])
    @endcomponent

@stop
