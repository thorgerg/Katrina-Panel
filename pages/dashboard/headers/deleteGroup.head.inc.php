<?php
    $DB = DB::getInstance();
    
    if(isset($_POST['submit'])){
        $choice = $_POST['submit'];
        
        if($choice == "Yes"){
            $groups = $_SESSION['groups'];
            foreach($groups as $group){
                $sql = "DELETE FROM `groups` WHERE name='".$group."'";

                $DB->query($sql);
            }
        }
    }
    
    if(isset($_POST['groups'])){
        $groups = $_POST['groups'];
        $_SESSION['groups'] = $groups;
        $delGroups = "";
        
        foreach($groups as $group){
            $delGroups .= $group . "; ";    
        }
        
        $confirmDelete = '<form method="POST"><div class="row">
            <div class="frmLabel"><h2>{lang:deleteGroup-question} '.$delGroups.'</h2></div>
            <div class="frmInput"><h3>
                <input type="submit" name="submit" value="{lang:deleteGroup-yes}" />
                <input type="submit" name="submit" value="{lang:deleteGroup-no}" />
            </h3></div>
        </div></form>
        ';
    }
    
    
    
    
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
                  <td>'.$users.'</td>
                  <td><input type="checkbox" name="groups[]" value="'.$groups['name'].'" /></td></tr>';
    }
?>