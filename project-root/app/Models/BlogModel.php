<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $allowedFields = ['id','title', 'slug', 'body', 'author'];


    public function get_blog_by_id($id = null)
    {
        if ($id === false) {
            $this->session->setFlashData('error', 'No blog found');
        }else{
            return $this->where(['id' => $id])->first();
        }
    }

    public function get_all_blogs()
    {
            return $this->findAll();

    }




}