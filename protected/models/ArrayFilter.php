<?php

/**
     * Multi-demensional array filtering class
     * @var array 
     * @param array $array input array for filtering
     * @param string $index key(field) for filtering
     * @param $value value for filtering
     * @return filtered array
     * This filter will return only those items that match the $value given
     */


class ArrayFilter {
  
  public function filter_by_value ($array, $index, $value){ 
        if(is_array($array) && count($array)>0)  
        { 
            foreach(array_keys($array) as $key){ 
                $temp[$key] = $array[$key][$index]; 
                 
                if ($temp[$key] == $value){ 
                    $newarray[] = $array[$key]; 
                } 
            } 
          } 
      return $newarray; 
    } 
}
?>  