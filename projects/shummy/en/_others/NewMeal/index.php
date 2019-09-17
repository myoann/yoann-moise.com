<form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
<table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="2">
		<div align="center">
		  <?php 
		$remarks=$_GET['remarks'];
		if ($remarks==null and $remarks=="")
		{
		echo 'Register Here';
		}
		if ($remarks=='success')
		{
		echo 'Registration Success';
		}
		?>	
	    </div></td>
  </tr>
  <tr>
    <td><div align="right">Title:</div></td>
    <td><input type="text" name="Title" /></td>
  </tr>
 <tr>
    <td><div align="right">Description:</div></td>
    <td><input type="text" name="Description" /></td>
  </tr>
 <tr>
    <td><div align="right">Price:</div></td>
    <td><input type="text" name="Price" /></td>
  </tr>
  <tr>
    <td><div align="right">Image : </div></td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
        <input type="file" name="img" id="img" /></p></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="submit" type="submit" value="Submit" /></td>
  </tr>
</table>
</form>