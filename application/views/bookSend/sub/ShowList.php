     <div class="form-group col-lg-12 text-right">
                    <h3><b>แสดงหน่วยงาน</b></h3>
                    <div class="tab-pane fade in active" id="tab1default">
                        <table id="myTable" class="table mytd" cellspacing="0" width="100%" style="background-color:yellow;">
                            <thead>
                                <tr>
                                    <th><input type ="checkbox" name="institution_id_send2" id="institution_id_send2"  value = "<?php echo (isset($province_id))?  $province_id : '';?>"> </th>

                                    <th>&nbsp;&nbsp;หน่วยงาน</th>
                                    <th>ระดับหน่วยงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if(!isset($result_province))
                                    {

                                    }
                                    else
                                    {
                                    foreach($result_province as $row){?>
                                    <tr >
                                        <td align="center"><input class = "id_send"  type ="checkbox" onclick = "set_session(this,'<?php echo $row['id'].','."institution_province";?>')" name="institution_id_send[]" id = "institution_id_send"  value = "<?php echo $row['id'].','."institution_province";?>"></td>
                                        <td align="center"><?php echo $row['institution_province_name'];?></td>
                                        <td align="center"><p style="color:red">หน่วยงานระดับจังหวัด</p></td>
                                    </tr>
                                <?php }}?>

                                <?php 
                                    if(!isset($result_amphur))
                                    {

                                    }
                                    else
                                    {
                                    foreach($result_amphur as $row){?>
                                    <tr>
                                        <td align="center"><input class = "id_send" type ="checkbox" onclick = "set_session(this,'<?php echo $row['id'].','."institution_amphur";?>')" name="institution_id_send[]" id = "institution_id_send" value = "<?php echo $row['id'].','."institution_amphur";?>"></td>
                                        <td align="center"><?php echo $row['institution_amphur_name'];?></td>
                                        <td align="center"><p style="color:green">หน่วยงานระดับอำเภอ</p></td>
                                    </tr>
                                <?php }}?>


                                <?php 
                                    if(!isset($result_tambol))
                                    {

                                    }
                                    else
                                    {
                                    foreach($result_tambol as $row){?>
                                    <tr>
                                        <td align="center"><input class = "id_send" type ="checkbox" onclick = "set_session(this,'<?php echo $row['id'].','."institution_district";?>')" name="institution_id_send[]" id = "institution_id_send" value = "<?php echo $row['id'].','."institution_district";?>"></td>
                                        <td align="center"><?php echo $row['institution_district_name'];?></td>
                                         <td align="center"><p style="color:blue">หน่วยงานระดับตำบล</p></td>
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
        var check_all = 0;

        $("#institution_id_send2").click(function(){
            var pro_id = $("#institution_id_send2").val();
            if($(this).val() == '')
            {
                alert('กรุณาเลือกจังหวัด');
                $(this).attr('checked',false);
            }
            else
            {
                if($(this).is(':checked'))
                {                  
                    $.post( "index.php/bookSend/bookSend/set_all_data/",{'pro_id':pro_id}, function( data ){});
                    $.each(":input[name = 'institution_id_send']",function(){
                       $(".id_send").attr('checked',true);
                    });
                    
                    check_all = 0;
                }
                else
                {  
                     $.post( "index.php/bookSend/bookSend/unset_all_data/",{'pro_id':pro_id},function( data ){});
                     $(".id_send").attr('checked',false);
                     check_all = 1;
                }
            }
            
        });
        
        $(".paginate_button").live('click',function(){
        
//alert('kkk');
            if($("#institution_id_send2").is(':checked'))
            {   
                var pro_id = $("#institution_id_send2").val();
                //alert(pro_id);

                $.each(":input[name = 'institution_id_send']",function(){
                     $(".id_send").attr('checked',true);
                });


            }
            else
            {  
                //alert('kkk22');
                var pro_id = $("#institution_id_send2").val();
                //alert(pro_id);
                // var check = false;
                
                // $.each(":input[name = 'institution_id_send']",function(){
                //     if($(this).is(':checked'))
                //     {
                //         check = true;
                //     }
                //     else
                //     {
                       
                //     }
                // });

                //alert('kkk22');
                alert(check_all);
                if(check_all == 1)
                {
                    $.each(":input[name = 'institution_id_send']",function(){
                        $(".id_send").attr('checked',false);
                    });
                
                }
                else
                {

                }
                
                   


            }

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
