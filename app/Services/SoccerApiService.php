<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class SoccerApiService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.soccer_data.api_key');
        $this->baseUrl = 'https://api.football-data.org/v4/';
    }


    public function getCompetitions()
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->apiKey,
        ])->get($this->baseUrl . 'competitions/' );

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function getTeams($competitionCode)
    {
        $response = Http::withHeaders([
            'X-Auth-Token' => $this->apiKey,
        ])->get($this->baseUrl . 'competitions/' . $competitionCode . '/teams' );


        if ($response->successful()) {
            return $response->json()['teams'];
        }

        return null;
    }

    public function showMatches($competitionId)
    {
 
        $dateFrom = Carbon::now()->subWeek()->toDateString(); 
        $dateTo = Carbon::now()->addWeek()->toDateString();
        $datebetween = '?dateFrom=' . $dateFrom . '&dateTo=' . $dateTo;

        $response = Http::withHeaders([
            'X-Auth-Token' => $this->apiKey,
        ])->get($this->baseUrl . 'competitions/' . $competitionId . '/matches' . $datebetween);

        if ($response->successful()) {
            return $response->json()['matches'];
        }

        return null;
    }
    
    // public function showMatchesLast($competitionId)
    // {
    //     $dateFrom = Carbon::now()->subWeek()->toDateString(); 
    //     $dateTo = Carbon::now()->toDateString();
    //     $datebetween = '?dateFrom=' . $dateFrom . '&dateTo=' . $dateTo;

    //     $response = Http::withHeaders([
    //         'X-Auth-Token' => $this->apiKey,
    //     ])->get($this->baseUrl . 'competitions/' . $competitionId . '/matches' . $datebetween);

    //     if ($response->successful()) {
    //         return $response->json()['matches'];
    //     }

    //     return null;
    // }

    public function showTeamMatches($teamId)
    {
        $dateFrom = Carbon::now()->subWeek()->toDateString(); 
        $dateTo = Carbon::now()->addWeek()->toDateString();
        $dateBetween = '?dateFrom=' . $dateFrom . '&dateTo=' . $dateTo;

        $response = Http::withHeaders([
            'X-Auth-Token' => $this->apiKey,
        ])->get($this->baseUrl . 'teams/' . $teamId . '/matches' . $dateBetween);

        if ($response->successful()) {
            return $response->json()['matches'];
        }

        return null;
    }

    // public function showTeamMatchesLast($teamId)
    // {
    //     $dateFrom = Carbon::now()->subWeek()->toDateString(); 
    //     $dateTo = Carbon::now()->toDateString(); 
    //     $dateBetween = '?dateFrom=' . $dateFrom . '&dateTo=' . $dateTo;

    //     $response = Http::withHeaders([
    //         'X-Auth-Token' => $this->apiKey,
    //     ])->get($this->baseUrl . 'teams/' . $teamId . '/matches' . $dateBetween);

    //     if ($response->successful()) {
    //         return $response->json()['matches'];
    //     }

    //     return null;
    // }

}