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
  protected $fillable = ['title',
                         'body',
                         'keywords',
                         'permalink',
                         'publish'
                        ];
}
