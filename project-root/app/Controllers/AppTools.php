<?php

namespace App\Controllers;

use App\Models\LocationsModel;
use CodeIgniter\Controller;
use Exception;

class AppTools extends Controller
{

    //enter an integer to create randomized locations where row = A-Z, shelf = 1-25, and slot = 1-5
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




}