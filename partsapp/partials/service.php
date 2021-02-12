<div class="main-sell">
    <?php require 'partials/success.php' ?>
    <form action="backend/service.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Servisa- Popravke</legend>
            <label for="date-sell">Datum servisa:</label>
            <input type="text" name="date_service" id="date-service" value="<?php echo date('d-m-Y'); ?>" maxlength="10" required>
            <label for="model-service">Model:</label>
            <select name="model_service" id="model-service">
                <option value="W168">W168</option>
                <option value="W169">W169</option>
                <option value="W245">W245</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="customer-service">Klijent:</label>
            <input type="text" name="customer_service" id="customer-service">
            <label for="vehicle-service">Vozilo:</label>
            <input type="text" name="vehicle_service" id="vehicle-service">
            <label for="status-service">Status prodaje:</label>
            <select name="status_service" id="status-service">
                <option value="paid">Placeno</option>
                <option value="not_paid">Nije Placeno</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="price-bruto-service">Cena bruto:</label>
            <input type="number" name="price_bruto_service" id="price-bruto-service" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="price-neto-service">Cena neto:</label>
            <input type="number" name="price_neto_service" id="price-neto-service" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>

            <label for="parts-property">Delovi:</label>
            <div class="service-radio" id="parts-property">
                <label for="service-my-parts"><input type="radio" name="parts_property" value="my parts" id="service-my-parts" role="button"><span class="checkmark"></span>Moji Delovi</label>
                <label for="service-customer-parts"><input type="radio" name="parts_property" value="customer parts" id="service-customer-parts" role="button"><span class="checkmark"></span>Doneo Kupac</label>
                <label for="service-mix-parts"><input type="radio" name="parts_property" value="mix parts" id="service-mix-parts" role="button"><span class="checkmark"></span>MIX</label>
                <label for="service-only"><input type="radio" name="parts_property" value="service only" id="service-only" role="button"><span class="checkmark"></span>Bez Delova</label>
            </div>
            <label for="note-service">Napomena:</label>
            <textarea name="note_service" id="note-service" placeholder="Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>
<!-- end main-sell -->