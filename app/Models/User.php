<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

    class User extends Model{
        // Campi che non verranno ritornati da query sul database, per evitare di mostrare contenuti sensibili 
        protected $hidden = ['password'];

        //attributi che possono essere assegnati in massa
        protected $fillable = [
            'username', 'password', 'email', 'name', 'surname'
        ];

       //relazione con posts di tipo 1.N, con likes di tipo 1.N, comments 1 . N
        public function posts(){
            return $this->hasMany('App\Models\Post');
        }

        public function comments(){
            return $this->hasMany('App\Models\Comment');
        }

        public function likes(){  
            return $this->hasMany('App\Models\Like');
        }

    }

?>