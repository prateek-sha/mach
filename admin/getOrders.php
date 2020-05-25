<?php 
date_default_timezone_set("Asia/Kolkata");
include ('configure_order.php');
include ('configure_manu.php');
include('../admin/configure_findmanu.php');
$kraya_findmanu = new Findmanu();
$kraya_oder = new Order();

if(!empty($_GET['q']))
{
    
    $id = $_GET['q'];
    $row = $kraya_oder->getData();
    if ($row==false) {
        $count=0;
        echo "No Order Found";
    }
    else
    {
        $count = count($row);
    }

	if ($count > 0) 
	{
        for($i = 0 ; $i < $count ;$i++)
        { 
            if ( $id > $kraya_findmanu->checkdate($row[$i]['addeddate'] ,date("Y-m-d H:i:s") ))  
            {
        ?>
           
						<?php						
                        $krya_manu = new Manufacture();
						?>
							<tr>
								<td><?php echo $row[$i]['id']; ?></td>
								<td><?php echo $row[$i]['productname']; ?></td>
								<td><?php echo $row[$i]['productprice']; ?></td>
								<td><?php echo $row[$i]['productquantity']; ?></td>
								<td><?php echo $krya_manu->getRecordById1($row[$i]['manu_id'])[0]['firstname']; ?> </td>
                                <td><?php echo $krya_manu->getRecordById1($row[$i]['manu_id'])[0]['email']; ?> </td>
								<td><?php echo $row[$i]['firstname']; ?></td>
								<td><?php echo $row[$i]['lastname']; ?></td>
								<td><?php echo $row[$i]['street']; ?></td>
								<td><?php echo $row[$i]['street1']; ?></td>
								<td><?php echo $row[$i]['phonenumber']; ?></td>
								<td><?php echo $row[$i]['addeddate']; ?></td>
								<td>
								<?php 
								if($row[$i]['dispacted']==1)
								{
									echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=0' >ON</a>";
								}
								else
								{
									echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=1' >OFF</a>";
								}
								?>
								</td>
								<td>
                                <?php 
								if($row[$i]['pdf'] == "hello")
								{
                                   echo " <a type='button' disabled class='btn btn-success' href=''>Download</a> ";

									//echo "<a href='category_dispacted_status_change.php?id=".$row[$i]['id']."&status=0' >ON</a>";
								}
								else
								{
									$cad =  "../admin/uploadpdf/".$row[$i]['pdf'];

                                    echo " <a class='btn btn-success' href='".$cad."'>Download</a> ";
								}
								?>
								</td>
							</tr>                              
				   </tbody>
				</table>
			  </section>
		  </div>


        <?php
            } 
        }
    }
}
else{
    echo "Select Correct Date";
}
?>