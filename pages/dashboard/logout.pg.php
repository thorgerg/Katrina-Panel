<?php
    $Auth = Auth::getInstance();
    
    $Auth->deAuth();
    //unset($_COOKIE['authenticated']);
        setcookie("authenticated", "", time()-3600, "/Katrina-Panel/");

    header('Location:/Katrina-Panel/');
?>


<h1>{lang:logout-title}</h1>

<div class="line">
</div>

 <div class="row">
      <div class="frmLabel"><h2>{lang:logout-description}</h2></div>
      <div class="frmInput"><h2><a href="/Katrina-Panel/">{lang:logout-manual}</a></h2></div>
</div>
