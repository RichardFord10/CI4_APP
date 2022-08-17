<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ItemsModel;
  
class Dashboard extends Controller
{
    public function index()
    {
        $items_model = new ItemsModel();
        $i = new Items;
        $items = $items_model->get_all_items();
        $chart = new Charts();
        $unique_colors = $chart->unique_colors();
        $unique_items = $chart->unique_items();
        $grouped_items = $chart->group_items_and_sum_qtys($items);
        $sum_items = $i->calculate_total_items();

        $data = [
            'title' => 'Dashboard',
            'items' => $items, 
            'items_json' => $items,
            'unique_colors' => $unique_colors,
            'unique_items' => $unique_items,
            'grouped_items' => $grouped_items,
            'sum_items' => $sum_items
        ];

        return view('templates/header', $data)
        .view('pages/dashboard')
        .view('templates/footer');
    }


   
}