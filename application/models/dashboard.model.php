<?php
class Dashboard_Model extends DatabaseModel {

    public function countClients() {
        return $this->count('Client');
    }

    public function getStoredBytes() {
        $stored_bytes = $this->sum('Job', 'JobBytes');
        return  CUtils::Get_Human_Size($stored_bytes, 1);
    }
}
?>
