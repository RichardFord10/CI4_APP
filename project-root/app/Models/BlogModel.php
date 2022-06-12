<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $allowedFields = ['title', 'slug', 'body'];


    public function get_blog($slug = null)
    {
        if ($slug === false) {
            return $this->findAll();
        }else{
            return $this->where(['slug' => $slug])->first();
        }
    }




}