<header id="top-menu">
    <div class="container">
        <div class="pull-left">
            <div id="logo">
                <a href="<?php echo Yii::app()->getHomeUrl()?>"><img width="123" src="<?php echo $this->baseUrl.'/images/logo.png' ?>" /></a>
                <a href="#" class="btn-info btn">
                    <i class="fa fa-bars" style="font-size:15px;color:#F4F4F4;padding-top:4px"></i>
                </a>
            </div>
            <div class="searchMain">
                <?php $local = Location::model()->findAll() ?>
                <ul class="dropdown-menu">
                    <?php foreach($local as $item): ?>
                        <li dataName="<?php echo $item->name ?>" dataValue="<?php echo $item->id ?>"><a href="#"><?php echo $item->name ?></a></li>
                    <?php endforeach ?>
                </ul>
                <div class="img-search"></div>
                <span class="badge bg-gray" style="display:none"></span>
                <input type="text" name="value" class="nostyle" placeholder="Search" />
                <input type="hidden" name="location" />
                <a data-toggle="dropdown" class="locaSearch"><i class="fa fa-chevron-down" style="margin-right:5px"></i>Địa điểm </span></a>
            </div>
            <a href="#" class="finTopMenu pull-left btn-info btn">
                <i class="fa fa-search"></i>
            </a>
        </div>
        <?php $this->renderPartial('/layouts/top-login') ?>
        <div class="clearfix"></div>
    </div>
    <div id="navigation">
        <div class="container">
            <ul>
                <li class="active"><a href="<?php echo Yii::app()->homeUrl ?>">Tất cả</a></li>
                <?php $category = Category::model()->findAllByAttributes(array('status'=>Category::STT_PUBLISH)) ?>
                <?php foreach($category as $item): ?>
                    <li><a href="<?php echo $this->createUrl('index/category', array('id'=>$item->id)) ?>"><?php echo $item->name ?></a></li>
                <?php endforeach ?>
            </ul>
            <div id="rightTopShare">
                <a href="<?php echo $this->createUrl('/post/share') ?>">Chia sẻ</a>
                <div class="dropShare">
                    <img src="<?php echo $this->baseUrl.'/images/img_icon.png' ?>" />
                    <h2>Hình ảnh</h2>
                </div>
            </div>
        </div>
    </div>
</header>