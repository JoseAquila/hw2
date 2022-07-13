<?php
    namespace App\Http\Controllers;
    use Illuminate\Routing\Controller as BaseController;
    use Session;
    use Illuminate\Http\Request;
    use App\Models\Post;
    use App\Models\User;
    use App\Models\Like;


class LikeController extends BaseController
{ 

    public function addLike(Request $request){
        
        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));
        
        Post::find($request->id)->likes()->where('user_id', $user);  //corrisponde a -> $post = Post::find($request->id);        $post->likes......
        
        //inserisce nella tabella likes
        $like = new Like;
        $like->user_id = $user->id;
        $like->post_id = $request->id;
        $like->save();   
        // Si attiva il trigger che aggiorna il numero di likes nei post

        $post = Post::find($request->id);
        
        return response()->json([
            'postid'=> $request->id,
            'liked' => true,
            'nlikes' => $post->nlikes
        ]);

    }

    public function removeLike(Request $request){ 
        
        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));
          
        $like = Like::where('user_id', $user->id)->where('post_id', $request->id)->delete();
        // Si attiva il trigger che aggiorna il numero di likes nei post

        $post = Post::find($request->id);
        
        return response()->json([
            'postid'=> $request->id,
            'liked' => false,
            'nlikes' => $post->nlikes
        ]);

    }


    public function likeView($postid){
        
        if(session('user_id') == null ){
            return redirect('login');
        }

        $user = User::find(session('user_id'));
        
        $likes = Like::join('posts', 'likes.post_id', '=', 'posts.id')
        ->join('users', 'users.id', '=', 'likes.user_id')
        ->where('posts.id', $postid)
        ->get(['users.username as username','users.name as name','users.surname as surname']); //restituisce un array di entità

        return $likes;

    }

}