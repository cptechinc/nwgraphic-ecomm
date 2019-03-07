<?php if ($priceqty2 != "" && $priceqty2 != "0") : ?>
    <table class="table-condensed table-bordered table">
        <tr> <th>Qty</th> <th class="text-right">Break</th> </tr>
        <tr> <td><?php echo $priceqty1; ?></td> <td class="text-right">$ <?php echo $priceprice1; ?></td> </tr>
        <tr> <td><?php echo $priceqty2; ?></td> <td class="text-right">$ <?php echo $priceprice2; ?></td> </tr>
        <?php if ($priceqty3 != "" && $priceqty3 != "0") : ?>
            <tr> <td><?php echo $priceqty3; ?></td> <td class="text-right">$ <?php echo $priceprice3; ?></td> </tr>
        <?php endif; ?>
        <?php if ($priceqty4 != "" && $priceqty4 != "0") : ?>
            <tr> <td><?php echo $priceqty4; ?></td> <td class="text-right">$ <?php echo $priceprice4; ?></td> </tr>
        <?php endif; ?>
        <?php if ($priceqty5 != "" && $priceqty5 != "0") : ?>
            <tr> <td><?php echo $priceqty5; ?></td> <td class="text-right">$ <?php echo $priceprice5; ?></td> </tr>
        <?php endif; ?>
        <?php if ($priceqty6 != "" && $priceqty6 != "0") : ?>
            <tr> <td><?php echo $priceqty6; ?></td> <td class="text-right">$ <?php echo $priceprice6; ?></td> </tr>
        <?php endif; ?>
    </table>
<?php endif; ?>