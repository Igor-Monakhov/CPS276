<?php
  
Class Helper {
    
    public function reverseName($name) {
        
        $firstNameLastName = explode(" ", $name);
        $firstName = $firstNameLastName[0];
        $lastName = $firstNameLastName[1];
        $lastNameFirstName = ($lastName . ", " . $firstName);
        return $lastNameFirstName;
        
    }
        
    public function addName($lastNameFirstName, $existingNames){
       $names = explode("\n", $existingNames);
       array_push($names, $lastNameFirstName); 
       asort($names);
       return implode("\n", $names);
    
    }

}

?>
