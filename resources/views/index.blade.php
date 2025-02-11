@extends('layouts.app')
@section('title', 'Veja o Resultado dos Jogos')

@section('header')
<header class="py-10 text-center">
    <h1 class="text-3xl font-bold">Veja os Resultados dos Jogos</h1>
</header>
@endsection

@section('main')
<div class="max-w-7xl mx-auto px-4">
    <div class="flex justify-center">
        @if(isset($competitions))
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <form action="{{ route('matches.show') }}" method="GET">
                <div class="mb-4">
                    <label for="competition" class="block font-medium">Escolha o Campeonato</label>
                    <select name="competitionInfo" id="competition" class="w-full px-4 py-2 border rounded">
                        @foreach($competitions as $competition)
                            <option value="{{ $competition['id'] }}|{{ $competition['code'] }}">
                                {{ $competition['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ver Jogos
                </button>
            </form>
        </div>
        @elseif(isset($teams))
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <form action="{{ route('matches.time.show') }}" method="GET">
                <div class="mb-4">
                    <label for="team" class="block font-medium">Escolha um Time</label>
                    <select name="team" id="team" class="w-full px-4 py-2 border rounded">
                        @foreach($teams as $team)
                            <option value="{{ $team['id'] }}">
                                {{ $team['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ver Jogos
                </button>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection
