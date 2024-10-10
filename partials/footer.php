<div class="row footer">
        <div class="col-md-3">
            <div class="footer-widget aboutfooter">
                <h2 class="mb-4 text-success font-secondary">About</h2>
                <ul class="list-unstyled ">
                    <li class="mb-2"><a href="about"><h5 class="text-success">About Us</h5></a>
                    </li>
                    <li class="mb-2"><a href="careers"><h5 class="text-success">Career</h5></a>
                    </li>
                    <li class="mb-2"><a href="blog"><h5 class="text-success">Blog</h5></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="footer-widget helpfooter">
                <h2 class="mb-4 text-success font-secondary">Help</h2>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="contact"><h5 class="text-success">Contact Us</h5></a>
                    </li>
                    <li class="mb-2"><a href="faq"><h5 class="text-success">FAQs</h5></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3">
            <div class="socials">
                <a href="#"> <img  class="d-block w-100" src="assets/images/instagram.png" alt="instagram"> </a> <br><br>
                <a href="#"> <img  class="d-block w-100" src="assets/images/twitter.png" alt="twitter"> </a> <br><br>
                <a href="#"> <img  class="d-block w-100" src="assets/images/facebook.png" alt="facebook"> </a>
        </div>
        </div>
        <div class="col-md-3">
            <div class="newsletter">
                <h2 class="text-success">Subscribe to our newsletter</h2>
               
                <input type="email" name="Email" placeholder="example@email.com" class="text-control"><br><br>

                <button class="btn bg-success text-light" type="button">SUBSCRIBE</button>
            </div>
        </div>
        
    </div>
    <div class="row bg-success">
        <div class="copyright">
            copyright &copy 2024 SoccerScoutAfrica
        </div>
    </div>
  </div>

  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery-3.7.1.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script> -->

  <!-- <script src="js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="jquery.min.js"></script> -->
   

    
        <script>
         $(function(){
  $("#search_position").submit(function(event){
    event.preventDefault();
    var position = $("#position").val();
    var data = {
     position : position
    }

   $("#ajaxsearch").load("process/search_process.php",data);
   

  });
})


</script>
   
</body>
</html>