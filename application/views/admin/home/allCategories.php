<div class="content-wrapper">
    <!-- エラー文表示 -->
    <div>
        <?php if($this->session->flashdata("class")):?>
            <div class="alert <?php echo $this->session->flashdata("class");?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata("message");?>
            </div>
        <?php endif;?>
    </div>
    <div class="row padtop">
        <div class="col-md-6 col-md-offset-3">
            <h1>All Categories</h1>
            <?php if($allCategories):?>
                <table class="table table-dashed">
                    <?php foreach($allCategories as $category):?>
                        <tr>
                            <td>
                                <?php echo $category->cId?>
                            </td>
                            <td>
                                <?php echo $category->cName?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("admin/editCategory/".$category->cId);?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
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



