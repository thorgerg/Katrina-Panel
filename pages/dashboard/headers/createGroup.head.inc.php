<?php

    $DB = DB::getInstance();
 
    if(isset($_POST['btnSubmit'])){
        $groupName = $_POST['groupName'];
        $modules = $_POST['modules'];
        $categories = $_POST['categories'];
        $validated = true;
        
        $sql = "SELECT * FROM `groups` WHERE name='".$groupName."'";
        $DB->query($sql);

        if($DB->rowCount() >= 1){
            $validated = false;
            $error .= "{lang:createGroup-groupNameExists}\n";
        }
        
        if($validated){
            // Insert the new group name into the database
            $sql = "INSERT INTO `groups` (name) VALUES('$groupName');";
            $DB->query($sql);
            
            if($categories != ""){
                foreach($categories as $category){
                    $sql = "SELECT * FROM `modules` WHERE category='".$category."'";
                    $DB->query($sql);
                    $result = $DB->allRecords();
                    
                    foreach($result as $module){
                        $module = $module['name'];
                        
                        $sql = "INSERT INTO `groupPermissions` (groupName, categoryName, moduleName) VALUES('$groupName', '$category', '$module');";

                        $DB->query($sql);
                    }
                }
            }else{
                foreach ($modules as $module) {               
                    if($categories == ""){
                        $sql = "SELECT * FROM `modules` WHERE name='".$module."';";
                        $DB->query($sql);
                        $result = $DB->singleRecord();
                        $category = $result['category'];
                    }
                    
                    $sql = "INSERT INTO `groupPermissions` (groupName, categoryName, moduleName) VALUES('$groupName', '$category', '$module');";

                    $DB->query($sql);
                }
            }
            
            
            
            $msg = "<div class='success'>{lang:createGroup-success}</div>";
            
        }else{
            $error = "<div class='error'>".$error."</div>";
        }
    }
        
    $sql = "SELECT * from `modules` ORDER BY category DESC";
    $DB->query($sql);
    $records = $DB->allRecords();

    $chkBoxes = "";
    $curCategory = "";
    $count = 0;
    $i = 1;
    
    foreach($records as $row){
        if($curCategory != $row['category']){
            // Create new category index
            if($count == 0){
                $count++;
            }else{
                $chkBoxes .= '</ul>';
            }
            $i = 1;
            $curCategory = $row['category'];
            $chkBoxes .= '<div class="row"><input type="checkbox" id="category" name="categories[]" value="'.$row['category'].'" /> '.$row['category'].'</div><ul>';
        }
        
        
        $chkBoxes .= '<li>';
        $chkBoxes .= '<div class="row"><input type="checkbox" id="'.$curCategory.'-'.$i.'" name="modules[]" value="'.$row['name'].'" /> '.$row['prettyName'].' </div>';
        $chkBoxes .= '</li>';
        $i++;
    }
?>