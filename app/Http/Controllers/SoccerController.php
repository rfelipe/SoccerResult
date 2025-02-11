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

    // public function index()
    // {
    //     $matches = $this->soccerApiService->getMatches($params);

    //     if ($matches) {
    //         return view('index', ['matches' => $matches['matches']]);
    //     }

    //     return view('index', ['error' => 'Não foi possível obter as partidas.']);
    // }

    public function listCompetitions()
    {
        $competitions = $this->soccerApiService->getCompetitions();

        if ($competitions) {
            return view('index', ['competitions' => $competitions['competitions']]);
        }
        return view('index', ['error' => 'Não foi possível obter as partidas.']);
    }

    public function listTeams()
    {
        $info = explode('|', $request->input('competitionInfo'));
        $competitionId = $info[0];
        $competitionCode = $info[1];

        $teams = $this->soccerApiService->getTeams($competitionCode);

        if ($teams) {
            return view('listTeam', ['teams' => $teams['teams']]);
        }
        return view('listTeam', ['error' => 'Não foi possível obter as partidas.']);
    }

    public function showMatches(Request $request)
    {
        $info = explode('|', $request->input('competitionInfo'));
        $competitionId = $info[0];
        $competitionCode = $info[1];

        $matches = $this->soccerApiService->showMatches($competitionId);
        $matchesLast = $this->soccerApiService->showMatchesLast($competitionId);
        $teams = $this->soccerApiService->getTeams($competitionCode);

        if ($matches) {
            return view('show', ['matches' => $matches, 'matchesLast' => $matchesLast, 'teams' => $teams]);
        } else {
            return view('show', ['error' => 'Não foi possível obter os jogos.']);
        }
    }

    public function showMatchesTeam(Request $request)
    {
        $teamId = $request->input('team');

        $teamMatches = $this->soccerApiService->showTeamMatches($teamId);
        $teamMatchesLast = $this->soccerApiService->showTeamMatchesLast($teamId);
        $competitions = $this->soccerApiService->getCompetitions();

        if ($teamMatchesLast) {
            return view('show', ['matches' => $teamMatches, 'matchesLast' => $teamMatchesLast, 'competitions' => $competitions['competitions']]);
        } else {
            return view('show', ['error' => 'Não foi possível obter os jogos.']);
        }
    }
}
