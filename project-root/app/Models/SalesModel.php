<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table = 'sales';
    protected $allowedFields = ['id','title', 'slug', 'body', 'author'];


    public function get_sale_by_id($id = null)
    {
        if ($id === false) {
            $this->session->setFlashData('error', 'No sale found');
        }else{
            return $this->where(['id' => $id])->first();
        }
    }

    public function get_all_sales()
    {
            return $this->findAll();

    }




}