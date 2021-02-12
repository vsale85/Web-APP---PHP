<div class="main-sell">
    <?php require 'partials/success.php' ?>
    <form action="backend/purchase_equipment.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Nabavke Opreme</legend>
            <label for="date-purchase-equipment">Datum servisa:</label>
            <input type="date" name="date_sell" id="date-sell" data-date="" data-date-format="DD-MM-YYYY" value="<?php echo date('Y-m-d'); ?>" class="date_input">
            <label for="model-purchase-equipment">Vrsta Opreme:</label>
            <select name="equipment_type" id="equipment-type-purchase-equipment">
                <option value="W168">Novo</option>
                <option value="W169">Polovno</option>
                <option value="W245">Vulkanizerski pribor</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="title-purchase-equipment">Naziv:</label>
            <input type="text" name="title_purchase_equipment" id="part-purchase-equipment" maxlength="50">
            <label for="quantity-purchase-equipment">Komada:</label>
            <input type="number" name="quantity_purchase_equipment" id="quantity-purchase-equipment" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="supplier-purchase-equipment">Dobavljac:</label>
            <input type="text" name="supplier_purchase_equipment" id="supplier-purchase-equipment">
            <label for="price-purchase-equipment">Cena:</label>
            <input type="number" name="price_purchase_equipment" id="price-purchase-equipment" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="note-purchase-equipment">Napomena:</label>
            <textarea name="note_purchase_equipment" id="note-purchase-equipment" placeholder="Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>
<!-- end main-sell -->