<section id="psSlide" class="pull-left">
    <?php $this->renderPartial('_slide-show-post',compact('model')) ?>
</section>

<section id="psCmt" class="wallBox pull-right">
    <?php echo $this->renderPartial('_right-sidebar',compact('model')) ?>
</section>