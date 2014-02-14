<?php include 'header.php'; ?>

<body>
    <div class="flashNotice"></div>
    <?php echo $this->renderPartial('/layouts/top-menu') ?>
    <div class="container" id="mainWrapper">
        <?php if($this->hasWall): ?>
            <section id="mainContent" class="pull-left">
                <?php echo $content ?>
            </section>
        
            <section id="chatContent" class="wallBox pull-right">
                <?php echo $this->renderPartial('/layouts/right-sidebar') ?>
            </section>
        <?php else: ?>
            <?php echo $content ?>
        <?php endif ?>
        <!-- <div>
            <div class="moveUp" onclick="moveUp()"></div>
        </div> -->
    </div>
    <?php $this->renderPartial('/layouts/_modal') ?>
    <?php $this->renderPartial('/modal/loginBox') ?>
    <?php include 'footer.php'; ?>
</body>
</html>