
        <div class="cart-block">
            <form action="cart/update" method="post">
                <table cellpadding="6" cellspacing="1" style="width: 100%" border="0">
                    <tr>
                        <th>QTY</th>
                        <th>Item Description</th>
                        <th class="text-right">Item Price</th>
                    </tr>

                    <?php $i = 0; ?>
                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <input type="hidden" name="<?php echo $i . '[rowid]'; ?>" value="<?php echo $items['rowid'];?>">
                        <tr>
                            <td>
                                <input type="text" name="<?php echo $i . '[qty]'; ?>" value="<?php echo $items['qty']; ?>" maxlenth="3" size="1" class="text-center" style="color:black !important;">
                            </td>
                            <td><?php echo $items['name'];?></td>
                            <td class="text-right">
                                <?php echo $this->cart->format_number($items['price']); ?>
                            </td>  
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td class="right"><strong>Total</strong></td>
                        <td class="right text-right">$<?php echo $this->cart->format_number($this->cart->total());?></td>
                    </tr>
                </table>
                <br>
                <p>
                    <buttom class="btn btn-default" type="submit">Update Cart</buttom>
                    <a class="btn btn-default" href="cart">Go To Cart</a>
                </p>
            </form>
        </div><!-- /.cart-block -->

        <div class="panel panel-default panel-list">
            <div class="panel-heading panel-heading-dark">
                <h3 class="panel-title">Categories</h3>
            </div>
            <div class="list-group">
                <?php foreach (get_categories_h() as $category) : ?>
                    <a href="<?php echo base_url(); ?>products/category/<?php echo $category->id; ?>" class="list-group-item"><?php echo $category->name; ?></a>
                <?php endforeach; ?>
            </div>
        </div><!-- /category panel -->

        <div class="panel panel-default panel-list">
            <div class="panel-heading">
                <h3 class="panel-title">Most Popular</h3>
            </div>
            <div class="list-group">
                <?php foreach (get_popular_h() as $popular_product) : ?>
                    <a href="<?php echo base_url(); ?>products/details/<?php echo $popular_product->id; ?>" class="list-group-item">
                        <?php echo $popular_product->title; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div><!-- /category panel -->