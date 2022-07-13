<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;


class PostController extends BaseController
{   
    public function view(){// visualizzo view per  nuovo post
            
        //verifichiamo se l'utente non ha fatto il login
        if(session('user_id') == null ){
            return redirect('login');
        }//else
        return view('create_post_view');
    }

    public function create(Request $request){//funz form quando clicco submit e quindi devo caricare il post nel db
       
        //verifichiamo se l'utente ha fatto il login
        if(session('user_id') === null ){
            return redirect('login');
        }//else

        $content = $this->createText($request);
            
        if ($content == null) 
            return response()->json(['ok'=> false]);

        $user = User::find(session('user_id'));
        
        //inserisco nella tabella posts
        $add_post = new Post;
        $add_post->user_id = $user->id;
        $add_post->content = $content;
        $add_post->save();
        
        return response()->json(['ok'=> true]);

    }


    function createText(Request $request) {
        return [
            'type' => $request->type,
            'text' => $request->text
        ];
    }

}