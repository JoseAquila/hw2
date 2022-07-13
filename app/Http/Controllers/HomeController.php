<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class HomeController extends BaseController
{ 
    public function index()
    {
        
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');
        
        return view("home");
    }

    public function profilo(){
            
        $session_id = session('user_id');//verifico se utente ha fatto login
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');
            
        //altrimenti, prendo le info
        return view('profile')
            ->with('name', $user->name)
            ->with('surname', $user->surname)
            ->with('username', $user->username)
            ->with('email', $user->email)
            ->with('numeroPost', $user->numeroPost);
    }

    public function cat()
    {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('login');
        
        $url = 'https://api.thecatapi.com/v1/images/search';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);//imposto url
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//restituisco il result come stringa
        $res=curl_exec($ch);
        curl_close($ch);
        return $res;
    }

}