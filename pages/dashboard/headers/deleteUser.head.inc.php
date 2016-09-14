<?php
    $DB = DB::getInstance();
    
    if(isset($_POST['submit'])){
        $choice = $_POST['submit'];
        
        if($choice == "Yes"){
            $users = $_SESSION['users'];
            foreach($users as $user){
                $sql = "DELETE FROM `users` WHERE email='".$user."'";

                $DB->query($sql);
            }
        }
    }
    
    if(isset($_POST['users'])){
        $users = $_POST['users'];
        $_SESSION['users'] = $users;
        $delusers = "";
        
        foreach($users as $user){
            $delusers .= $user . "; ";    
        }
        
        $confirmDelete = '<form method="POST"><div class="row">
            <div class="frmLabel"><h2>{lang:deleteUser-question} '.$delusers.'</h2></div>
            <div class="frmInput"><h3>
                <input type="submit" name="submit" value="{lang:deleteUser-yes}" />
                <input type="submit" name="submit" value="{lang:deleteUser-no}" />
            </h3></div>
        </div></form>
        ';
    }
    
    
    
    
    $sql = "SELECT * FROM `users`";
    
    $DB->query($sql);
    $result = $DB->allRecords();

    $data = "";
    
    foreach($result as $user){        
        $data .= '<tr class="tableStyle">
                  <td>'.$user['firstName'].' '.$user['lastName'].'</td>
                  <td>'.$user['email'].'</td>
                  <td>'.$user['language'].'</td>
                  <td>'.$user['lastIP'].'</td>
                  <td>'.$user['lastLogin'].'</td>
                  <td>'.$user['creationDate'].'</td>
                  <td>'.$user['groupName'].'</td>
                  <td><input type="checkbox" name="users[]" value="'.$user['email'].'" /></td></tr>';
    }
?>