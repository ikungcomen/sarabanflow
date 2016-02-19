<hr/>
<div style = "margin-left:15px; margin-right:15px">
    <div style = "width :100% ; background-color: #3e8f3e; padding-left :15px ;color:#FFFFFF"><h2><img src = "assets/img/icon-re.ico" width = "40px">&nbsp;&nbsp;<b>ลงรับเอกสารจากระบบ Online</b></h2></div>
    <h3 style = "color:blue;"><b>&nbsp;ตีกลับเอกสาร</b></h3>
<?php $this->load->view('online_receive_dep/headerMenu'); ?>
<div class="container"><br>
   <div class="">
    <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
        <div class="well well-sm">
          <form class="form-horizontal" action="index.php/receiveDocumentOnline/receiveDocumentOnline/accept_return_document" method="post" id = "return_accept">
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">รายละเอียดการตีกลับ</label>
              <div class="col-md-9">
                <textarea class="form-control" id="messages" name="messages" placeholder="กรอกรายละเอียดการตีกลับ" rows="5"></textarea>
              </div>
            </div>
            <input type="hidden" name="receive_document_department_id" id="receive_document_department_id" value="<?php echo $receive_document_department_id; ?>">
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg">ตีกลับเอกสาร</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-2">
      </div>
    </div>
</div>
</div>

<script type="text/javascript">
  
  $("#return_accept").validate({

            rules: {
                    messages: "required"
                },

            messages: {
                messages: "<p style = 'color:red;'>กรุณากรอกรายละเอียดการตีกลับ</p>"
            },        
        });

</script>>