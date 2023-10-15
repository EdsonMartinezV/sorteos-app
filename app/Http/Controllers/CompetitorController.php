<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetitorRequest;
use App\Models\Competitor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompetitorController extends Controller
{
    public function index(): View{
        $competitors = Competitor::paginate();
        return view('competitors.index', ['competitors' => $competitors]);
    }

    public function create(CompetitorRequest $request): RedirectResponse{
        $validated = $request->validated();
        $competitor = Competitor::firstOrCreate([
            ['phone' => $validated['phone']],
            [
                'name' => $validated['name'],
                'lastname' => $validated['lastname']
            ],
        ]);
        $competitor->lotteries()->attach($validated['lottery_id'], ['ticket_number' => $validated['ticket_number']]);

        return redirect()->route('showCompetitors');
    }
}
