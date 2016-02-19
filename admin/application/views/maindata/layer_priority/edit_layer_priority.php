
<div class="container">

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <center><h3><b>แก้ไขชั้นความเร็ว</b></h3></center><br>
                <?php foreach ($result as $row) { ?>
                    <form class="form-horizontal" action="index.php/maindata/layer_priority/edit/<?php echo $row['id']; ?>" method="post" id = "layer_priority">
                        <fieldset>    
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ชั้นความเร็ว</label>
                                <div class="col-md-9">
                                    <input id="layerpriorityname" name="layerpriorityname" type="text" placeholder="ชั้นความเร็ว" class="form-control" value = "<?php echo $row['pio_name']; ?>"/>
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">รายละเอียด</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="layerprioritydetail" name="layerprioritydetail" placeholder="รายละเอียด" rows="5"><?php echo $row['pio_detail']; ?></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <a href  = "index.php/maindata/layer_priority" class="btn btn-success btn-lg">ย้อนกลับ</a>
                                    <button type="submit" class="btn btn-primary btn-lg">บันทึก</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>