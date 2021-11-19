<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">
		<?php $this->load->view("admin/_partials/sidebar.php") ?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>
				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/product/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $product->id_barang?>" />

							<div class="form-group">
								<label for="nama_laptop">Nama Laptop</label>
								<input class="form-control <?php echo form_error('nama_laptop') ? 'is-invalid':'' ?>"
								 type="text" name="nama_laptop" placeholder="Product name" value="<?php echo $product->nama_laptop ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_laptop') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="merek">Merek</label>
								<input class="form-control <?php echo form_error('merek') ? 'is-invalid':'' ?>"
								 type="text" name="merek" placeholder="Product merek" value="<?php echo $product->merek ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('merek') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga">Harga</label>
								<input class="form-control <?php echo form_error('harga') ? 'is-invalid':'' ?>"
								 type="number" name="harga" min="0" placeholder="Product price" value="<?php echo $product->harga ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('harga') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Foto</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $product->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="deskripsi">Deskrispi*</label>
								<textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid':'' ?>"
								 name="deskripsi" placeholder="Product description..."><?php echo $product->deskripsi?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('deskripsi') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
