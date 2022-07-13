<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Like extends Model{
        

        protected $fillable = [
            'user_id', 'post_id'
        ];

        protected $casts = [
            'text' => 'array' 
        ];

        public function user(){
            return $this->belongsTo('App\Models\User'); // relazione => un like è creato da un singolo utente
        }

        public function post(){
            return $this->belongsTo('App\Models\Post'); // relazione => un like è in un post
        }

    }

?>