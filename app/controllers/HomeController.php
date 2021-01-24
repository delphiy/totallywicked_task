<?php
namespace App\Controllers;


use App\models\CharacterModel;
use \Core\View;
use App\Config;

class HomeController extends \Core\Controller
{
    private $characterModel;

    public function __construct()
    {
        /** In large application, we will use DI */
        $this->characterModel = new CharacterModel();
    }

    public function index()
    {
        $api_url = Config::API_URL;
        $searchTerm = $_GET['searchTerm'] ?? "";
        $page = $_GET['page'] ?? "";

        if($searchTerm)
            $api_url = Config::API_URL."/?name=". urlencode($searchTerm);
        else if($page)
            $api_url = Config::API_URL."?page=".$page;
        else
            $page = 1;

        /**
         * If we used laravel in this task, I will used HTTP library for better api services
         */
        $response_data = $this->characterModel->fetchAllCharacters($api_url);
        $data = ["characters" => $response_data->results, "info" => $response_data->info, "current_page" => $page, "searchTerm" => $searchTerm];

        View::renderTemplate('index.html', $data);
    }

    //We can use separate method for search and page nation as well but I put them all in index as all serve same purpose
//    public function search()
//    {
//        echo $_GET['searchTerm'];
//    }

}