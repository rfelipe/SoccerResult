@extends('layouts.app')
@section('title', 'Exibi Resultado dos jogos')

@section('header')
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        @if(isset($competitions))
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <h1>Selecione uma Competição</h1>
                <form action="{{ route('matches.show') }}" method="GET">
                    <div class="form-group">
                        <label for="competition">Escolha o Campeonato</label>
                        <select name="competitionInfo" id="competition" class="form-control">
                            @foreach($competitions as $competition)
                                <option value="{{ $competition['id'] }}|{{ $competition['code'] }}">
                                    {{ $competition['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ver Jogos</button>
                </form>
            </div>
        @elseif(isset($teams))
            <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                <h1>Selecione uma Competição</h1>
                <form action="{{ route('matches.time.show') }}" method="GET">
                    <div class="form-group">
                        <label for="team">Escolha um time</label>
                        <select name="team" id="team" class="form-control">
                            @foreach($teams as $team)
                                <option value="{{ $team['id'] }}">
                                    {{ $team['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ver Jogos</button>
                </form>
            </div>
        @endif
    </header>
@endsection

@section('main')
    <main class="mt-6">
        <div>
            @if(isset($matches))
                <ul>
                    @foreach($matches as $match)
                        <li>
                            {{ $match['homeTeam']['name'] . ' ' .  $match['score']['fullTime']['home'] }} 
                            vs 
                            {{ $match['score']['fullTime']['home'] . ' ' . $match['awayTeam']['name'] }}
                            - {{ $match['utcDate'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>{{ $error }}</p>
            @endif
        </div>
    </main>
@endsection
