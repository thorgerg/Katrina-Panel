
{mod:sidebarLeft}

{mod:sidebarRight}

<div class="content">
<h3>{lang:deleteGroup-title}</h3>

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
                <td>{lang:deleteGroup-name}</td>
                <td>{lang:deleteGroup-permissions}</td>
                <td>{lang:deleteGroup-users}</td>
                <td>{lang:deleteGroup-action}</td>
            </tr>
        </thead> 
        <?php
            echo $data;
        ?>
</table>

    <div class="row">
        <div class="frmLabel"><h2>{lang:deleteGroup-deleteAction}</h2></div>
        <div class="frmInput"><h3><input type="submit" value="{lang:deleteGroup-deleteGroup}" /></h3></div>
    </div>

</form>

</div>