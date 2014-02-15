<?php include 'header.php'; ?>

<body>
    <div class="flashNotice"></div>
    <?php $this->renderPartial('/layouts/top-menu') ?>
    <div class="container" id="mainWrapper">
        <div id="content">
            <?php echo $content ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>