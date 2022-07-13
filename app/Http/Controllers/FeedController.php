<?php
    namespace App\Http\Controllers;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Session;
    use App\Models\Post;
    use App\Models\User;
    use App\Models\Comment;
    use App\Models\Like;


class FeedController extends BaseController
{      
    
    public function getPosts(){ /* fetch_post.php nell'hw1 */

        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));

        $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
        ->orderBy('posts.time', 'DESC')
        ->get(['users.id as userid', 'users.name as name',
                'users.surname as surname', 'users.username as username', 'posts.id as postid',
                'posts.time as time', 'posts.content as content', 'posts.nlikes as nlikes',
                'posts.ncomments as ncomments']);

        foreach($posts as $post){
            $like = $user->likes()->where('post_id', $post->postid)->first();

            if(isset($like)){
                $post['liked'] = true;
            }
            else{
                $post['liked'] = false;
            }
        }

        $postArray = array();
        foreach($posts as $post){     

            //$postsTime = $this->getTime($post->time);

            $postArray[] = array('userid' => $post->userid, 'name' => $post->name, 'surname' => $post->surname, 'username' => $post->username, 
                                'postid' => $post->postid,  
                                    'content' => $post->content, 'nlikes' => $post->nlikes,'ncomments' => $post->ncomments,
                                //'time' => $postsTime,
                                'time' => $post->time,
                                'liked' => $post->liked );
        }

        return $postArray;//converte automaticame l array in json 
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

?>
