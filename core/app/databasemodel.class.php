<?php

class DatabaseModel extends Model
{
   protected $dbadapter;

   public function __construct()
   {
     $this->dbadapter = new DatabaseAdapter();
   }

   // ==================================================================================
   // Function:         count()
   // Parameters:       $tablename
   //                           $filter (optional)
   // Return:           return row count for one table
   // ==================================================================================

   protected function count($tablename, $filter = null)
   {
        $fields         = array( 'COUNT(*) as row_count' );

        // Prepare and execute query
        $statment       = CDBQuery::get_Select( array( 'table' => $tablename, 'fields' => $fields, $filter) );
        $result         = CDBUtils::runQuery($statment, $this->db_link);

        $result         = $result->fetch();

        return $result['row_count'];
   }
}
