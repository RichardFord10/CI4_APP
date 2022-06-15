<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Blog extends BaseController
{
    public function index()
    {
        $model = model(BlogModel::class);
        $blog = $model->get_all_blogs();
        $data = [
            'title' => 'Blog Posts',
        ];

        return view('templates/header', $data)
            . view('blog/overview')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(BlogModel::class);

        $data['body'] = $model->get_blog($slug);

        if (empty($data['title'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the blog post you requested.');

        }

        $data['title'] = $data['blog']['title'];

        return view('templates/header', $data)
            . view('blog/view')
            . view('templates/footer');
    }

    public function create()
    {
        $model = model(BlogModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required',
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
                'body'  => $this->request->getPost('body'),
            ]);

            session()->setFlashData('success', 'Blog Creation Successful');

            return view('templates/header', ['title' => 'Create Blog'])
            . view('blog/create')
            . view('templates/footer');
        }

        return view('templates/header', ['title' => 'Create Blog'])
            . view('blog/create')
            . view('templates/footer');
    }
}