<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Charts extends Controller {
       /**
     * Write code on Method
     *
     * @return response()
     */

    public function unique_colors() {
        $items_model = model(ItemsModel::class);
        $items = $items_model->get_all_items();
        $colors = array();
        foreach($items as $item){
            $color = strtolower($item['color']);
            $colors[] = $color;
        }
        $unique_colors = (array_unique($colors));
        return $unique_colors;
    }

    public function unique_items()
    {
        $items_model = model(ItemsModel::class);
        $items = $items_model->get_all_items();
        $names = array();
        foreach($items as $item){
            $name = strtolower($item['name'] ?? "");
            $names[] = $name;
        }
        $unique_items = (array_unique($names));
        return $unique_items;
    }

    public function group_items_and_sum_qtys($data) {ls
        $groups = array();
        foreach ($data as $item) {
            $key = $item['name'];
            if (!array_key_exists($key, $groups)) {
                $groups[$key] = array(
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                );
            } else {
                $groups[$key]['qty'] = $groups[$key]['qty'] + $item['qty'];
            }
        }
        return $groups;
    }
  
}
?>