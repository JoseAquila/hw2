<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends BaseController
{   
    public function register_form()
    {//visualizzo form
        if(Session::get('user_id'))
        {
            return redirect('home');
        }//else
        return view ('register');
    }

    protected function do_register(Request $request)
    {

            $error = array();

            $name = $request->name;
            $surname = $request->surname;
            $username = $request->username;
            $email = $request->email;
            $password = $request->password;
            $confirm_password = $request->confirm_password;  

            if(empty($name))
            {
                array_push($error, "Nome non valido");
            }
    
            if(empty($surname))
            {
                array_push($error, "Cognome non valido");
            }
    
            if(empty($username))
            {
                array_push($error, "Username richiesto");
            }else if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $username)) {
                array_push($error, "Username non valido");
            }
    
            if(empty($email))
            {
                array_push($error, "Email richiesta");
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Email non valida");
            } 
    
            if(empty($password))
            {
                array_push($error, "Password richiesta");
            } else if ( strlen($password) < 8 ) {
                array_push($error, "Caratteri password insufficienti");

            } 
    
            if (strcmp($password, $confirm_password) != 0) {
                array_push($error, "Le passwords non coincidono");
            }

            if(count($error) > 0){
                return;
            }
            //se sono qui significa che sopra ho avuto 0 errori
            //verifico  la disponibilita' nel db
            $user = User::where('username', $username)->first();

            if ($user != null) { // if user exists
                if ($user->username === $username) {
                    array_push($error, "Username già esistente");
                }
            
                if ($user->email === $email) {
                    array_push($error, "Email già esistente");
                }
            }

            if(count($error) === 0)//se non ho riscontrato nessun errore sopra
            {
                //criptare  password prima di salvarla nel database
                $password_cript= password_hash($password, PASSWORD_BCRYPT);

                //inserisco nella tabella users
                $new_user = new User;
                $new_user->name = $name;
                $new_user->surname = $surname;
                $new_user->username = $username;
                $new_user->email = $email;
                $new_user->password = $password_cript;
                $new_user->save();   

                if($new_user){//se andato a buon fine, reindirizzo subito alla home
                    Session::put('user_id', $new_user->id);
                    return redirect('home');
                }else{
                    return redirect('register')->withInput();
                }

            } else{//se ho qualche tipo di errore
                return redirect('register')->withInput();
            }
        }

    //fetch
    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }
    //fetch
    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

}
