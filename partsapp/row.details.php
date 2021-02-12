<?php
require 'backend/session.php';
require "connection.php";
$page = 'Pretraga';
require 'partials/top.php';

$id = $_GET['id'];
$checked = $_GET['table'];
$row[] = array();
$sql = "SELECT * FROM $checked WHERE id = $id";
$query = mysqli_query($db, $sql);
$result = mysqli_fetch_row($query);
?>
<style>
    .backImg {
        display: none;
    }
</style>
<div class="main-sell">
    <form action="backend/update.php" method="GET" class="form_update form-sell">
        <input type="hidden" name="table_name" value="<?php echo $checked ?>">
        <fieldset class="update_fields">
            <legend>Update or Delete</legend>
            <?php
            for ($i = 0; $i < mysqli_num_fields($query); $i++) {
                $field_info = mysqli_fetch_field($query);

                echo "<label class='lbl_update'>{$field_info->name}</label>";
                echo "<textarea class='input_update' name='$field_info->name' title='$result[$i]' value='$result[$i]'>$result[$i]</textarea>";
            }
            ?>
            <br>
            <hr>
            <input type="submit" name="update" value="Update" class="btn-save" /><br>
            <input onclick="window.history.go(-1); return false;" type="submit" value="Cancel" class="btn-reset" style="margin-top: 10px;" />
            <input type="submit" name="delete" value="Delete" class="btn-reset" onclick="return confirmation();" style="margin-top: 10px;" />

        </fieldset>
    </form>
</div>
<script>
    function confirmation() {
        var r = confirm("Do you really want to delete?");
        if (r == true) {
            window.location = "backend/update.php";
            return true;
        } else {
            window.history.go(1);
            return false;
        }
    }
</script>
<?php require 'partials/bottom.php'; ?>