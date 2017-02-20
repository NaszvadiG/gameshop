<div class="row details">
    <div class="col-md-4">
        <img src="<?php echo base_url(); ?>assets/images/products/<?php echo $product->image; ?>" alt="">
    </div>
    <div class="col-md-8">
        <h3><?php echo $product->title; ?></h3>
        <div class="details-price">Price: $<?php echo $product->price;?></div>
        <div class="details-description"><?php echo $product->description;?></div>
        <div class="details-buy">
            <form action="<?php echo base_url(); ?>cart/add/<?php echo $product->id; ?>" method="post">
                QTY: <input type="number" class="qty" name="qty" value="1">
                <input type="hidden" name="item_number" value="<?echo $product->id;?>">
                <input type="hidden" name="price" value="<?echo $product->price;?>">
                <input type="hidden" name="title" value="<?echo $product->title;?>">
                <button class="btn btn-primary" type="submit">Add To Cart</button>
            </form>
        </div>
    </div>
</div><!-- /.details row -->