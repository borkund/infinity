<?php   
  include("db_connection.php");
  if(!empty($_SESSION["infinity_user_name"])){   
  include("header.php");   
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-8 col-12">        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="add-product-details.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Unit</label>
					<select class="form-control select2" name="product_unit" style="width: 100%;" required>
						<option value="">Select Product Unit</option>
						<?php
				    $sql = "SELECT product_unit FROM `product_unit_master`";					
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {											
					?>
						<option value="<?php echo $row["product_unit"]; ?>"><?php echo $row["product_unit"]; ?></option>
					<?php
						  }
						} else {
						  echo "0 results";
						}
					?>	                   
                    </select>                    
                  </div>
                  <div class="form-group">
                    <label for="exampleInputProduct1">Product Price with GST / Unit</label>
                    <input type="number" class="form-control" name="product_price_with_gst" placeholder="Product Price with GST" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputProduct1">Product Price without GST / Unit</label>
                    <input type="number" class="form-control" name="product_price_without_gst" placeholder="Product Price without GST" required>
                  </div>
				  <div class="form-group">
                    <label for="exampleInputProduct1">Product Quantity</label>
                    <input type="number" class="form-control" name="product_quantity" placeholder="Product Quantity" required>
                  </div> 
				  <div class="card-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
                  </div>	
                </div>               
              </form>
            </div>
          </div>          
          <!-- ./col -->
        </div>
        <!-- /.row -->       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php 
     include("footer.php"); 
   }else{
	   header("location: login.php");
   }	
   ?>