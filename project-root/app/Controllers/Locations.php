<?php 

namespace App\Controllers;
use App\Models\LocationsModel;

class Locations extends BaseController
{
    public function index()
    {
        $model = model(LocationsModel::class);
        // print_r($items); exit();
        $data = [
            'title' => 'Locations',
            'locations'  => $model->get_all_locations()
        ];

        return view('templates/header', $data)
            . view('locations/overview')
            . view('templates/footer');
    }


}









?>