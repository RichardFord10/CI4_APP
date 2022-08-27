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

    public function create()
    {
        $model = model(LocationsModel::class);

        if ($this->request->getMethod() === 'post') {
            $model->set_new_location(
                $this->request->getPost('row'),
                $this->request->getPost('shelf'),
                $this->request->getPost('slot'),

            );

            session()->setFlashData('success', 'Location Creation Success!');

            return view('templates/header', ['title' => 'Create items'])
            . view('locations/overview', ['locations' => $model->get_all_locations()])
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Create items'])
            . view('locations/create', ['row'=>$model->get_distinct('row'), 'slot'=>$model->get_distinct('slot'), 'shelf'=>$model->get_distinct('shelf')])
            . view('templates/footer');
    }

}









?>