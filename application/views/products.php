<?php if ($this->session->flashdata('registered')) :?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('registered'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('login_true')) :?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('login_true'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('login_false')) :?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('login_false'); ?>
    </div>
<?php endif; ?>

<?php foreach ($products as $product) : ?>
	<div class="col-md-4 game">
        <div class="game-price"><?php echo $product->price; ?></div>
        <a href="<?php echo base_url(); ?>products/details/<?php echo $product->id; ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" alt=""></a>
        <div class="game-title"><?php echo $product->title; ?></div>
        <div class="game-add">
        	<form action="<?php echo base_url(); ?>cart/add/<?php echo $product->id; ?>" method="post">
        		QTY: <input type="number" class="qty" name="qty" value="1">
        		<input type="hidden" name="item_number" value="<?php echo $product->id;?>">
        		<input type="hidden" name="price" value="<?php echo $product->price;?>">
        		<input type="hidden" name="title" value="<?php echo $product->title;?>">
            	<button class="btn btn-primary" type="submit">Add To Cart</button>
        	</form>
        </div>
    </div><!-- /game -->
<?php endforeach; ?>