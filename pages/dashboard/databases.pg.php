
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:database-title}</h3>

<div class="line">
</div>

<a href="?p=createDatabase">{lang:database-createDatabase}</a>

<br />
<br />

<form method="POST">
    <table width="100%" cellspacing="0" cellpading="0" id="fileTable">
        <thead>
            <tr>
                <td>Database</td>
                <td>Backup</td>
                <td>Size</td>
                <td>Delete</td>
            </tr>
        </thead> 
        <?php
            echo $data;
        ?>
</table>

    <div class="row">
        <div class="frmLabel"><h2>{lang:database-uploadFile}</h2></div>
        <div class="frmInput"><h3><input type="file" name="databaseFile" class="txtField" /></h3></div>
    </div>

</form>

</div>