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
   //                   $filter (optional)
   // Return:           return row count for one table
   // ==================================================================================

   public function count($tablename, $filter = null)
   {
        $fields         = array( 'COUNT(*) as row_count' );

        // Prepare and execute query
        $statment       = CDBQuery::get_Select( array( 'table' => $tablename, 'fields' => $fields, $filter) );
        $result         = CDBUtils::runQuery($statment, $this->dbadapter->db_link);
   
        $result         = $result->fetch();
        return $result['row_count'];
   }

   // ==================================================================================
   // Function:         sum()
   // Parameters:       $tablename
   //			$field
   //                   $filter (optional)
   // Return:           return sum of one field of a table
   // ==================================================================================

   public function sum($tablename, $field, $filter = null)
   {
        $fields         = array( "SUM($field) as row_sum" );

        // Prepare and execute query
        $statment       = CDBQuery::get_Select( array( 'table' => $tablename, 'fields' => $fields, $filter) );
        $result         = CDBUtils::runQuery($statment, $this->dbadapter->db_link);

        $result         = $result->fetch();
        return $result['row_sum'];
   }

}
