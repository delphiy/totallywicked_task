<?php

namespace App\controllers;

use App\models\CharacterModel;
use Core\View;

class CharacterController extends \Core\Controller
{
    private $characterModel;

    public function __construct($route_params) {
        parent::__construct($route_params);
        /** For large application, we will use DI*/
        $this->characterModel = new CharacterModel();
    }

    /**
     * If we used laravel in this task, I will used HTTP library for better api services
     */
    public function index()
    {
        $json_data = $this->characterModel->fetchCharacter($this->route_params['id']);
        if ($json_data === false) {
            echo("CharacterController is not exist");
            return;
        }
        View::renderTemplate('character.html', ["character" => json_decode($json_data)]);
    }
}