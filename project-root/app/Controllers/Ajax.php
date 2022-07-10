<?php 
namespace App\Controllers;



 class Ajax extends BaseController{


    public function __construct()
	{
		helper(['url']);
	}

    public function bar_chart_data(){
        $model = $this->load->model("ItemsModel");
        $items = $model->get_all_items();


    }
}