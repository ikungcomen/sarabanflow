<hr style = "border-style: solid; border-width: 2px; border-color:#FF6600;">
</body>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
<?php
if ($this->session->flashdata('insert_dep_send_success')) {
    ?>
            alert("ส่งเอกสารเรียบร้อยแล้ว ท่านสามารถตรวจสอบความคืบหน้าในการส่งเอกสาร ในสมุดทะเบียนส่งของท่าน");
<?php } ?>
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable(
            	{
				  "bSort" : false
				} 
            );
        });
        
    });
    
</script>

</html>