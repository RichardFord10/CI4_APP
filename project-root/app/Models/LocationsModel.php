<?php

namespace App\Models;

use App\Controllers\Items;
use CodeIgniter\Model;

class LocationsModel extends Model
{
    
    protected $table = 'locations';
    protected $allowedFields = ["row","shelf","slot"];

    public function get_location($item_id = null, $row = null, $shelf = null, $slot = null)
    {
        $item =  new Items();

    }

    public function get_all_locations()
    {
        return $this->findAll();
    }

    public function get_all_items()
    {
         return $this->findAll();
    }

    public function get_distinct($column)
    {
        $db  = \Config\Database::connect();
        $query = $db->query('SELECT distinct '.$column . ' from locations', false);
        return $query->getResultArray();
    }

    public function set_new_location($row, $shelf, $slot)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('locations');
        $data = [
            'row' => $row,
            'shelf' => $shelf,
            'slot'  => $slot,
        ];

        $builder->insert($data);
    }

    


}