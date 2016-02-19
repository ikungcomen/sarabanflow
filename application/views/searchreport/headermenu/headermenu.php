    <a class="btn btn-danger"  href="index.php/searchreport/searchreport/backtoShowbookSend">
        <span class="glyphicon glyphicon-chevron-left " aria-hidden="true">&nbsp;ย้อนกลับ</span>
    </a>
    <a class="btn btn-info"    href="index.php/searchreport/searchreport/show_booksend_detail/<?php echo $this->session->userdata('id_select');?>">
        <span class="glyphicon glyphicon-th-list " aria-hidden="true">&nbsp;รายละเอียด</span>
    </a>
    <a class="btn btn-success" href="index.php/searchreport/searchreport/upload_document_attach_file/<?php echo $this->session->userdata('id_uploadfile');?>">
        <span class="glyphicon glyphicon-paperclip" aria-hidden="true">&nbsp;แนบเอกสารเพิ่ม</span>
    </a>
    <a class="btn btn-primary" href="">
        <span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;แก้ไขเอกสาร</span>
    </a>
    <a class="btn btn-danger deleteBookSend"  id="<?php echo ($result[0]['status_sending'] == 1)? "not_remove_registration":"remove_registration" ?>"  href="index.php/searchreport/searchreport/deleteBookSend/<?php echo $this->session->userdata('id_select'); ?>">
        <span class="glyphicon glyphicon-trash" aria-hidden="true" id="">&nbsp;ลบเอกสาร</span>
    </a>
    <a class="btn btn-success" href="">
        <span class="glyphicon glyphicon-export" aria-hidden="true">&nbsp;ส่งเอกสาร</span>
    </a>
    <a class="btn btn-warning" href="">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;ติดตามงาน</span>
    </a>
    <br><br>
  <script>
        $(function() {
            $("#datepicker-en").datepicker({dateFormat: 'dd/mm/yy'});
            var d = new Date();
            var toDay = (d.getFullYear()) + '-'
                    + (d.getMonth() + 1) + '-'
                    + d.getDate();
            $("#implementation_date").datepicker({changeMonth: true, changeYear: true, dateFormat: 'yy-mm-dd', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
                dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
                monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
                monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
            });

        });

        $("#not_remove_registration").click(function(e){
            e.preventDefault();
            alert('คุณได้ทำการส่งเอกสารไปแล้ว ไม่สามารถลบรายการนี้ได้...');
        });

        $("#remove_registration").click(function(e){
            if(confirm("คุณแน่ใจหรือไม่ ที่จะลบเอกสารนี้ ?")){
                
            }else{
                e.preventDefault();
            }
            
        });
    </script>