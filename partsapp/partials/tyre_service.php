<div class="main-sell">
    <?php require 'partials/success.php' ?>
    <form action="backend/tyre_service.db.php" method="post" class="form-sell">
        <fieldset>
            <legend>Unos Vulkanizerskih Usluga</legend>
            <label for="date-tyre-service">Datum servisa:</label>
            <input type="text" name="date_tyre_service" id="date-tyre-service" value="<?php echo date('d-m-Y'); ?>" maxlength="10" required>
            <label for="size-R">Velicina(R):</label>
            <select name="size_R" id="size-R">
                <?php
                for ($i = 13; $i <= 24; $i++) {

                    if ($i == 15) {
                        echo "<option selected='selected'>R$i</option>";
                    } else {
                        echo "<option>R$i</option>";
                    }
                }
                ?>
            </select>
            <label for="quantity">Komada:</label>
            <select name="quantity" id="quantity">
                <?php
                for ($i = 1; $i <= 8; $i++) {

                    if ($i == 2) {
                        echo "<option selected>$i</option>";
                    } else {
                        echo "<option>$i</option>";
                    }
                }
                ?>
            </select>
            <label for="type-of-service">Vrsta Usluge:</label>
            <select name="type_of_service" id="type-of-service">
                <option value="paid">Montaza</option>
                <option value="not_paid">Demontaza</option>
                <option value="other">Balans</option>
                <option value="paid" selected>Montaza+Demontaza</option>
                <option value="not_paid">Komplet</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="customer-tyre-service">Klijent:</label>
            <input type="text" name="customer_tyre_service" id="customer-tyre-service">
            <label for="vehicle-tyre-service">Vozilo:</label>
            <input type="text" name="vehicle_tyre_service" id="vehicle-tyre-service">
            <label for="status-tyre-service">Status prodaje:</label>
            <select name="status_tyre_service" id="status-tyre-service">
                <option value="paid">Placeno</option>
                <option value="not_paid">Nije Placeno</option>
                <option value="other">Ostalo</option>
            </select>
            <label for="price-tyre-service">Cena:</label>
            <input type="number" name="price_tyre_service" id="price-tyre-service" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" required>
            <label for="note-tyre-service">Napomena:</label>
            <textarea name="note_tyre_service" id="note-tyre-service" placeholder="Unesite Napomenu..."></textarea><br>
            <input type="submit" value="Sacuvaj" class="btn-save"><br>
            <input type="reset" value="Ponisti" class="btn-reset">
        </fieldset>
    </form>
</div>
<!-- end main-sell -->