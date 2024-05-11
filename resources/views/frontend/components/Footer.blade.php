



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <img id="FooterLogo" src="" alt=""> <br/>
           
              <strong>Location: </strong><span id="Location"></span><br>
              <strong>Phone: </strong><span id="Mobile"></span><br>
              <strong>Email: </strong><span id="Email"></span><br>
            
          </div>
 
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('landing.page') }}">Home</a></li>
          
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/policy?type=WebDesign">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/policy?type=WebDevelopment">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/policy?type=ProductManagement">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/policy?type=Marketing">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/policy?type=GraphicDesign">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>We are here</p>
            <div class="social-links mt-3">
              <a id="twitter"  class="twitter"><i class="bx bxl-twitter"></i></a>
              <a id="facebook"  class="facebook"><i class="bx bxl-facebook"></i></a>
              <a id="instagram"  class="instagram"><i class="bx bxl-instagram"></i></a>
              <a id="linkedin"  class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span><script>document.write(new Date().getFullYear())</script> &copy;</span></strong> All Rights Reserved
      </div>
      <div class="credits">       
       
      </div>
    </div>
  </footer><!-- End Footer -->
  
  
  @push('per_page_js')

  
  <script>

    AppSettingsData();
    async function AppSettingsData(){            
        
          let res=await axios.get("/app-settings-data");
          console.log(res.data);   
      
          document.getElementById("Location").innerHTML= res.data['data']['location'];
          document.getElementById("Email").innerHTML= res.data['data']['email'];
          document.getElementById("Mobile").innerHTML= res.data['data']['mobile'];
          document.getElementById("twitter").href= res.data['data']['twitter'];
          document.getElementById("facebook").href= res.data['data']['facebook'];
          document.getElementById("instagram").href= res.data['data']['instagram'];
         document.getElementById("linkedin").href= res.data['data']['linkedin'];
        
          document.getElementById("FooterLogo").src = "{{ asset('assets/images') }}/" + res.data['data']['logo'];
      }
    </script>

@endpush