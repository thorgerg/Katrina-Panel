<?php
    $DB = DB::getInstance();
    
    $sql = "SELECT * FROM `groups`";
    
    $DB->query($sql);
    $result = $DB->allRecords();

    $data = "";
    
    foreach($result as $groups){        
        $sql = "SELECT * FROM `groupPermissions` WHERE groupName='".$groups['name']."'";
        $DB->query($sql);
        
        $result2 = $DB->allRecords();
        
        $permissions = "";
        $users = "";
        
        foreach($result2 as $groupPermission){
            $permissions .= $groupPermission['moduleName'] . "; ";
        }
        
        $sql = "SELECT * FROM `users` WHERE groupName='".$groups['name']."'";
        $DB->query($sql);
        $result2 = $DB->allRecords();
        
        foreach($result2 as $user){
            $users .= $user['email'] . "; ";
        }
              
        $data .= '<tr class="tableStyle">
                  <td>'.$groups['name'].'</td>
                  <td>'.$permissions.'</td>
                  <td>'.$users.'</td></tr>';
    }
?>