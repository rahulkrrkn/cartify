   <?php if (isset($_SESSION["CFuserData"]["SNo"])) { ?>

       <li>
           <a href="/cartify/account/logout/">
               <i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span>
           </a>
       </li>

   <?php
    } ?>
   </ul>
   <div id="NavCloseInBlank"></div>
   </section>
   </nav>
   <section data-navbar="popupMessages">
       <!-- Loding Spinner -->
       <div class="loading-overlay" id="loadingOverlay">
           <div class="LodingSpinner" id="LodingSpinner">
               <div class="LodingCircle"></div>
           </div>
           <div class="loading-message">
               <div id="loadingMessage">Loading</div>
               <div id="loadingDot"> <span>&nbsp;&nbsp;.</span><span>&nbsp;.</span><span>&nbsp;.</span><span>&nbsp;.</span></div>
               <!-- <p>  </p> <span>.</span><span>.</span><span>.</span><span>.</span> -->
           </div>
       </div>
       <!-- Corner Popup -->
       <div id="statusPopup" class="popupMessage">
           <span id="popupMessage"></span>
           <div id="progressBar" class="progress-bar"></div>
       </div>
       <!-- Custom Alert -->
       <div id="customAlert" class="alert-overlay">
           <div class="alert-box" id="alertBox">
               <h3 id="alertTitle">Alert</h3>
               <p id="alertMessage">Message</p>
               <button onclick="closeAlert()">OK</button>
           </div>
       </div>
   </section>
   <section id="mainBody">
       <script defer async src="/cartify/assets/js/header.js"></script>
       <script src="/cartify/assets/js/popupMessages.js"></script>
       <script src="/cartify/assets/js/axiosHandler.js"></script>
       <script src="/cartify/assets/js/globalFn.js"></script>

       <?php
        if (isset($_SESSION["CFglobal"]["userIs"]) && $_SESSION["CFglobal"]["userIs"] == "public" || $_SESSION["CFglobal"]["userIs"] == "user") {
        ?>
           <script src="/cartify/assets/js/searchSystem.js"></script>
       <?php
        }
        ?>