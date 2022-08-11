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
            <h1>All specs</h1>
            <table class="table table-dashed">
                <th>Id</th><th>Spec Name</th><th>Model Name</th><th>Edit</th><th>Delete</th>
                <?php if($allSpecs):?>
                    <?php foreach($allSpecs as $spec):?>
                        <tr class="ccat<?php echo $spec->spId;?>">
                            <td>
                                <?php echo $spec->spId;?>
                            </td>
                            <td>
                                <?php echo $spec->spName;?>
                            </td>
                            <td>
                                <?php echo $spec->mName;?>
                            </td>
                            <td>
                                <a href="<?php echo site_url("admin/editspec/".$spec->spId);?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger specNow" data-id="<?php echo $spec->spId;?>" data-text="<?php echo $this->encryption->encrypt($spec->spId)?>">Delete</a>
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



