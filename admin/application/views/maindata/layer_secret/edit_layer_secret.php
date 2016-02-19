
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <center><h3><b>แก้ไขชั้นความลับ</b></h3></center><br>

                 <?php foreach($result as $row) {?>
                <form class="form-horizontal" action="index.php/maindata/layer_secret/edit/<?php echo $row['id'];?>" method="post" id = "layer_secret">
                    <fieldset>    
                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">ชั้นความลับ</label>
                            <div class="col-md-9">
                                <input id="layersacretname" name="layersacretname" type="text" placeholder="ชั้นความลับ" class="form-control" value = "<?php echo $row['layer_name'];?>"/>
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="message">รายละเอียด</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="layersacretdetail" name="layersacretdetail" placeholder="รายละเอียด" rows="5"><?php echo $row['layer_detail'];?></textarea>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <a href  = "index.php/maindata/layer_secret" class="btn btn-success btn-lg">ย้อนกลับ</a>
                                <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <?php }?>

            </div>
        </div>
    </div>
</div>
