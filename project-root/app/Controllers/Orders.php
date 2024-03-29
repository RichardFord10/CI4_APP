<?php
namespace App\Controllers;
use App\Models\ItemsModel;
use App\Models\LocationsModel;

class Items extends BaseController
{
    public function index()
    {
        $model = model(ItemsModel::class);
        // print_r($items); exit();
        $data = [
            'title' => 'Orders',

        ];
        return view('templates/header', $data)
            . view('items/overview')
            . view('templates/footer');
    }

    public function view($id = null)
    {
        $model = model(OrdersModel::class);

        if (empty($data['id'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the items post you requested.');

        }

        $data['name'] = $data['items']['name'];

        return view('templates/header', $data)
            . view('orders/view')
            . view('templates/footer');
    }

    public function create()
    {
        $model = model(ItemsModel::class);
        $locations_model = model(LocationsModel::class);

        if ($this->request->getMethod() === 'post') {
            $model->save([
                'customer_name' => $this->request->getPost('name'),
                'qty'  => $this->request->getPost('qty'),
                'cost'  => $this->request->getPost('cost'),
                'price'  => $this->request->getPost('price'),
                'color'  => $this->request->getPost('color'),
                'category' => $this->request->getPost('category'),
                'brand' => $this->request->getPost('brand'),
                'images' => $this->request->getPost('image'),
                'row' => $this->request->getPost('row'),
                'shelf' => $this->request->getPost('shelf'),
                'slot' => $this->request->getPost('slot')

            ]);

            session()->setFlashData('success', 'Item Creation Success!');

            return view('templates/header', ['title' => 'Create items'])
            . view('items/overview', ['items' => $model->get_all_items(), ])
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Create items'])
            . view('items/create', ['colors' => $model->get_distinct('color'), 'category'=>$model->get_distinct('category'), 'items' => $model->get_all_items(), 'row'=>$locations_model->get_distinct('row'), 'slot'=>$locations_model->get_distinct('slot'), 'shelf'=>$locations_model->get_distinct('shelf')])
            . view('templates/footer');
    }

    public function read()
    {
    }
    public function edit()
    {
        $model = model(ItemsModel::class);
        $id = $this->request->getVar('id');
        $item = $model->get_item_by_id($id);
        $category = $model->get_distinct('category');


        if($this->request->getMethod() === 'post'){
            $model->update($id, [
                'name' => $this->request->getPost('name'),
                'qty'  => $this->request->getPost('qty'),
                'cost'  => $this->request->getPost('cost'),
                'price'  => $this->request->getPost('price'),
                'color'  => $this->request->getPost('color'),
                'category' => $this->request->getPost('category'),
                'brand' => $this->request->getPost('brand'),
                'images' => $this->request->getPost('image'),
            ]);

            session()->setFlashData('success', 'Item Edit Success!');
            return view('templates/header', ['title' => 'Overview'])
            . view('items/overview', ['items' => $model->get_all_items()])
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Edit items'])
        . view('items/edit', ['item' => $item, 'category' => $category])
        . view('templates/footer');
    }

    public function delete(){
        $model = model(ItemsModel::class);
        $id = $this->request->getVar('id');
        $model->delete(['id' => $id]);
        session()->setFlashData('success', 'Item Delete Success!');
        return view('templates/header', ['title' => 'Overview'])
        . view('items/overview', ['items' => $model->get_all_items()])
        . view('templates/footer');
    }


    public function calculate_total_items(){

        $items_model = new ItemsModel();
        $items = $items_model->get_all_items();
        $sum_data = 0;
        foreach($items as $i)
        {
            $sum_data += $i['qty'] * $i['price'];
        }

        return $sum_data;

    }

}



