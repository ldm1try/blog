<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogUpload extends Model
{

    use SoftDeletes;

    protected $fillable
        = [
            'post_id',
            'path',
            'original_name',
            'extension',
            'mime_type',
            'size',
        ];
}
