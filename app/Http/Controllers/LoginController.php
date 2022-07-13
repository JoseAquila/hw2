<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Request;

class LoginController extends BaseController
{   
    public function login_form()
    {
        
        if(session('user_id') !== null ){
            return redirect('home');
        } else{//altrimenti mostro la pagina di login

            //verifichiamo se c'è stato un errore nel login
            $old_username = Request::old('username');
            return view('login')
            ->with('old_username', $old_username);
        }
    }

    public function do_login()
    {   
        $user = User::where('username', request('username'))->first();
        
        if(isset($user)){
            if(password_verify(request('password'), $user->password)){
                //credenziali valide, impostiamo una sessione salvando l'id dell'utente
                Session::put('user_id', $user->id);
                return redirect('home')
                ->with('user', $user);
            }
        } else{
            //credenziali non valide
            return redirect('login')->withInput(); 
        }      
       
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
    

}