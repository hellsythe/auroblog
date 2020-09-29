<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    private function generateSlug()
    {

    }

    public function save(array $options = [])
    {

        if (empty($this->id) or $this->isDirty('name')) {
            $this->slug = $this->generateSlug($this->name);
        }

        parent::save($options);
    }

}
