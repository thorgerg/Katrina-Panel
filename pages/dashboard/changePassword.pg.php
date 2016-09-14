<h1>{lang:changePassword-title}</h1>

<div class="line">
</div>



<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
    <div class="row">
      <div class="frmLabel"><h2>Current Password</h2></div>
      <div class="frmInput"><h2><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></h2></div>
    </div>

    <div class="row">
      <div class="frmLabel"><h2>New Password</h2></div>
      <div class="frmInput"><h2><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></h2></div>
    </div>

    <div class="row">
      <div class="frmLabel"><h2>Confirm Password</h2></div>
      <div class="frmInput"><h2><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></h2></div>
    </div>


    <div id="line">
    </div>

    <br />

    <div align="center">
      <input id="btn" type="submit" name="btnSubmit" value="Submit" />
    </div>
</form>