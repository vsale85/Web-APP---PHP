<?php require 'backend/session.php' ?>
<?php require "backend/connection.php"; ?>
<?php $page = 'Pretraga'; ?>
<?php require 'partials/top.php' ?>
<?php require 'partials/success.php' ?>
<?php
error_reporting(error_reporting() & ~E_NOTICE);  // disable php notices
error_reporting(E_ERROR | E_PARSE);              // and warning
if (isset($_GET['search'])) {

    $search_box = $_GET['search_box'];

    if (!isset($_GET['search_condition'])) {
        echo "<style>.result-table{display: none;} </style>
        <h1>Sorry, you must choose condition!</h1>";
    } else {
        $checked = $_GET['search_condition'];
        $search_from = $_GET['search_date_from'];
        $search_to = $_GET['search_date_to'];
        $strict_search = $_GET['strict_search'];
        $semi_strict_search = $_GET['semi_strict_search'];
        $user = $_SESSION['id'];
        $colName = array();     // declare array of table columns
        $sum = 0;
        $sqlOrder = "AND user_id = $user ORDER BY date DESC;";

        $sql1 = "SELECT * FROM $checked WHERE user_id = $user";       // select checked table
        $result1 = mysqli_query($db, $sql1);

        for ($i = 0; $i < mysqli_num_fields($result1); $i++) {
            $field_info = mysqli_fetch_field($result1);     // checking all column names
            $colName[] = $field_info->name;          // and putting names in array
        }
        $removed = array_shift($colName); // removing first (id) column from array and preventing displaying result containing id num
        $removed = array_shift($colName); // removing date column, need explicite sql condition for date in statement
        foreach ($colName as $index => &$col) {     //adding sql condition to col name
            if ($strict_search == 'true') {
                $colName[$index] = $col . " = '$search_box'"; // if strict checked it will search strictly by given string
            } else if ($semi_strict_search == 'true') {
                $colName[$index] = $col . " LIKE '$search_box%'";
            } else {
                $colName[$index] = $col . " LIKE '%$search_box%'";
            }
        }
        if ($search_from != "") {  // if date from not choosen, display from begin all
            $sql = "SELECT * FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date >= '$search_from' AND date <= '$search_to' " . $sqlOrder;
        } else {
            $sql = "SELECT * FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date <= '$search_to' " . $sqlOrder;
        }
        $result = mysqli_query($db, $sql);
        $quantity = mysqli_num_rows($result);

        // count sum of prices from searched conditions
        if ($checked == 'service' || $checked == 'small_service') {
            if ($search_from != "") {  // if date from not choosen, display from begin all
                $sqlSumBruto = "SELECT SUM(price_bruto) as sumPriceBruto FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date >= '$search_from' AND date <= '$search_to' " . $sqlOrder;
                $sqlQty = "SELECT COUNT(*) as quantity FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date >= '$search_from' AND date <= '$search_to' " . $sqlOrder;
            } else {
                $sqlSumBruto = "SELECT SUM(price_bruto) as sumPriceBruto FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date <= '$search_to' " . $sqlOrder;
                $sqlQty = "SELECT SUM(*) as quantity FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date <= '$search_to' " . $sqlOrder;
            }
            $sumBrutoResult = mysqli_query($db, $sqlSumBruto);
            $sumRowBruto = mysqli_fetch_assoc($sumBrutoResult);
            if ($search_from != "") {  // if date from not choosen, display from begin all
                $sqlSumNeto = "SELECT SUM(price_neto) as sumPriceNeto FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date >= '$search_from' AND date <= '$search_to' " . $sqlOrder;
            } else {
                $sqlSumNeto = "SELECT SUM(price_neto) as sumPriceNeto FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date <= '$search_to' " . $sqlOrder;
            }
            $sumNetoResult = mysqli_query($db, $sqlSumNeto);
            $sumRowNeto = mysqli_fetch_assoc($sumNetoResult);
            $sumBrt = $sumRowBruto['sumPriceBruto'];
            $sumNet = $sumRowNeto['sumPriceNeto'];
            $sum = $sumBrt - $sumNet;
        } else {
            if ($search_from != "") {  // if date from not choosen, display from begin all
                $sqlSum = "SELECT SUM(price) as sumPrice FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date >= '$search_from' AND date <= '$search_to' " . $sqlOrder;
            } else {
                $sqlSum = "SELECT SUM(price) as sumPrice FROM $checked WHERE (" . implode(' OR ', $colName) . ") AND date <= '$search_to' " . $sqlOrder;
            }
            $sumResult = mysqli_query($db, $sqlSum);
            $sumRow = mysqli_fetch_assoc($sumResult);
            $sum = $sumRow['sumPrice'];
        }
    }
} else { ///******* end of check is there post method at all */
    echo "<style>.result-table{display: none;} </style>";
}
mysqli_close($db);

?>
<style>
    .backImg {
        display: none;
    }
</style>
<div class="search-main">
    <div class="search-form">
        <form action="" method="GET">
            <label class="search-box">
                <input type="text" name="search_box" placeholder="Type here...">
                <button type="submit" name="search">Go</button>
            </label>
            <br>
            <!-- radio's for search conditions -->
            <div class="search-conditions ">
                <label for="sell-s"><input type="radio" name="search_condition" value="parts" id="sell-s" role="button" checked><span class="checkmark"></span> Prodaja</label>
                <label for="pursh-s"><input type="radio" name="search_condition" value="purchase_parts" id="pursh-s" role="button"><span class="checkmark"></span> Nabavka Delova</label>
                <br>
                <label for="strict_search" style="color: #ff7926;"><input type="checkbox" name="strict_search" value="true" id="strict_search"><span class="check"></span> Striktna pretraga</label>
                <label for="semi_strict_search" style="color: #40ff00;"><input type="checkbox" name="semi_strict_search" value="true" id="semi_strict_search"><span class="check"></span> Pretraga pocinje na rec... </label>
            </div>

            <div class="search-date">
                <label for="search-date-from" class="date-lbl">Datum Od: <input type="date" name="search_date_from" class="input_date" id="search-date-from" min="2000-01-01"></label>

                <label for="search-date-to" class="date-lbl">Datum Do: <input type="date" name="search_date_to" class="input_date" id="search-date-to" value="<?php echo date('Y-m-d'); ?>" min="2000-01-01"></label>
            </div>

        </form>
    </div>
    <div class="result-table">
        <?php
        if (!$result) {
            echo "<h1> No matches</h1>";
        } else {
            $colName = array();

            if ($checked == 'service' || $checked == 'small_service') {
                echo "<div class='sum-lbl'><label for='table-search' class='sum'>Bruto Price: <span>$sumBrt</span></label>
                    <label for='table-search' class='sum'>Neto Price: <span>$sumNet</span></label>
                    <label for='table-search' class='sum' id='sum'>Difference: <span>$sum</span></label></div>
                    <label for='table-search' class='sum' id='sum'>Ukupno komada: <span>$quantity</span></label></div>";
            } else {
                echo "<label for='table-search' id='sum' class='sum'>Sum Price: <span>$sum</span></label>
                <label for='table-search' class='sum' id='sum'>Ukupno komada: <span>$quantity</span></label></div>";
            }
            echo "<table class='table-search' id='table-search'><thead><tr>";

            for ($i = 0; $i < mysqli_num_fields($result); $i++) {
                $field_info = mysqli_fetch_field($result);
                echo "<th class='sticky'>{$field_info->name}</th>";
                $colName[$i] = $field_info->name;  // generating array of headers for td data-label, for responsive th
            }
            echo "</tr></thead>"; // dodato
            echo "<tbody>";   //dodato
            while ($row = mysqli_fetch_row($result)) {

                echo "<tr onclick=\"location.href='row.details.php?id=" . $row[0] . "&amp;table=" . $checked . "'\">";
                $index = 0;  // first index of column name for data-label
                foreach ($row as $_column) {

                    echo "<td data-label='$colName[$index]' title='$_column'>{$_column}</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</tbody></table>";
        }
        ?>
    </div>
</div>
<script>
    $("input").on("change", function() {

        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format(this.getAttribute("data-date-format"))
        )

    }).trigger("change")
</script>

<?php require 'partials/bottom.php'; ?>