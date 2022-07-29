<?php
  include "core/connect.ini";
  include "query/admin.qry";
  include "components/header.inc";

  $dept=new DEPARTMENT();
  $emp=new EMPLOYEE();
  $item=new ITEM();
  $supp=new SUPPLIER();

//department
  if( isset($db1,$_POST['dept_name']) && isset($_POST['dept_group']) )
    $dept->add_department($db1,$_POST['dept_name'],$_POST['dept_group']);

    if(isset($_GET['rid1']))
  {
    $dept->delete_department($db1,$_GET['rid1']);
  }

  $deptlist=$dept->list_department($db1);
  
  //employee
   if( isset($db1,$_POST['surname']) && isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['dept_id']) )
    $emp->add_employee($db1,$_POST['surname'],$_POST['firstname'],$_POST['middlename'],$_POST['dept_id']);

    if(isset($_GET['rid2']))
  {
    $emp->delete_employee($db1,$_GET['rid2']);
  }

  $emplist=$emp->list_employee($db1);

  //item
  if( isset($db1,$_POST['particular']) )
    $item->add_item($db1,$_POST['particular']);

    if(isset($_GET['rid3']))
  {
    $item->delete_item($db1,$_GET['rid3']);
  }

  $itlist=$item->list_item($db1);

  //supplier
  if( isset($db1,$_POST['supp_name']) && isset($_POST['contact_person']) && isset($_POST['supp_contact_no']) && isset($_POST['supp_email']) )
    $supp->add_supplier($db1,$_POST['supp_name'],$_POST['contact_person'],$_POST['supp_contact_no'],$_POST['supp_email']);

    if(isset($_GET['rid4']))
  {
    $supp->delete_supplier($db1,$_GET['rid4']);
  }

  $supplist=$supp->list_supplier($db1);
?>

    <section class="content">
        <!--DEPARTMENT-->
        <div class="container-fluid">
            <div class="block-header">
 				<div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                           Manage Department <small>Necessary Changes Go here</small>
                        </h2>
                    </div>
                    <div class="body">

							<form action="adminpanel.php" method="POST">
                                <label>Department Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dept_name" class="form-control" name="dept_name" placeholder="Enter New Department Name" required>
                                    </div>
                                    
                                </div>
                                <label>Department Code</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dept_group" class="form-control" name="dept_group" placeholder="Enter New Department Code" required>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Add Department">
                            </form>

					</div>
                </div>

                 <div class="card">
                        <div class="header">
                            <h2>
                                Department
                                <small>List of Department in DBC</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>DEPARTMENT ID</th>
                                        <th>DEPARTMENT NAME</th>
                                        <th>DEPARTMENT GROUP</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<=count($deptlist)-1;$i++)
										{
									?>
                                    <tr>
                                        <th scope="row"><?php echo ($i+1)?></th>
                                        <td><?php echo $deptlist[$i]['dept_name']; ?> </td>
                                        <td><?php echo $deptlist[$i]['dept_group']; ?></td>
                                        <td><a href="adminpanel.php?rid1=<?php echo $deptlist[$i]['dept_id'];?>">[Delete]</a></td>
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
        <!--EMPLOYEE-->                                
        <div class="container-fluid">
            <div class="block-header">
 				<div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                           Manage Employees <small>Necessary Changes Go here</small>
                        </h2>
                    </div>
                    <div class="body">

							<form action="adminpanel.php" method="POST">
                            
                                <label>Surname</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dept_name" class="form-control" name="surname" placeholder="Enter Surname" required>
                                    </div>
                                </div>

                                <label>Firstname</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dept_group" class="form-control" name="firstname" placeholder="Enter New Department" required>
                                    </div>
                                </div>

                                <label>Middlename</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="dept_name" class="form-control" name="middlename" placeholder="Enter Middlename" required>
                                    </div>
                                </div>
								
								<label>Department ID</label>
									 <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-9">
                                    <select class="form-control show-tick" name="dept_id" required>
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
                               <br>
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Add Employee">
                            </form>
					</div>
                </div>

                 <div class="card">
                        <div class="header">
                            <h2>
                                Employees
                                <small>List of Employees in DBC</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>EMPLOYEE SURNAME</th>
                                        <th>EMPLOYEE FIRSTNAME</th>
                                        <th>EMPLOYEE MIDDLE NAME</th>
                                        <th>DEPARTMENT ID</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<=count($emplist)-1;$i++)
										{
									?>
                                    <tr>
                                        <th scope="row"><?php echo ($i+1)?></th>
                                        <td><?php echo $emplist[$i]['surname']; ?> </td>
                                        <td><?php echo $emplist[$i]['firstname']; ?></td>
										<td><?php echo $emplist[$i]['middlename']; ?></td>
										<td><?php echo $emplist[$i]['dept_id']; ?></td>
                                        <td><a href="adminpanel.php?rid2=<?php echo $emplist[$i]['emp_id'];?>">[Delete]</a></td>
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
        <!--ITEM-->                              
        <div class="container-fluid">
            <div class="block-header">
 				<div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                           Manage Items <small>Necessary Changes Go here</small>
                        </h2>
                    </div>
                    <div class="body">

							<form action="adminpanel.php" method="POST">

                                <label>Item</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="particular" class="form-control" name="particular" placeholder="Enter Item" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Add Item">
                            </form>
                    
					</div>
                </div>

                 <div class="card">
                        <div class="header">
                            <h2>
                                Item
                                <small>List of Items</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ITEM ID</th>
                                        <th>ITEM</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<=count($itlist)-1;$i++)
										{
									?>
                                    <tr>
                                        <th scope="row"><?php echo ($i+1)?></th>
                                        <td><?php echo $itlist[$i]['particular']; ?> </td>
                                        <td><a href="adminpanel.php?rid3=<?php echo $itlist[$i]['it_no'];?>">[Delete]</a></td>
                                    </tr>
                                    <?php
									    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

            </div>
        </div><br>
    <!--SUPPLIER-->
    <div class="container-fluid">
            <div class="block-header">
 				<div class="card">
                    <div class="header bg-blue-grey">
                        <h2>
                           Manage Suppliers <small>Necessary Changes Go here</small>
                        </h2>
                    </div>
                    <div class="body">

							<form action="adminpanel.php" method="POST">
                            
                                <label>Supplier Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="supp_name" class="form-control" name="supp_name" placeholder="Enter Name" required>
                                    </div>
                                </div>

                                <label>Supplier Contact</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="contact_person" class="form-control" name="contact_person" placeholder="Enter Name" required>
                                    </div>
                                </div>

                                <label>Contact Number</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="supp_contact_no" class="form-control" name="supp_contact_no" placeholder="Enter Number" required>
                                    </div>
                                </div>
								
								<label>Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="supp_email" class="form-control" name="supp_email" placeholder="Enter Email" required>
                                    </div>
                                </div>
                               <br> 
                                <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Add Supplier">
                            </form>
					</div>
                </div>

                 <div class="card">
                        <div class="header">
                            <h2>
                                Suppliers
                                <small>List of Suppliers</small>
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>SUPPLIER NAME</th>
                                        <th>SUPPLIER CONTACT</th>
                                        <th>CONTACT NUMBER</th>
                                        <th>EMAIL</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php
										for($i=0;$i<=count($supplist)-1;$i++)
										{
									?>
                                    <tr>
                                        <th scope="row"><?php echo ($i+1)?></th>
                                        <td><?php echo $supplist[$i]['supp_name']; ?> </td>
                                        <td><?php echo $supplist[$i]['contact_person']; ?></td>
										<td><?php echo $supplist[$i]['supp_contact_no']; ?></td>
										<td><?php echo $supplist[$i]['supp_email']; ?></td>
                                        <td><a href="adminpanel.php?rid4=<?php echo $supplist[$i]['supp_id'];?>">[Delete]</a></td>
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