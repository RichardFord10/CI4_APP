<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Blog extends BaseController
{
    public function index()
    {
        $model = model(BlogModel::class);

        $data = [
            'news'  => $model->get_blog(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
            . view('blog/overview')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(BlogModel::class);

        $data['body'] = $model->get_blog($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
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

            return view('blog/success');
        }

        return view('templates/header', ['title' => 'Create a news item'])
            . view('blog/create')
            . view('templates/footer');
    }
}