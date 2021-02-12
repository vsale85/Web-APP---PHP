 <div class="navigation">
     <img src="Images/newLogo.png" alt="gorano_logo">
     <div class="user_mobile">
         <p>Welcome <span><?php echo $_SESSION['username']; ?></span> !</p>
     </div>
     <label for="navigation" class="responsive-nav" id="hamburger">
         <i class="fas fa-bars" style="font-size:38px;color:white"></i>
     </label>
     <input type="checkbox" name="check" id="navigation" role="button">
     <!-- new search -->
     <a href="search.view.php"><i class="fas fa-search" style="font-size:30px;" id="mobile-search"></i></a>
     <ul id="menu">
         <li class="<?php echo ($page == "Pretraga" ? "active" : "") ?>" id="search-link"><a href="search.view.php">Pretraga</a></li>
         <li class="<?php echo ($page == "Prodaja" ? "active" : "") ?>"><a href="index.php" target="_self">Prodaja Delova</a></li>
         <li class="<?php echo ($page == "Nabavka" ? "active" : "") ?>"><a href="purchase.view.php" target="_self">Nabavka Delova</a></li><br>
         <li><label for="servisi" class="responsive-nav servisi">Servisi</label>
             <input type="checkbox" name="check" id="servisi" role="button">
             <ul id="servisi-list">
                 <li><a href="small_service.view.php">Mali Servis</a></li>
                 <li><a href="service.view.php">Popravka</a></li>
                 <li><a href="tyre_service.view.php">Vulkanizerska Usluga</a></li>
                 <li><a href="purchase_equipment.view.php">Nabavka opreme</a></li>
             </ul>
         </li>
         <li class="<?php echo ($page == "Uputstvo" ? "active" : "") ?>"><a href="manual.view.php" target="_self">Uputstvo</a></li><br>
     </ul>
 </div>
 <script>
     /*** function when hamb is checked-uncheck search, and vice versa, and uncheck onblur */
     $(document).ready(function() {
         $("#mobile-search").click(function() {
             $("#navigation").prop("checked", false);
         });
         $("#hamburger").click(function() {
             $("#search").prop("checked", false);
         });
         $(".main-sell").click(function() {
             $("#navigation").prop("checked", false);

         });
         $(".links").click(function() {
             $("#navigation").prop("checked", false);

         });
         $(".search-conditions").click(function() {
             $("#navigation").prop("checked", false);

         });
     });
 </script>