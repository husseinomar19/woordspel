<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WoordenspelController extends Controller
{
    private $woorden = ["appel", "banaan", "kers", "druif", "mango", "peer", "perzik", "pruim", "watermeloen", "sinaasappel"];

    public function index(Request $request)
    {
        if (!$request->session()->has('woord')) {
            $this->startNieuwSpel($request);
        }

        $bericht = $request->session()->get('bericht', 'Raad het woord! Je hebt 4 pogingen.');
        $pogingen = $request->session()->get('pogingen', 4);
        

        return view('spelen', compact('bericht', 'pogingen')); // Stuur het woord naar de view
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
}
