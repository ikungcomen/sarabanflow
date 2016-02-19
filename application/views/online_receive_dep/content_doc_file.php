<table id="mytable" class="table table-bordred table-striped mytd">
    <thead>
        <th>&nbsp;</th>
        <th>วันที่</th>
        <th>ถึง</th>
    </thead>
    <tbody>
      <?php foreach($file_old as $row){?>
        <tr>
            <td style = 'text-align:center!important;'>
                 <?php echo "<a class = 'get_see_file' id = '".$receive_document_department_id."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>
            </td>
            <td style = 'text-align:center!important;'><?php echo date("d-m-Y H:i:s", strtotime($row['created'])); ?></td>
            <td style = 'text-align:center!important;'><?php echo $this->institution_name; ?></td>
        </tr>
       <?php }?>

        <?php foreach($file_new as $row){ ?>
        <tr>
            <td style = 'text-align:center!important;'>
                 <?php echo "<a class = 'get_see_file' id = '".$receive_document_department_id."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>
            </td>
            <td style = 'text-align:center!important;'><?php echo date("d-m-Y H:i:s", strtotime($row['created'])); ?></td>
            <td style = 'text-align:center!important;'><?php echo $this->institution_name; ?></td>
        </tr>
       <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $(".get_see_file").click(function(){
            var id = $(this).attr('id');
            $.post( "index.php/receiveDocumentOnline/receiveDocumentOnline/see_doc",{'receive_document_department_id':id}, function( data ) {});
        });
    });
</script>