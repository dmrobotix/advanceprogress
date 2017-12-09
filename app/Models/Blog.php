<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
  /**
  *
  * table specific parameters
  *
  **/
  
  protected $table = 'blog';
  protected $primaryKey = 'blog_id';
  protected $fillable = ['title',
                          'post',
                          'author'
                        ];
}
