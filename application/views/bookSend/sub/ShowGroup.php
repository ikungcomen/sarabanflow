     <div class="form-group col-lg-12 text-right">
              <h3><b>แสดงกลุ่ม</b></h3>
                    <div class="tab-pane fade in active" id="tab1default">
                        <table id="myTable" class="table mytd" cellspacing="0" width="100%" style="background-color:yellow;">
                            <thead>
                                <tr>
                                    <th><!-- <input type ="checkbox" name="institution_id_send_all" id="institution_id_send_all"  value = ""> --></th>
                                    <th>ชื่อกลุ่ม</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!isset($result))
                                    {

                                    }
                                    else
                                    {
                                    foreach($result as $row){?>
                                    <tr >
                                        <td align="center"><input class = "id_send"  type ="checkbox" value = "<?php echo $row['id']?>" name="institution_id_send_group[]" id = "institution_id_send_group"></td>
                                        <td align="center"><?php echo $row['group_name'];?></td>
                                        <td align="center">
                                            <a  onclick="return confirm('ต้องการที่จะลบจริงหรือไม่');" href = "index.php/bookSend/bookSend/del_group/<?php echo $row['id']?>/<?php echo $id_re;?>" class = "btn btn-danger">ลบกลุ่มนี้</a>&nbsp;
                                            <!--<a href = "index.php/bookSend/bookSend/show_group/<?php echo $row['id']?>" class = "btn btn-warning">ดูรายละเอียด</a>-->
                                        </td>
                                    </tr>
                                <?php }}?>
                            </tbody>
                        </table>
             </div>
   </div>
   <script type="text/javascript">
    $(document).ready(function() {
       var table = $('#myTable').DataTable(
        {
                  "bSort" : false
                } 
        );
    });   
    function set_session(e,id)
    {    
            if($(e).is(':checked'))
            {
                $.post( "index.php/bookSend/bookSend/set_session",{'id':id}, function( data ) {
                    //alert("check"+data);
                });
            }
            else
            {
                $.post( "index.php/bookSend/bookSend/unset_session",{'id':id}, function( data ) {
                  //alert("un check"+data);
                });
            }
    }
   </script>