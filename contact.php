<form action="mail.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td><p>First Name: </p></td>
				<td><p>Last Name: </td>
				<td><p>Email Address: </td>
			</tr>
			<tr>
				<td><input type="text" name="fname" placeholder="Johnny"></td>
				<td><input type="text" name="lname" placeholder="Appleseed"></td>
				<td><input type="text" name="email" placeholder="johnny@email.com"></td>			
			</tr>
			<tr>
				<td><p>Message: </p></td>
			</tr>
		</tbody>
	</table>
	<textarea name="message" cols="80" rows="5" placeholder="Mark, Let me tell you about my filthy roof! I need help!"></textarea>

	<input type="submit" value="Send!" class="send-button">

</form>