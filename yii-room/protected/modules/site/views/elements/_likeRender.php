<?php if($type == 'post'): ?>
    <!-- model is Post -->
    <?php if(!Yii::app()->user->isGuest): ?>
        <?php if($model->checkLike(Yii::app()->user->id)): ?>
            <button onclick="dislikePost(this)" dataId="<?php echo $model->id ?>" class="spacebtn pull-right inlike"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
        <?php else: ?>
            <button onclick="likePost(this)" dataId="<?php echo $model->id ?>" class="spacebtn pull-right"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
        <?php endif ?>
    <?php else:?>
        <button onclick="showLogin()" class="spacebtn pull-right"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
    <?php endif ?>

<?php elseif($type == 'comment'): ?>
    <!-- model is Comment -->
    <?php if(!Yii::app()->user->isGuest): ?>
        <?php if($model->checkLike(Yii::app()->user->id)): ?>
            <button onclick="dislikePost(this)" dataId="<?php echo $model->id ?>" class="spacebtn pull-right inlike"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
        <?php else: ?>
            <button onclick="likePost(this)" dataId="<?php echo $model->id ?>" class="spacebtn pull-right"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
        <?php endif ?>
    <?php else:?>
        <button onclick="showLogin()" class="spacebtn pull-right"><?php echo $model->likeCount ?> <i class="fa fa-thumbs-o-up"></i></button>
    <?php endif ?>
<?php endif ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('.inlike').hover(function(){
            $(this).find('.fa').removeClass('fa-thumbs-o-up');
            $(this).find('.fa').addClass('fa-thumbs-o-down');
        },function(){
            $(this).find('.fa').removeClass('fa-thumbs-o-down');
            $(this).find('.fa').addClass('fa-thumbs-o-up');
        })
    })
</script>