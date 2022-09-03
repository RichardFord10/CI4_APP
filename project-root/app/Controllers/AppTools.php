<?php

namespace App\Controllers;

use App\Models\ItemsModel;
use App\Models\LocationsModel;
use CodeIgniter\Controller;
use Exception;
use stdClass;

class AppTools extends Controller
{
    //FUNCTIONS TO GENERATE RANDOM DATA FOR DASHBOARD
    public function make_locations($num)
    {
        $model = new LocationsModel();

        if($num)
        {
            for($x = 0; $x <= $num; $x++)
            {
                try
                {

                    $row = chr(rand(65,90));
                    $shelf = rand (1, 25);
                    $slot = rand (1, 5);
                    
                    $model->set_new_location($row, $shelf, $slot);
                    $is_sucess = true;
                }catch (Exception $e){
                    echo("ERROR: ".$e);
                }finally{
                    if($is_sucess == true)
                    {
                        echo("Location created: $row, $shelf, $slot\n");

                    }else{
                        echo('Error, see logs');
                    }
                }                      
            }
        }else{
            echo('Please enter an integer');
        }
    }
    
    public function assign_random_location_to_items()
    {
        $db = db_connect();
        $items_model = new ItemsModel;
        $locations_model = new LocationsModel();
        $item = new stdClass();
        $items_array = $items_model->get_all_items();
        $locations_array = $locations_model->get_all_locations();

        foreach($items_array as $i)
        {

            $db->query('update items set "row" = (select row from locations order by random() limit 1), shelf = (select shelf from locations order by random() limit 1), slot = (select slot from locations order by random() limit 1) where id ='.$i['id']);
            echo('location set for item with id='.$i['id'].' success!');
            echo("\n");

        }
        
    }

    public function add_random_items_to_items_table($num)
    {
        $db = db_connect();
        $items_model = new ItemsModel;
        $locations_model = new LocationsModel();
        $item = new stdClass();
        $items_array = $items_model->get_all_items();
        $locations_array = $locations_model->get_all_locations();

        if($num < 300)
        {

            for($x = 0; $x <= $num; $x++)
            {
                try
                {
                    $name = $db->query("select name from items order by random() limit 1")->getRow();
                    $qty =  rand (1, 100);
                    $cost = rand(1, 100);
                    $price = ($cost * 0.6) + $cost;
                    $color = $db->query("select color from items order by random() limit 1")->getRow();
                    $category = $db->query("select category from items order by random() limit 1")->getRow();
                    $brand = $db->query("select brand from items order by random() limit 1")->getRow();
                    $images = "NULL";
                    $height = $db->query("select height from items order by random() limit 1")->getRow();
                    $width = $db->query("select width from items order by random() limit 1")->getRow();
                    $depth = $db->query("select depth from items order by random() limit 1")->getRow();
                    $row = $db->query("select row from locations order by random() limit 1")->getRow();
                    $shelf = $db->query("select shelf from locations order by random() limit 1")->getRow();
                    $slot = $db->query("select slot from locations order by random() limit 1")->getRow();

                    $name = $name->name;
                    $color = $color->color;
                    $category = $category->category;
                    $brand = $brand->brand;
                    $height = $height->height;
                    $width = $width->width;
                    $depth = $depth->depth;
                    $row = $row->row;
                    $shelf = $shelf->shelf;
                    $slot = $slot->slot;

                    $values_string = "'$name','$qty','$cost','$price','$color','$category','$brand','$images','$height','$width','$depth','$row','$shelf','$slot'";
                    

                    $db->query('INSERT INTO items
                    ("name", "qty", "cost", "price", "color", "category", "brand", "images", "height", "width", "depth", "row", "shelf", "slot") VALUES ('.$values_string.')');
                    echo("Random Item insertion Success! Item: $name,$qty,$cost,$price,$color,$category,$brand,$images,$height,$width,$depth,$row,$shelf,$slot\n");
                    
                }catch(Exception $e){
                    echo($e);
                }finally{
                        
                }
                
            }
        }

        
    }

    public function seed_db()
    {
        
        $this->add_random_items_to_items_table(100);
        $this->assign_random_location_to_items();
    }

}