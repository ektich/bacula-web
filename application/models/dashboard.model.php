<?php
class Dashboard_Model extends DatabaseModel {

    public function countClients() {
        return $this->count('Client');
    }

    public function getStoredBytes() {
        $stored_bytes = $this->sum('Job', 'JobBytes');
        return  CUtils::Get_Human_Size($stored_bytes, 1);
    }

    public function getStoredFiles() {
        $stored_files = $this->sum('Job', 'JobFiles');
        return  CUtils::format_Number($stored_files, 0);
    }

    public function countPools() {
        return $this->count('Pool');
    }

    public function countVolumes() {
         return $this->count('Media');
    }
}
?>
