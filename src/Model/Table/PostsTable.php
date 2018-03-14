<?php
// src/Model/Table/PostsTable.php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }

    //valider les données lorsque la méthode save() est appelée
    public function validationDefault(Validator $validator)
     {
          $validator 
          ->notEmpty('content') //le champ content ne doit pas etre vide
           ->requirePresence('content');
           return $validator;
}


}
?>