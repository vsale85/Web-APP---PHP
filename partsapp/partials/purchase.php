<!--//**** php session */  -->
<div class="main-sell">
    <?php require 'partials/success.php' ?>
    <form action="backend/purchase.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Nabavke Vozila</legend>
            <label for="date-buy">Datum kupovine:</label>
            <input type="date" name="date_buy" id="date-buy" value="<?php echo date('Y-m-d'); ?>" min="2000-01-01">
            <label for="model-buy">Model:</label>
            <!-- <select name="model_buy" id="model-buy">
                <option value="W168">W168</option>
                <option value="W169">W169</option>
                <option value="W245">W245</option>
                <option value="other">Ostalo</option>
            </select>  -->
            <input type="text" name="model_buy" id="model-buy">
            <label for="fuel">Vrsta Goriva:</label>
            <select name="fuel" id="fuel">
                <option value="diesel">Dizel</option>
                <option value="petrol">Benzin</option>
                <option value="petrol_gas">Benzin/Gas</option>
            </select>
            <label for="product_year">Godina Proizvodnje:</label>
            <input type="number" name="product_year" id="product_year" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="4" required>
            <label for="side_wheel">Strana Volana:</label>
            <select name="side_wheel" id="side_wheel">
                <option value="left">Levi</option>
                <option value="right">Desni</option>
            </select>
            <label for="seller">Prodavac:</label>
            <input type="text" name="seller" id="seller" maxlength="50" required>
            <label for="price-buy">Cena:</label>
            <input type="number" name="price_buy" id="price-buy" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>


            <label for="note-buy">Napomena:</label>
            <textarea name="note_buy" id="note-buy" placeholder="Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>

<!-- end main-purchase -->