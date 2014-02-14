<div class="rowfluid">
    <div class="span6">
        <!-- BẠN BÈ NHÓM HỘI -->
        <div class="stdBox">
            <h1 class="title">Tất cả nhóm</h1>
            <div class="content">
                <h2>Trong nhóm của bạn <span class="moreInfo">123 Người</span></h2>
                <ul>
                    <li>Nhóm lữ hành<span class="moreInfo">123 Người</span></li>
                    <li>Nhóm vui chơi giải trí<span class="moreInfo">123 Người</span></li>
                </ul>

                <h2>Có bạn trong nhóm <span class="moreInfo">123 Người</span></h2>
            </div>
            <div class="footer">
                <a href="">Chỉnh sửa</a>
            </div>
        </div>

        <!-- CƠ QUAN HỌC VẤN -->
        <div class="stdBox">
            <h1 class="title">Cơ quan - Học vấn</h1>
            <div class="content">
                <?php $this->renderPartial('/smallpiece/usr-job-info',compact('user')) ?>
            </div>
            <div class="footer">
                <a href="javascript:void(0)" onclick="usrUpJob(this)" data-user-id="<?php echo Yii::app()->user->id ?>">Chỉnh sửa</a>
            </div>
        </div>

        <!-- THÔNG TIN CƠ BẢN -->
        <div class="stdBox">
            <h1 class="title">Thông tin cơ bản</h1>
            <div class="content">
                <?php $this->renderPartial('/smallpiece/usr-basic-info',compact('user')) ?>
            </div>
            <div class="footer">
                <a href="javascript:void(0)" onclick="usrUpBasic(this)" data-user-id="<?php echo Yii::app()->user->id ?>">Chỉnh sửa</a>
            </div>
        </div>
    </div>
    <div class="span6">
        <!-- GIỚI THIỆU VỀ BẠN -->
        <div class="stdBox">
            <h1 class="title">Giới thiệu về bạn</h1>
            <div class="content">
                <?php $this->renderPartial('/smallpiece/usr-brie-info',compact('user')) ?>         
            </div>
            <div class="footer">
                <a href="javascript:void(0)" onclick="usrUpSelfInfo(this)" data-user-id="<?php echo Yii::app()->user->id ?>">Chỉnh sửa</a>
            </div>
        </div>

        <!-- LIÊN HỆ - LIÊN KẾT -->
        <div class="stdBox">
            <h1 class="title">Liên hệ - Liên kết</h1>
            <div class="content">
                <?php $this->renderPartial('/smallpiece/usr-links-info',compact('user')) ?>
            </div>
            <div class="footer">
                <a href="javascript:void(0)" onclick="usrUpLinks(this)" data-user-id="<?php echo Yii::app()->user->id ?>">Chỉnh sửa</a>
            </div>
        </div>

        <!-- ĐỊA ĐIỂM -->
        <div class="stdBox">
            <h1 class="title">Địa điểm</h1>
            <div class="content">
                <?php $this->renderPartial('/smallpiece/usr-local-info',compact('user')) ?>
            </div>
            <div class="footer">
                <a href="javascript:void(0)" onclick="usrUpLocal(this)" data-user-id="<?php echo Yii::app()->user->id ?>">Chỉnh sửa</a>
            </div>
        </div>
    </div>
</div>
