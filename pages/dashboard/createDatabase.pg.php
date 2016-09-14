
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:createDatabase-title}</h3>

<div class="line">
</div>

<?php
    echo $error;
    echo $msg;
?>

<br />
<br />

<form method="POST" action="?p=createDatabase">
    <div class="row">
        <div class="frmLabel"><h2>{lang:createDatabase-databaseName}</h2></div>
        <div class="frmInput"><h3><input type="text" name="databaseName" class="txtField" placeholder="{lang:createDatabase-databaseNamePlaceholder}" /></h3></div>       
    </div>

    <div class="row">
        <div class="frmLabel"><h2>{lang:createDatabase-databaseUserName}</h2></div>
        <div class="frmInput"><h3><input type="text" name="databaseUserName" class="txtField" placeholder="{lang:createDatabase-databaseUsernamePlaceholder}" /></h3></div>       
    </div>

    <div class="row">
        <div class="frmLabel"><h2>{lang:createDatabase-userPassword}</h2></div>
        <div class="frmInput"><h3><input type="pass" name="userPassword" class="txtField" placeholder="{lang:createDatabase-userPasswordPlaceholder}" /></h3></div>       
    </div>

    <div class="row">
        <div class="frmLabel"><h2>{lang:createDatabase-retypeUserPassword}</h2></div>
        <div class="frmInput"><h3><input type="pass" name="userPassword2" class="txtField" placeholder="{lang:createDatabase-retypeUserPasswordPlaceholder}" /></h3></div>       
    </div>

    <div id="line">
    </div>

    <br />

    <div align="center">
      <input id="btn" type="submit" name="btnSubmit" value="Submit" />
    </div>

</form>

</div>