<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ItemsModel;
  
class Warehouse extends Controller
{
    public function index()
    {
        $items_model = new ItemsModel();
        $items = $items_model->get_all_items();
    


        $data = [
            'title' => 'Dashboard',
            'items' => $items
        ];



        return view('templates/header', $data)
        .view('pages/warehouse')
        .view('templates/footer');
    }

    
   
}