<!-- Modal -->
<div class="product-box">
        <div class="modal fade" id="product_<?php echo $p['KodeProduk']; ?>" tabindex="-1" aria-labelledby="product_<?php echo $p['KodeProduk']; ?>Label" aria-hidden="true" data-bs-target="#staticBackdrop">
        <div class="modal-dialog modal-xl">
            <div class="modal-content clearfix">
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body row g-0">
                <div class="col-md-6 col-12">
                    <img src="<?php echo $p['Gambar']; ?>" class="modal-image">
                </div>
                <div class="col-md-6 col-12 content">
                    <h3 class="title"><?php echo $p['NamaProduk']; ?></h3>
                    <div class="price"><?php echo "Rp ".number_format($p['Harga'],0,',','.'); ?></div>
                    <div class="description"><?php echo nl2br($p['Keterangan']); ?></div>
                    <div class="prod-list-item">
                        <span>Connect to us :</span>
                        <ul class="product-social">
                            <?php if (!empty($p['Tokopedia'])) { ?>
                                <li><a href="<?php echo $p['Tokopedia']; ?>"><i class="ft-tokopedia"></i></a></li>
                            <?php } ?>
                            <?php if (!empty($p['Shopee'])) { ?>
                                <li><a href="<?php echo $p['Shopee']; ?>"><i class="ft-shopee"></i></a></li>
                            <?php } ?>
                            <?php if (!empty($p['Blibli'])) { ?>
                                <li><a href="<?php echo $p['Blibli']; ?>"><i class="ft-blibli"></i></a></li>
                            <?php } ?>
                            <li><a href="https://api.whatsapp.com/send?phone=6285341746323&text=Halo,%20apakah%20Stock%20dari%20<?php echo $p['NamaProduk'];  ?>%20ready%20?%20" target="_blank"><i class="bi bi-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>