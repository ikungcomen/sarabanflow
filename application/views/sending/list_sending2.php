  <form action = 'index.php/bookSend/sending/set_session/<?php echo $id_data;?>' method = 'post'>
   <div class="table-responsive">
    <span class = 'pull-right'><input type = 'submit' class="btn btn-primary btn-lg" value = 'เพิ่มในรายการส่ง'/></span><br/><br/><br/>
    <h4 id = 'title_text' style = 'color:red'><b></b></h4>
            <table id="myTables" class="table table-bordred table-striped mytd">
                <thead>
                <th style = 'width:90px!important;text-align:center!important;'><input id = 'selecctall' name = 'selecctall' type = 'checkbox'></th>
                <th style ='text-align:center!important;'>ชื่อหน่วยงาน</th>
                </thead>
                <tbody>
                 <?php foreach($list_institution as $row){?>
                    <tr>
                        <td style = 'width:90px!important;text-align:center!important;'><input value = '<?php echo $row['id'];?>' class = 'item_select' id = 'item_select' name = 'item_select[]' type = 'checkbox'></td>
                        <td style ='text-align:center!important;'><?php echo $row[$level]?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            
        </div>
    </form>
   <script> 
     $(document).ready(function() {
        var item_type = '<?php echo $item_type ;?>';
        var item_text = '';
        if(item_type == 1)
        {
            item_text = 'institution_province';
            $("#title_text").text('หน่วยงานระดับจังหวัด');
        }
        if(item_type == 2)
        {
             item_text = 'institution_amphur';
             $("#title_text").text('หน่วยงานระดับอำเภอ');
        }
        if(item_type == 3)
        {
             item_text = 'institution_district';
             $("#title_text").text('หน่วยงานระดับตำบล');
        }

        $(".item_select").each(function(){
            $(this).val($(this).val()+','+item_text);
        });
        $('#selecctall').click(function(event) {  //on click 
            if(this.checked) { // check select status
                $('.item_select').each(function() { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });
            }else{
                $('.item_select').each(function() { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });         
            }
        });
        
    });
   </script>
