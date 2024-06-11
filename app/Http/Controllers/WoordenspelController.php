<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Game;

class WoordenspelController extends Controller
{
    private $woorden = ["appel", "banaan", "kers"];

    public function index(Request $request)
    {
        if (!$request->session()->has('woord')) {
            $this->startNieuwSpel($request);
        }

        $bericht = $request->session()->get('bericht', 'Raad het woord! Je hebt 4 pogingen.');
        $pogingen = $request->session()->get('pogingen', 4);
        $geraden = $request->session()->get('geraden', false);
        $user = Auth::check() ? Auth::user() : null;

        return view('spelen', compact('bericht', 'pogingen', 'geraden','user'));
    }

    public function raad(Request $request)
    {
        $geradenWoord = strtolower(trim($request->input('woord')));

        if ($geradenWoord == $request->session()->get('woord')) {
            $request->session()->put('bericht', "Gefeliciteerd! Je hebt het woord geraden: " . $request->session()->get('woord'));

            $request->session()->put('geraden', true);
        } else {
            $pogingen = $request->session()->decrement('pogingen');
            if ($pogingen <= 0) {
                $request->session()->put('bericht', "Je hebt verloren. Het juiste woord was: " . $request->session()->get('woord'));
            } else {
                $request->session()->put('bericht', "Verkeerd woord. Probeer opnieuw. Pogingen over: " . $pogingen);
            }
        }

        return redirect('/spelen');
    }

    public function nieuwSpel(Request $request)
    {
        $this->startNieuwSpel($request);
        return redirect('/spelen');
    }

    private function startNieuwSpel(Request $request)
    {
        $woord = $this->woorden[array_rand($this->woorden)];
        $request->session()->put('woord', $woord);
        $request->session()->put('pogingen', 4);
        $request->session()->put('geraden', false);
        $request->session()->put('bericht', "Raad het woord! Je hebt 4 pogingen.");
    }
   

    public function gameresualt(Request $request)
    {  // Valideren van de invoervelden
        
    
        // Nieuwe gebruiker aanmaken en opslaan
        $gebruiker = new Game;
        $gebruiker->name = $request->input('name');
        $gebruiker->massage = $request->input('massage');
        $gebruiker->resualt = $request->input('resualt');
        $gebruiker->save();
    
        // Doorsturen naar de homepage
        return redirect('/userdash');
    }

    public function showGame(){
        $pageTitle = "welcome";
       $games = Game::all();
       return view('welcome', compact('pageTitle', 'games'));
    }

   //show users behaf ingelode user 
    public function showGebruikerDash()
    {
        $pageTitle = "User Dash";
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();
        
        return view('vrienden', compact('users', 'user' ,'pageTitle' ));
    }

  //add friend 
  public function addFriend(Request $request)
  {
      $user = Auth::user();
      $friendEmail = $request->input('friend_id');
      
      // Zoek de vriend op basis van het e-mailadres
      $friend = User::where('id', $friendEmail)->first();
      
      if ($friend && $friend->id !== $user->id) {
          $user->friends()->attach($friend->id);
          return redirect()->back()->with('success', 'Friend added successfully');
      }

      return redirect()->back()->with('error', 'Friend not found or you cannot add yourself');
  }

//remove friend 
public function removeFriend($friendId)
{
    $user = Auth::user();
    $user->friends()->detach($friendId);

    return redirect()->back()->with('success', 'Friend removed successfully');
}


//show friend 

public function showProfile()
{
    $pageTitle = "User Dash";
    $user = Auth::user();
    $friends = $user->allVrienden()->get();

    return view('userdash', compact('user', 'friends','pageTitle'));
}








}
