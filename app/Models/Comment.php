<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    
    class Comment extends Model{
        protected $table = 'comments';

        protected $fillable = [
            'id', 'user_id', 'post_id', 'text'
        ];

        protected $casts = [ //converte i dati del database sia quando li leggiamo che quando li scriviamo in un certo formato
            'text' => 'array' 
        ];

        public function user(){
            return $this->belongsTo('App\Models\User'); // relazione => un commento è creato da un singolo utente
        }

        public function post(){
            return $this->belongsTo('App\Models\Post'); // relazione => un commento è in un post
        }

    }

?>