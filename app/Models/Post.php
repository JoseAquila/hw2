<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Post extends Model{


        protected $fillable = [
            'user_id', 'type', 'content'
        ];

        protected $casts = [
            'content' => 'array' 
        ];//importante x convertire 
        
        public function user(){
            return $this->belongsTo('App\Models\User'); // relazione => un post è creato da un singolo utente
        }

        public function comment(){
            return $this->hasMany('App\Models\Comment'); // relazione => un post può avere n commenti
        }

        public function likes(){
            return $this->hasMany('App\Models\Like','user_id'); // relazione => un post può avere n likes, ma un like appartiene ad un solo post
        }//passo user_id perchè, essendo nella classe post, laravel si aspetta che likes abbia una classe post_id e quindi la mia primary key non è id come di consueto ma user_id
    }

?>