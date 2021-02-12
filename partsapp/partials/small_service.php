<div class="main-sell">
    <?php require 'partials/success.php' ?>
    <form action="backend/smallService.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Malog Servisa</legend>
            <label for="date-small-service">Datum servisa:</label>
            <input type="text" name="date_small_service" id="date-small-service" value="<?php echo date('d-m-Y'); ?>" maxlength="10" required>
            <label for="model-small-service">Model:</label>
            <select name="model_small_service" id="model-small-service">
                <option value="W168">W168</option>
                <option value="W169">W169</option>
                <option value="W245">W245</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="customer-small-service">Klijent:</label>
            <input type="text" name="customer_small_service" id="customer-small-service" required>
            <label for="car-small-service">Vozilo:</label>
            <input type="text" name="car_small_service" id="car-small-service" required>
            <label for="status-small-service">Status prodaje:</label>
            <select name="status_small_service" id="status-small-service">
                <option value="paid">Placeno</option>
                <option value="not_paid">Nije Placeno</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="price-brt-small-service">Cena bruto:</label>
            <input type="number" name="price_brt_small_service" id="price-brt-small-service" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="price-net-small-service">Cena neto:</label>
            <input type="number" name="price_net_small_service" id="price-net-small-service" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>

            <label for="small-service-checkbox">Zamenjeno:</label>
            <div class="small-service-checkbox" id="small-service-checkbox">
                <label for="small-service-oil"><input type="checkbox" name="changed_filters[]" value="Oil filter" id="small-service-oil" role="button"><span class="checkmark"></span>Filter Ulja</label>
                <label for="small-service-fuel"><input type="checkbox" name="changed_filters[]" value="Fuel filter" id="small-service-fuel" role="button"><span class="checkmark"></span>Filter Goriva</label>
                <label for="small-service-air"><input type="checkbox" name="changed_filters[]" value="Air filter" id="small-service-air" role="button"><span class="checkmark"></span>Filter Vazduha</label>
                <label for="small-service-cabine"><input type="checkbox" name="changed_filters[]" value="Cabine filter" id="small-service-cabine" role="button"><span class="checkmark"></span>Filter Kabine</label>
            </div>
            <label for="small-service-oil-type" id="service-label">Ulje:
                <select name="small_service_oil_type" id="small-service-oil-type">
                    <option value="10w40">10w40</option>
                    <option value="5w40">5w40</option>
                    <option value="other">Ostalo</option>
                </select>
                <input type="number" name="small_service_oil_liter" step=".01" placeholder="** Litara **" style="margin: 0; width: 50%;" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="4" required>
            </label>
            <label for="small-service-km-on">Kilometraza:</label>
            <input type="number" name="small_service_km_on" id="small-service-km-on" placeholder="** km on service **" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="small-service-km-to">Sledeca zamena:</label>
            <input type="number" name="small_service_km_to" id="small-service-km-to" placeholder="** km next service **" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="note-small-service">Napomena:</label>
            <textarea name="note_small_service" id="note-small-service" placeholder=" Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>
<!-- end main-sell -->