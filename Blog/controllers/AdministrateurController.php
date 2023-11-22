<?php
// AdministrateurController.php

require_once (APP_ROOT .'/config/database.php');
require (APP_ROOT .'/models/Administrateur.php');
class AdministrateurController {
    private $adminModel;
    // Constructeur
    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->adminModel = new Administrateur($db);
    }
}
?>