<?php
namespace App\Controllers;
use App\Models\ItemsModel;

class Items extends BaseController
{
    public function index()
    {
        $model = model(ItemsModel::class);
        // print_r($items); exit();
        $data = [
            'title' => 'Items',
            'items'  => $model->get_all_items()

        ];

        return view('templates/header', $data)
            . view('items/overview')
            . view('templates/footer');
    }

    // public function view($slug = null)
    // {
    //     $model = model(itemsModel::class);

    //     if (empty($data['title'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the items post you requested.');

    //     }

    //     $data['name'] = $data['items']['name'];

    //     return view('templates/header', $data)
    //         . view('items/view')
    //         . view('templates/footer');
    // }

    public function create()
    {
        $model = model(ItemsModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'qty' => 'required|integer',"price","color","category","brand",
            'cost' => 'required|integer',
            "price" => 'required|integer',
            "color" => 'required|integer',
            "category" => 'required',
        ])) {
            $model->save([
                'name' => $this->request->getPost('name'),
                'qty'  => $this->request->getPost('qty'),
                'cost'  => $this->request->getPost('cost'),
                'price'  => $this->request->getPost('price'),
                'color'  => $this->request->getPost('color'),
                'category' => $this->request->getPost('category'),
                'brand' => $this->request->getPost('brand'),
                'images' => $this->request->getPost('image'),

                
            ]);

            session()->setFlashData('success', 'items Creation Successful');

            return view('templates/header', ['title' => 'Create items'])
            . view('items/overview', ['items' => $model->get_all_items()])
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Create items'])
            . view('items/create', ['colors' => $model->get_distinct('color')])
            . view('templates/footer');
    }

    public function edit()
    {
        $model = model(itemsModel::class);
        $id = $this->request->getVar('id');
        $items = $model->get_items_by_id($id);

            
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

                session()->setFlashData('success', 'items Update Successful');
                return view('templates/header', ['title' => 'Overview'])
                . view('items/overview', $model->get_all_items())
                . view('templates/footer');
            }
            

            return view('templates/header', ['title' => 'Edit items'])
            . view('items/edit', ['items' => $items])
            . view('templates/footer');
    
    }

    public function delete(){
        $model = model(ItemsModel::class);
        $id = $this->request->getVar('id');
        $model->delete(['id' => $id]);
        session()->setFlashData('success', 'items Deletion Successful');
        return view('templates/header', ['title' => 'Overview'])
        . view('items/overview', ['items' => $model->get_all_items()])
        . view('templates/footer');
        }
}

