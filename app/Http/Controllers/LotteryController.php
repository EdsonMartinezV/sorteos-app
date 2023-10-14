<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeactivateLotteryRequest;
use App\Http\Requests\LotteryRequest;
use App\Models\Lottery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LotteryController extends Controller
{
    public function index(): View{
        $lotteries = Lottery::paginate();
        return view('lotteries.index', ['lotteries' => $lotteries]);
    }

    public function create(LotteryRequest $request): RedirectResponse{
        $validated = $request->validated();
        Lottery::create([
            'prize' => $validated['prize'],
            'is_active' => $validated['is_active'],
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('showLotteries');
    }

    public function deactivate(DeactivateLotteryRequest $request): RedirectResponse{
        $validated = $request->validated();
        $lottery = Lottery::find($validated['id']);
        $lottery->update(['is_active' => false]);

        return redirect()->route('showLotteries');
    }
}
