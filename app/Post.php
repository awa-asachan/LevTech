<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateBylimit(int $limit_count = 5 )
    {
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);
    }
}
