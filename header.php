<body>
<header class="header">
               <div class="container">
   
                   <nav class="navbar navbar-expand-lg navbar-dark" >
                       <div class="container-fluid">
                         <a class="navbar-brand" href="#">
                           <img src="images\wht logo.png" alt="" width="220" height="80">
                         </a>
                         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                         </button>
                         <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                             <li class="nav-item">
                               <a class="nav-link act" aria-current="page" href="./index.php">Home</a>
                             </li>
                             
                             <li class="nav-item">
                               <a class="nav-link" aria-current="page" href="./gallery.php">Gallery</a>
                             </li>
                           
                             <li class="nav-item">
                               <a class="nav-link" aria-current="page" href="./packages.php">Packages</a>
                             </li>
                           </li>
                             <li class="nav-item">
                               <a class="nav-link" href="./pages/About Malcolm.html">About Malcolm</a>
                             </li>
                             <li class="nav-item">
                               <a class="nav-link" href="#">Contact Us</a>
                             </li>
                             <li class="nav-item">
                               <a class="nav-link" href="#">Book Malcolm</a>
                             </li>
                             <?php
                        if(isset($_POST["btn_login"])){
                            echo "<script>
                            location.replace('login.php');
                            </script>";
                        }

                      ?>
                        <form action="" method="post">
                        <button class="btn_login-popup" href="login_page.html" name="btn_login">Login</button>
                        </form>
                      
                        
                           
                           </ul>
                         
                         </div>
                       </div>
                     </nav>
   
                   <!--nav bar ends here-->
              
               <div class="middle">
                    <h1 class="text-white  display-3 justify-content-center">Capturing Lasting Memories</h1>                    
                </div>
                </div>
        </header>







      </body>
</html>