<!-- エラー文表示 -->
<div>
        <div class="alert <?php echo $class;?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $message;?>
        </div>
</div>