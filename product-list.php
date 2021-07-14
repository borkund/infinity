<?php   
  include("db_connection.php");
  if(!empty($_SESSION["infinity_user_name"])){   
  include("header.php");   
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product details with stock</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product name</th>
                    <th>Unit</th>
					<th>Quantity</th>
                    <th>Stock</th>
					<th>Price Without GST</th>
                    <th>Price With GST</th>
                    <th>Added By</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
				    $sql = "SELECT product_master.`id`, `product_name`, `product_unit`, `product_price_with_gst`, `product_price_without_gst`, `product_quantity`, `product_stock`, `added_date`, infinity_login.full_name as added_by FROM product_master inner join infinity_login ON product_master.`added_by` = infinity_login.id";					
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {											
					?>
					  <tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["product_name"]; ?></td>
						<td><?php echo $row["product_unit"]; ?></td>
						<td><?php echo $row["product_quantity"]; ?></td>
						<td><?php echo $row["product_stock"]; ?></td>						
						<td><?php echo $row["product_price_without_gst"]; ?></td>
						<td><?php echo $row["product_price_with_gst"]; ?></td>
						<td><?php echo $row["added_by"]; ?></td>
						<td><?php echo $row["added_date"]; ?></td>
					  </tr> 
					 <?php
						  }
						} else {
						  echo "0 results";
						}
					?>
                  </tbody>                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
     include("footer.php"); 
   }else{
	   header("location: login.php");
   }	
	
   ?>    
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>