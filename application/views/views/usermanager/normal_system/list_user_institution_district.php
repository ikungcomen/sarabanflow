<table id="example_table_user_institution_district" class="display" cellspacing="0" width="100%" style="text-align: center;">
    <thead>
        <tr>
            <th style="text-align: center;">ที่</th>
            <th style="text-align: center;">username</th>
            <th style="text-align: center;">ชื่อ-นามกุล</th>
            <th style="text-align: center;">รายละเอียด</th>
            <th style="text-align: center;">สิทธิ์การใช้งาน</th>
            <th style="text-align: center;">จัดการ</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 0;
        foreach($user_district as $row){
        $count++; 
        ?>
        <tr id="<?php echo $row->id; ?>">
            <td><?php echo $count; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->fullname; ?></td>
            <td><?php echo $row->user_detail; ?></td>
            <td><?php echo $row->permission_level; ?></td>
            <td>
                <a href="javascript:void(0)" onclick="edit_user_normal_district(<?php echo $row->id; ?>)" class = "btn btn-primary">แก้ไข</a>
                <a href="javascript:void(0)" onclick="remove_user_normal_district(<?php echo $row->id; ?>)" class = "btn btn-danger">ลบ</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
          $('#example_table_user_institution_district').DataTable();
          
    });
</script>
