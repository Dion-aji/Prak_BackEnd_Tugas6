<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cart Jual Laptop </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">
		<?php $this->load->view("admin/_partials/sidebar.php") ?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->

			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->
    <div class="container">
     <br /><br />

     <div class="col-lg-10 col-md-1">
      <div class="table-responsive">
       <h3 align="center">Jual laptop </h3><br />
       <?php
       foreach($product as $row)
       {
        echo '
        <div class="col-md-4" style="padding:10px; background-color:#f1f1f1; border:1px solid #ccc; margin-bottom:16px; height:400px" align="center">
         <img src="'.base_url().'images/'.$row->product_image.'" class="img-thumbnail" /><br />
         <h4>'.$row->product_name.'</h4>
         <h3 class="text-danger">$'.$row->product_price.'</h3>
         <input type="text" name="quantity" class="form-control quantity" id="'.$row->product_id.'" /><br />
         <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->product_name.'" data-price="'.$row->product_price.'" data-productid="'.$row->product_id.'" />Add to Cart</button>
        </div>
        ';
       }
       ?>

      </div>
     </div>
     <div class="col-lg-6 col-md-6">
      <div id="cart_details">
       <h3 align="center">Cart kosong</h3>
      </div>
     </div>

    </div>
	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
<script>
$(document).ready(function(){

 $('.add_cart').click(function(){
  var product_id = $(this).data("productid");
  var product_name = $(this).data("productname");
  var product_price = $(this).data("price");
  var quantity = $('#' + product_id).val();
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>C_cart/add",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     alert("Barang berhasil di tambah ke cart");
     $('#cart_details').html(data);
     $('#' + product_id).val('');
    }
   });
  }
  else
  {
   alert("Tolong masukan jumlah yang ingin di beli");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>C_cart/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Yakin ingin menghapus barang?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>C_cart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Barang sudah terhapus");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Yakin ingin menghapus cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>C_cart/clear",
    success:function(data)
    {
     alert("Cart kamu sudah bersih..");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>
