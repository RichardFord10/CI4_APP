<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
    protected $table = 'items';
    protected $allowedFields = ["id","name","qty","cost","price","color","category","brand","images", "row", "shelf", "slot"];

    public function get_item_by_id($id = null)
    {
        if ($id === false) {
            $this->session->setFlashData('error', 'No item found');
        }else{
            $item = $this->where(['id' => $id])->first();
            return $item;
        }
    }

    public function get_all_items()
    {
        return $this->findAll();

    }

    public function get_distinct($column)
    {
        $db  = \Config\Database::connect();
        $query = $db->query('SELECT distinct '.$column . ' from items', false);
        return $query->getResultArray();

    }


}