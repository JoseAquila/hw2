<?php
    namespace App\Http\Controllers;
    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use Illuminate\Http\Request;
    use App\Models\Post;
    use App\Models\User;
    use App\Models\Comment;


class CommentController extends BaseController
{ 
    public function addComment(Request $request){
        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));
        $text = $request->comment;//name = 'comment' in home blade .php

        if(isset($request->postid)){// Se la richiesta è di aggiunta del commento, ho salvato il post id dentro il form commenti
            $comment = new Comment;
            $comment->user_id = $user->id;
            $comment->post_id = $request->postid;
            $comment->text = $text;
            $comment->save();  
            //si ativa il trigger 
        }

        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                                 ->where('comments.post_id', $request->postid)
                                 ->orderBy('comments.time')
                                 ->get(['comments.id as id',
                                       'comments.post_id as postid',
                                       'users.username as username',
                                       'comments.text as text',
                                       'comments.time as time']); 

        //aggiungo il tempo trascorso
        $commentsArray = array();
        foreach($comments as $comment){
            //$commentTime = $this->getTime($comment->time);
            $commentsArray[] = array(
                                'id' => $comment->id,
                                'postid' => $comment->postid, 
                                'username' => $comment->username,
                                'text' => $comment->text,
                                //'time' => $commentTime
                                'time' => $comment -> time
                                                                    );
        }
    
        return $commentsArray;//converte automaticame l array in in json


    }
    

    public function showComments($postid){

        if(session('user_id') == null ){
            return redirect('login');
        }

        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                                 ->where('comments.post_id', $postid)
                                 ->orderBy('comments.time')
                                 ->get(['comments.id as id',
                                       'comments.post_id as postid',
                                       'users.username as username',
                                       'comments.text as text',
                                       'comments.time as time']);                                        

        //aggiungo il tempo trascorso
        $commentsArray = array();
        foreach($comments as $comment){
            //$commentTime = $this->getTime($comment->time);
            $commentsArray[] = array(
                                'id' => $comment->id,
                                'postid' => $comment->postid, 
                                'username' => $comment->username,
                                'text' => $comment->text,
                                //'time' => $commentTime
                                'time' => $comment -> time
                            );
        }
    
        return $commentsArray;
    }



    /*
    function getTime($timestamp) {      
        // Calcola il tempo trascorso dalla pubblicazione del post       
        $old = strtotime($timestamp); 
        $diff = time() - $old;           
        $old = date('d/m/y', $old);
    
        if ($diff /60 <1) {
            return intval($diff%60)." secondi fa";
        } else if (intval($diff/60) == 1)  {
            return "Un minuto fa";  
        } else if ($diff / 60 < 60) {
            return intval($diff/60)." minuti fa";
        } else if (intval($diff / 3600) == 1) {
            return "Un'ora fa";
        } else if ($diff / 3600 <24) {
            return intval($diff/3600) . " ore fa";
        } else if (intval($diff/86400) == 1) {
            return "Ieri";
        } else if ($diff/86400 < 30) {
            return intval($diff/86400) . " giorni fa";
        } else {
            return $old; 
        }
    }
    */

}