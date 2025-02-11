<?php

namespace App\Http\Controllers;

use App\Services\SoccerApiService;
use Illuminate\Http\Request; 

class SoccerController extends Controller
{
    protected $soccerApiService;

    public function __construct(SoccerApiService $soccerApiService)
    {
        $this->soccerApiService = $soccerApiService;
    }

    public function index()
    {
        $matches = $this->soccerApiService->getMatches($params);

        if ($matches) {
            return view('index', ['matches' => $matches['matches']]);
        }

        return view('index', ['error' => 'Não foi possível obter as partidas.']);
    }

    public function listCompetitions()
    {
        $competitions = $this->soccerApiService->getCompetitions();

        if ($competitions) {
            return view('form', ['competitions' => $competitions['competitions']]);
        }
        return view('form', ['error' => 'Não foi possível obter as partidas.']);
    }

    public function listTeams()
    {
        $teams = $this->soccerApiService->getTeams();

        if ($teams) {
            return view('listatime', ['teams' => $teams['teams']]);
        }
        return view('listatime', ['error' => 'Não foi possível obter as partidas.']);
    }

    public function showMatches(Request $request)
    {
        $params = $request->only(['dateFrom', 'dateTo']);
        $competitionId = $request->only(['competitionId']);

        $matches = $this->soccerApiService->showMatches($competitionId['competitionId'], $params);
        $matchesLast = $this->soccerApiService->showMatchesLast($competitionId['competitionId'], $params);

        if ($matches) {
            return view('index', ['matches' => $matches, 'matchesLast' => $matchesLast]);
        } else {
            return view('index', ['error' => 'Não foi possível obter os jogos.']);
        }
    }
}
