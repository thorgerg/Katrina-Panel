
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:deleteUser-title}</h3>

<div class="line">
</div>

<br />

<?php
    echo $confirmDelete;
?>

<form method="POST">
    <table width="100%" cellspacing="0" cellpading="0" id="fileTable">
        <thead>
            <tr>
                <td>{lang:deleteUser-name}</td>
                <td>{lang:deleteUser-email}</td>
                <td>{lang:deleteUser-language}</td>
                <td>{lang:deleteUser-lastIP}</td>
                <td>{lang:deleteUser-lastLogin}</td>
                <td>{lang:deleteUser-creationDate}</td>
                <td>{lang:deleteUser-groupName}</td>
                <td>{lang:deleteUser-action}</td>
            </tr>
        </thead> 
        <?php
            echo $data;
        ?>
</table>

    <div class="row">
        <div class="frmLabel"><h2>{lang:deleteUser-deleteAction}</h2></div>
        <div class="frmInput"><h3><input type="submit" value="{lang:deleteUser-deleteUser}" /></h3></div>
    </div>

</form>

</div>