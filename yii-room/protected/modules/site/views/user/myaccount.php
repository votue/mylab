<div class="row-fluid" style="margin-top:10px">
    <?php 
    $tabs = array(
        array(
            'label' => 'Xem bài đăng<div class="rightDarkIcon pull-right"></div>', 
            'content' => $this->renderPartial('view-post',compact('user'),true,true),
        ),
        array(
            'label' => 'Xem ảnh<div class="rightDarkIcon pull-right"></div>', 
            'content' => $this->renderPartial('view-image',compact('user'),true,true),
        ),
        array(
            'label' => 'Giới thiệu bản thân<div class="rightDarkIcon pull-right"></div>',
            'content' => $this->renderPartial('view-profile',compact('user'),true,true),
            'active' => true
        ),
    );
    $this->widget(
        'bootstrap.widgets.TbTabs',
        array(
            'encodeLabel' => false,
            'htmlOptions'=>array('class'=>'rightMenu span12'),
            'type' => 'tabs',
            'placement' => 'left',
            'tabs' => $tabs
        )
    );?>
    <!-- <div>
        <div class="moveUp" onclick="moveUp()"></div>
    </div> -->
</div>