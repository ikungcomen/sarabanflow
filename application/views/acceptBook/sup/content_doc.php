<table id="mytable" class="table table-bordred table-striped mytd">
                <thead>
                <th style ='text-align:center!important;'>&nbsp;</th>
                <th style ='text-align:center!important;'>วันที่</th>
                <th style ='text-align:center!important;'>ถึง</th>
                </thead>
                <tbody>
                  <?php foreach($result as $row){?>
                    <tr>
                        <td style = 'text-align:center!important;'>
                             <?php echo "<a class = 'get_see_file' id = '".$id_create."' target = '_blank' href = '"."uploads/registration_create_file/".$row['file_upload_name']."'>".getFileExtension($row['file_upload_name'])."</a>"; ?>
                        </td>
                        <td style = 'text-align:center!important;'><?php echo $row['created'];?></td>
                        <td style = 'text-align:center!important;'><?php echo $this->institution_name; ?></td>
                    </tr>
                   <?php }?>
                </tbody>
            </table>
            <script>
                $(document).ready(function(){
                    $(".get_see_file").click(function(){
                        var id = $(this).attr('id');
                        $.post( "index.php/acceptBook/acceptBook/see_doc",{'id':id}, function( data ) {});
                    });
                });
            </script>