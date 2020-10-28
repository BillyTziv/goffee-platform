<div id="logo_bar_outter">
  <div id="logo_bar_inner">
    <div id="menuLogoBox">
      <!-- <img src="../images/logo.png" height="35px" />  -->
      <img src="../images/logo_w.png" width="150px" />
    </div>
    <div id="menuLoginBox">
      <table cellspacing=0 cellpadding=0>
        <tr>
          <td>
             <strong><?php $loginName=real_name(); echo $loginName; ?> </strong>
          </td>
          <td>
            <form method="POST" action="logout.php">
              <button type="submit" name="logout_button" id="logo_bar_logout_button"><i class="fa fa-sign-out"></i>
                Αποσύνδεση
              </button>
            </form>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>