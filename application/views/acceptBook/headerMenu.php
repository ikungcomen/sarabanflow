
    &nbsp;&nbsp;<a href = "index.php/receiveDocumentOnline/receiveDocumentOnline" class = "btn btn-danger btn-lg">ย้อนกลับ</a>
    &nbsp;&nbsp;<a href = "index.php/acceptBook/acceptBook/show_detail/<?php echo $id_accept;?>/<?php echo $id_create;?>" class = "btn btn-success btn-lg">รายละเอียด</a>
    &nbsp;&nbsp;<a href = "index.php/acceptBook/acceptBook/detail_receivce_document/<?php echo $id_accept;?>/<?php echo $id_create;?>" id="check_exist_document_no_" class = "btn btn-primary btn-lg">ลงรับเอกสาร</a>
    &nbsp;&nbsp;<a href = "index.php/acceptBook/acceptBook/return_document/<?php echo $id_accept;?>/<?php echo $id_create;?>" class = "btn btn-warning btn-lg">ตีกลับเอกสาร</a>
    <br/><br/>
</div>

<script>
    $(document).ready(function(){
        
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>index.php/acceptBook/acceptBook/check_exist_document_no",
            data: {redistration_create_number_id: <?php echo $id_create; ?> },
            dataType: "html",
            success: function(resp){
                if($.trim(resp) == "exist"){
                    $("#check_exist_document_no").attr('href', 'javascript:void(0)');
                    
                }else if($.trim(resp) == "no-exist"){

                }
            }
        });
        
        $("#check_exist_document_no").click(function(e){
            if(confirm('ต้องการที่จะลงรับเอกสารจริงหรือไม่')){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/acceptBook/acceptBook/check_exist_document_no",
                    data: {redistration_create_number_id: <?php echo $id_create; ?> },
                    dataType: "html",
                    success: function(resp){
                        if($.trim(resp) == "exist"){
                            e.preventDefault();
                            alert('ไม่สามารถทำการรับเอกสารนี้ได้ เนื่องจากคุณมีเอกสารฉบับนี้แล้ว');
                        }else if($.trim(resp) == "no-exist"){

                        }
                    }
                });
            }else{
                e.preventDefault();
            }
        });
        
    });
    
</script>