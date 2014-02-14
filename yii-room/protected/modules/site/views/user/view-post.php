<div class="rowfluid">
    <div class="span6">
        <div class="prodBox">
            <header class="headerProdBox">
                <img src="<?php echo $this->baseUrl ?>/images/artist.jpg" width="30" height="30" />
                <h2>Daily Coffee</h2>
                <h4>Chia sẻ công khai - Hôm qua: 08-15</h4>
            </header>
            <div class="bodyProdBox">
                <img src="<?php echo $this->baseUrl ?>/images/contentProduct.jpg"/>
                <h2>Sandy beach, Da Nang City</h2>
                <div class="location">
                    <span>Nhà hàng, cafe, bar</span>
                    <div class="mark">Da Nang, Viet Nam</div>
                </div>
            </div>
            
            <footer class="footerProdBox">
                <span>25 Nhận xét</span><img src="<?php echo $this->baseUrl ?>/images/next.png" width="10px" height="11px"/>
                <button class="spacebtn pull-right">12 chia sẻ</button>
                <button class="spacebtn pull-right">1234 thích</button>
            </footer>
        </div>
    </div>

    <section class="wallBox pull-left span6">
        <?php $this->renderPartial('/layouts/right-sidebar') ?>
    </section>
</div>