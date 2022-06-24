<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'items';
    protected $allowedFields = ["id","name","qty","cost","price","color","category","brand","images"];

    public function get_item_by_id($id = null)
    {
        if ($id === false) {
            $this->session->setFlashData('error', 'No item found');
        }else{
            return $this->where(['id' => $id])->first();
        }
    }

    public function get_all_items()
    {
            return $this->findAll();

    }




}