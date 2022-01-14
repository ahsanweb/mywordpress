<?php require_once('dbconnection.php'); 

	@$s 		= $_POST['val'];
	$agentid 	= $_SESSION['id']; 
	$ret		= mysqli_query($con,"select * from users where agent_id = '$agentid' and email LIKE '%$s%' or fname LIKE '%$s%' or lname LIKE '%$s%' ");
	$cnt=1;
	if(mysqli_num_rows($ret) > 0){
		$data = '<table class="table table-striped table-advance table-hover">
				  <thead>
				  <tr>
					  <th>Sno.</th>
					  <th class="hidden-phone">Username</th>
					  <th>Online</th>
					  <th>Time</th>
				  </tr>
				  </thead>
				  <tbody>';
		while($row = mysqli_fetch_array($ret)){
			$data .= '<tr>
						  <td>'.$cnt.'</td>
							  <td>'.$row['email'].'</td>
							  <td><span class="badge red">offline</span></td>
							  <td>'.$row['posting_date'].'</td>
							  <td>
								 <a href="update_steamer.php?uid='.$row['id'].'"> 
								 <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
								 <a href="agents.php?id='.$row['id'].'"> 
								 <button class="btn btn-danger btn-xs" onClick="return confirm("Do you really want to delete");"><i class="fa fa-trash-o "></i></button></a>
							  </td>
						  </tr>'; 
		 $cnt++;
		}
		$data .= '</tbody>
  				</table>';
	}else{
		$data = 'Nothing Found.';	
	}
	
	echo $data;
