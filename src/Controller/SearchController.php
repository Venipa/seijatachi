<?php
namespace App\Controller;

use Cake\Core\Configure;

class SearchController extends AppController {

    function index() {
        if(isset($this->request->data['anime']) && !empty($this->request->data['anime'])) {
            $title = str_replace(' ', '+', $this->request->data['anime']);
            $animes = $this->Mal->search($title);
            $this->set('animes', $animes);
        }
    }
}