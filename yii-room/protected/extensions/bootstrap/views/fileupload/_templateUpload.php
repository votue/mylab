<!-- The file upload form used as target for the file upload widget -->
<?php $htmlOpt = array_merge($this->htmlOptions,array('style'=>'overflow:visible'))?>
<?php echo CHtml::beginForm($this->url, 'post',$htmlOpt); ?>
<div class="fileupload-buttonbar" style="margin-top:-55px">
    <div class="row-fuild">
        <div class="row-fuild">
    		<span class="sicBtt blueBtn fileinput-button pull-right"> <i class="icon-plus icon-white"></i> 
                <span>Thêm ảnh</span>
    			<?php
    			if ($this->hasModel()) :
    				echo CHtml::activeFileField($this->model, $this->attribute, $htmlOpt) . "\n"; else :
    				echo CHtml::fileField($name, $this->value, $htmlOpt) . "\n";
    			endif;
    			?>
    		</span>
        </div>
    </div>
    <div class="row-fuild fileupload-progress fade" style="padding-top:30px">
        <!-- The global progress bar -->
        <div class="progress progress-success progress-striped active" role="progressbar">
            <div class="bar" style="width:0%;"></div>
        </div>
        <!-- The extended global progress information -->
        <div class="progress-extended">&nbsp;</div>
    </div>
</div>
<!-- The loading indicator is shown during image processing -->
<div class="fileupload-loading"></div>
<br>
<!-- The table listing the files available for upload/download -->
<div class="row-fluid">
    <table class="table table-striped">
        <tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
    </table>
</div>
<?php echo CHtml::endForm(); ?>

