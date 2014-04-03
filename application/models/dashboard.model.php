<?php
class Dashboard_Model extends DatabaseModel {

    public function countClients() {
        return $this->count('Client');
    }
}
?>
