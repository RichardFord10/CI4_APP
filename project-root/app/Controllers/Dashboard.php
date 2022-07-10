<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ItemsModel;
  
class Dashboard extends Controller
{
    public function index()
    {
        $items_model = new ItemsModel();
        $items = $items_model->get_all_items();
        
        $data = [
            'title' => 'Dashboard',
            'items' => $items, 
            'items_json' => \json_encode($items)
        ];

        return view('templates/header', $data)
        .view('pages/dashboard')
        .view('templates/footer');
    }
}