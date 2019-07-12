 <?php    
	include('db.php');
include("header.php");
		 $query = "SELECT * FROM `registered_users` WHERE res_status = 'Active'";
        $result = mysqli_query($con,$query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Name</th>
                                        
                                            <th>Address</th>
                                              <th>City</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                              <th>Date Of Registration</th>
                                              <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
<tbody>
                                        <tr>
                                           <?php while($row = mysqli_fetch_array($result)){ ?>
    <td><?php echo $row[0];  ?></td>
   <td><?php echo $row[1];  ?></td>

      <td><?php echo $row[4];  ?></td>
   <td><?php echo $row[5];  ?></td>
     <td><?php echo $row[2];  ?></td>
      <td><?php echo $row[6];  ?></td>
    <td><?php echo $row[7];  ?></td>
   <td><?php echo $row[8];  ?></td>
    <td>
    <a href="ApliedUserView.php?UserId= <?php echo $row[0]; ?>"><button type="submit" class="btn btn-success btn-sm"> Update</button></a>
    </td>       
   </tr>
     <?php }?> 
   </tbody>       
</table>
                            </div>
                        </div>
                    </div>
                      </div>
            </div><!-- .animated -->
        </div><!-- .content -->

       <div class="clearfix"></div>

        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>

</body>
</html>