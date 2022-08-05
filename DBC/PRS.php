<?php
  include "core/connect.ini";
  include "query/admin.qry";
  include "query/PRS.qry";
  include "components/header.inc";

  $supp=new SUPPLIER();
  $item=new ITEM();
  $dept=new DEPARTMENT();
  $prs=new PRS();

//PRS
  if( isset($db1,$_POST['dept_id']) && isset($_POST['it_no']) && isset($_POST['purpose']) && isset($_POST['qty']) && isset($_POST['price']) && isset($_POST['date_prep']) && isset($_POST['date_needed']) && isset($_POST['supp_id']) && isset($_POST['app_status']))
    {
    $prs->add_prs($db1,$_POST['dept_id'], $_POST['it_no'], $_POST['purpose'], $_POST['qty'], $_POST['price'], $_POST['date_prep'], $_POST['date_needed'], $_POST['supp_id'], $_POST['app_status']);
    }

    if(isset($_GET['rid']))
  {
    $prs->delete_prs($db1,$_GET['rid']);
  }

  $prslist=$prs->list_prs($db1);

  //dept
  $deptlist=$dept->list_department($db1);
  //item
  $itlist=$item->list_item($db1);
  //supplier
  $supplist=$supp->list_supplier($db1);
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
 				<div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                           Manage PRS <small>Description text here...</small>
                        </h2>
                    </div>
                    <div class="body">

							<form action="PRS.php" method="POST">

                                <label>Select Department</label>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <select  name="dept_id" required>
							                <?php
									        for($i=0;$i<=count($deptlist)-1;$i++)
										        {
							                 ?>
                                                 <option value="<?php echo $deptlist[$i]['dept_id']; ?>"><?php echo $deptlist[$i]['dept_name']; ?></option>
							                <?php
										        }
							                ?>
                                         </select>
                                        </div>
                                    </div>
                                </div>

                                <label>Select Item</label>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <select  name="it_no" required>
							                <?php
									        for($i=0;$i<=count($itlist)-1;$i++)
										        {
							                 ?>
                                                 <option value="<?php echo $itlist[$i]['it_no']; ?>"><?php echo $itlist[$i]['particular']; ?></option>
							                <?php
										        }
							                ?>
                                         </select>
                                        </div>
                                    </div>
                                </div>

                                <label>Purpose</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="purpose" class="form-control" name="purpose" placeholder="Enter Purpose">
                                    </div>
                                </div>

                                <label>Quantity</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="qty" class="form-control" name="qty" placeholder="Enter quantity">
                                    </div>
                                </div>
                                
                                <label>Price</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="price" class="form-control" name="price" placeholder="Enter price">
                                    </div>
                                </div>

                                <label>Date Prepared</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="date_prep" class="form-control" name="date_prep" placeholder="EX:month/day/year">
                                    </div>
                                </div>
                                
                                <label>Date Needed</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="date_needed" class="form-control" name="date_needed" placeholder="EX:month/day/year">
                                    </div>
                                </div>

                                <label>Select Supplier</label>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <select  name="supp_id" required>
							                <?php
									        for($i=0;$i<=count($supplist)-1;$i++)
										        {
							                 ?>
                                                 <option value="<?php echo $supplist[$i]['supp_id']; ?>"><?php echo $supplist[$i]['supp_name']; ?></option>
							                <?php
										        }
							                ?>
                                         </select>
                                        </div>
                                    </div>
                                </div>

                                <label>Application Status</label>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-md-9">
                                            <select  name="app_status" required>
							               
                                                 <option value="0">Not Approved</option>
                                                 <option value="1">Approved</option>
							               
                                         </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="SUBMIT">
                            </form>
					</div>
                </div>

                 <div class="card">
                        <div class="header">
                            <h2>
                                Units
                                <small>List of Units in DBC</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>DEPARTMENT</th>
                                        <th>ITEM</th>
                                        <th>PURPOSE</th>
                                        <th>QUANTITY</th>
                                        <th>PRICE</th>
                                        <th>DATE PREPARED</th>
                                        <th>DATE NEEDED</th>
                                        <th>SUPPLIER</th>
                                        <th>STATUS</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<=count($prslist)-1;$i++)
										{
									?>
                                    <tr>
                                        <th scope="row"><?php echo ($i+1)?></th>
                                        <td><?php echo $prslist[$i]['dept_id']; ?> </td>
                                        <td><?php echo $prslist[$i]['it_no']; ?> </td>
                                        <td><?php echo $prslist[$i]['purpose']; ?> </td>
                                        <td><?php echo $prslist[$i]['qty']; ?> </td>
                                        <td><?php echo $prslist[$i]['price']; ?> </td>
                                        <td><?php echo $prslist[$i]['date_prep']; ?> </td>
                                        <td><?php echo $prslist[$i]['date_needed']; ?> </td>
                                        <td><?php echo $prslist[$i]['supp_id']; ?> </td>
                                        <td><?php echo $prslist[$i]['app_status']; ?> </td>
                                        <td><a href="PRS.php?rid=<?php echo $prslist[$i]['prs_no'];?>">[Delete]</a></td>
                                    </tr>
                                    <?php
									    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div>
    </section>
<?php
include "components/footer.inc"; 
?>