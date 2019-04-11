<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = 'files' ;
      protected $fillable = ['name','book_id'];
      public $timestamps = true;

        public function Book(){
        return $this->belongsTo('App\Book','book_id');
}
}
