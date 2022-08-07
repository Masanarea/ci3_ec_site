<div class="content-wrapper">
    <div class="row padtop">
        <div class="col-md-6 col-md-offset-3">
            <!-- エラー文表示 -->
            <div>
                <?php if($this->session->flashdata("class")):?>
                    <div class="alert <?php echo $this->session->flashdata("class");?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata("message");?>
                    </div>
                <?php endif;?>
            </div>
            <h1>All Categories</h1>
            <?php if($allProducts):?>
                <table class="table table-dashed">
                    <?php foreach($allProducts as $product):?>
                        <tr class="ccat<?php echo $product->pId;?>">
                            <td>
                                <?php echo $product->pId;?>
                            </td>
                            <td>
                                <?php echo $product->pName;?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("admin/editProduct/".$product->pId);?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger delcat" data-id="<?php echo $product->pId;?>" data-text="<?php echo $this->encryption->encrypt($product->pId)?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
                <?php echo $links?>
            <?php else:?>
                <h1>Not working..</h1>
            <?php endif;?>
        </div>
    </div>
</div>



