<?php


namespace App\models;


use App\Config;

class CharacterModel extends \Core\Model
{
    function fetchAllCharacters($api_url) {
        return json_decode(file_get_contents( $api_url));
    }

    function fetchCharacter($id) {
       return @file_get_contents( Config::API_URL. "/" . $id);
    }

}