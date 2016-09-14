<h1>{lang:profile-title}</h1>

<div class="line">
</div>

<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-firstName}</h2></div>
    <div class="frmInput"> <?php echo $fname ?></div>
</div>

<div class="row">
    <div class="frmLabel" align="left" ><h2>{lang:profile-lastName}</h2></div>
    <div class="frmInput"><?php echo $lname ?></div>
</div>


<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-email}</h2></div>
    <div class="frmInput"><?php echo $email ?></div>
</div>


<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-creationDate}</h2></div>
    <div class="frmInput"><?php echo $creationDate ?></div>
</div>

<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-lastIP}</h2></div>
    <div class="frmInput"><?php echo $lastIP ?></div>
</div>

<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-lastLogin}</h2></div>
    <div class="frmInput"><?php echo $lastLogin ?></div>
</div>

<div class="row">
    <div class="frmLabel" align="left"><h2>{lang:profile-language}</h2></div>
    <div class="frmInput"><?php echo $language ?></div>
</div>

<div align="center"><a href="index.php?p=changePassword"> {lang:profile-change}</a></div>

<div align="center"><a  href="index.php?p=deleteAccount">{lang:profile-delete}</a></div>
