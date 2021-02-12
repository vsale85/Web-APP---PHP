<div class="main-sell">
    <?php require 'partials/success.php' ?>

    <form action="backend/sell.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Prodatog Dela</legend>
            <label for="date-sell">Datum prodaje:</label>
            <input type="date" name="date_sell" id="date-sell" value="<?php echo date('Y-m-d'); ?>" min="2000-01-01">

            <label for="part-sell">Naziv Artikla:</label>
            <input type="text" name="part_sell" id="part-sell" required>
            <label for="price-sell">Cena:</label>
            <input type="number" name="price_sell" id="price-sell" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="model-sell">Model:</label>
            <!-- <select name="model_sell" id="model-sell">
                <option value="W168">W168</option>
                <option value="W169">W169</option>
                <option value="W245">W245</option>
                <option value="other">Ostalo</option>
            </select>  -->
            <input type="text" name="model_sell" id="model-sell">
            <label for="status-sell">Status prodaje:</label>
            <select name="status_sell" id="status-sell">
                <option value="paid">Placeno</option>
                <option value="not_paid">Nije Placeno</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="note-sell">Napomena:</label>
            <textarea name="note_sell" id="note-sell" maxlength="1000" placeholder="Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>
<!-- end main-sell -->
<script>
    $(document).ready(function() {
        $('.date').datepicker();
        $('.date').on('change', function() {
            var index = $('.date').index(this);
            $('.date:eq(' + index + ')').val();

        });
    });
</script>