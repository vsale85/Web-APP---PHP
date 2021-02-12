<?php if (isset($_SESSION['note'])) : ?>
    <img src="Images/success.png" alt="success" class="done">
    <?php unset($_SESSION['note']); ?>
<?php endif ?>
<script>
    $(".done").show();
    setTimeout(function() {
        $(".done").hide();
    }, 5000);
</script>