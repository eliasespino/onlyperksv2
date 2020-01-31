<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class CarpoolingModel extends CI_Model{
 
  function getTripsCards($offset)
  {
  	$sql="SELECT
 `trip`.`id`,
 `trip`.`origin_city`,
  `trip`.`destination_city`,
  `trip`.`origin_timestamp`, 
   `trip`.`trip_frequency`,
   concat(CUser.first_name,\" \",CUser.last_name) as driver_name,
   `trip`.`weekdays`,
     `trip`.`price_per_person`,
     `trip`.`available_seats`,
     `trip`.`total_seats`,
     `trip`.`is_delete`
      FROM `HFSOnlyperks`.`trip` as trip, HFSOnlyperks.core_user as CUser where CUser.id=trip.driver_id limit 10   OFFSET ".$offset."";
  	$query = $this->db->query($sql);
  	$response = $query->result_array();
    return $response;
  }

 
}