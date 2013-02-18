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
                
                 // deleting WWW from Url and adding slashes in the beggining and in the end of Url
                    $temp[$key] = preg_replace('/www./', '', $temp[$key]);

                // adding slash in the end of Url if not exist
                    if (substr($temp[$key], -1) != '/') {
                      $temp[$key] = $temp[$key] . '/';
                    }
                    
                // adding slash in the beggining of Url if not exist
                    if (substr($temp[$key], 0, 1) != '/') {
                      $temp[$key] = '/' . $temp[$key];
                    }
                    
                if ($temp[$key] == $value){ 
                    $newarray[] = $array[$key]; 
                } 
            } 
          } 
      return $newarray; 
    } 
}
?>  