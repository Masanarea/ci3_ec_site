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
            <h1>All Models</h1>
            <table class="table table-dashed">
                <th>Id</th><th>model Name</th><th>Company</th><th>Edit</th><th>Delete</th>
                <?php if($allModels):?>
                    <?php foreach($allModels as $model):?>
                        <tr class="ccat<?php echo $model->mId;?>">
                            <td>
                                <?php echo $model->mId;?>
                            </td>
                            <td>
                                <?php echo $model->mName;?>
                            </td>
                            <td>
                                <?php echo $model->mDescription;?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("admin/editmodel/".$model->mId);?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger delmodel" data-id="<?php echo $model->mId;?>" data-text="<?php echo $this->encryption->encrypt($model->mId)?>">Delete</a>
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



