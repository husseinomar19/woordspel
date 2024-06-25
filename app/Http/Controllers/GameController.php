<?php

// app/Http/Controllers/GameController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Gamer;

class GameController extends Controller
{
    private $woorden = ["appel", "banaan", "kers"];

    public function index(Request $request)
    {
        $pageTitle = "Spelen";
        $user = Auth::user();
        $games = Gamer::where('user_id', $user->id)->orWhere('friend_id', $user->id)->get();

        return view('metvriendspelen', compact('games', 'user', 'pageTitle'));
    }

    public function startWithFriend(Request $request, $friendId)
    {
        $user = Auth::user();
        $woord = $this->woorden[array_rand($this->woorden)];

        Gamer::create([
            'user_id' => $user->id,
            'friend_id' => $friendId,
            'woord' => $woord,
            'user_pogingen' => 4,
            'friend_pogingen' => 4,
            'is_friend_turn' => true,
            'is_over' => false
        ]);

        return redirect()->route('spelen.index');
    }

    public function raadWithFriend(Request $request, Gamer $game)
    {
        $user = Auth::user();
        $geradenWoord = strtolower(trim($request->input('woord')));

        if ($game->is_over) {
            return redirect()->route('spelen.index')->with('bericht', 'Het spel is al afgelopen.');
        }

        if (($user->id == $game->user_id && !$game->is_friend_turn) || ($user->id == $game->friend_id && $game->is_friend_turn)) {
            if ($geradenWoord == $game->woord) {
                $game->update(['is_over' => true]);

                return redirect()->route('spelen.index')->with('bericht', 'Gefeliciteerd! Je hebt het woord geraden.');
            } else {
                if ($user->id == $game->user_id) {
                    $game->decrement('user_pogingen');
                    $game->update(['is_friend_turn' => true]);
                } else {
                    $game->decrement('friend_pogingen');
                    $game->update(['is_friend_turn' => false]);
                }

                if ($game->user_pogingen <= 0 || $game->friend_pogingen <= 0) {
                    $game->update(['is_over' => true]);

                    return redirect()->route('spelen.index')->with('bericht', 'Je hebt verloren. Het juiste woord was: ' . $game->woord);
                }

                return redirect()->route('spelen.index')->with('bericht', 'Verkeerd woord. Probeer opnieuw.');
            }
        }

        return redirect()->route('spelen.index')->with('bericht', 'Niet jouw beurt.');
    }

    public function nieuwSpel(Request $request)
    {
        // Start nieuw spel
    }
}

