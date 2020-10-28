<div id="topQuickMenu">
	<div style="height: 45px; width:1000px; margin-left: auto; margin-right: auto;">
		<div id="menuLogoBox">
			<img src="../images/logo.png" height="35px" />			
		</div>
		<div id="menuLoginBox">
			<table>
				<tr>
					<td>
						<a href="logout.php">
							<img src="../images/logout.png" width="32px"  value="logout"/>
						</a>
					</td>
					<td>
						<a href="">
							<?php $loginName=real_name(); echo $loginName[0]['realName']; ?>
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>