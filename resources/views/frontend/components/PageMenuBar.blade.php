@push('per_page_css')
  <style>
    .PageHeader{
      background-color: #37517e;
    }

    .navbar .megamenu {
      position: static;
    }

    .navbar .megamenu ul {
      margin-top: 5px;
      right: 0;
      padding: 10px;
      display: flex;
    }

    .navbar .megamenu ul li {
      flex: 1;
    }

    .navbar .megamenu ul li a,
    .navbar .megamenu ul li:hover>a {
      color: #013289;
    }

    .navbar .megamenu ul li a:hover,
    .navbar .megamenu ul li .active,
    .navbar .megamenu ul li .active:hover {
      color: #4154f1;
    }

  </style>
@endpush
<section>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top PageHeader">
    <div class="container d-flex align-items-center">
      <a href="{{ route('landing.page') }}" class="logo me-auto"><img id="PageMenuLogo" src="" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('landing.page') }}">Home</a></li>
      

          <li class="dropdown"><a href="#"><span>All Courses</span> <i class="bi bi-chevron-down"></i></a>
            <ul  id="courseCategoryList">
              
            </ul>
          </li>

            <!---- cart ---->
            
            @if(Cookie::get('student-token') !== null)
              <li><a class="nav-link scrollto" href="{{ route('cartPage') }}">Cart</a></li>
              <li><a href="{{url("/student/dashboard")}}"> <i class="linearicons-user"></i> Account</a></li>
              <li><a onclick="LogOut()" class="" href="{{ route('student.logout') }}"> Logout</a></li>
          @else
              <li><a class="" href="{{route("loginPage")}}">Login</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
</section>

@push('per_page_js')
  <script>

    AppSettingsData();
    async function AppSettingsData(){            
        
          let res=await axios.get("/app-settings-data");
          console.log(res.data);
          document.getElementById("PageMenuLogo").src = "{{ asset('assets/images') }}/" + res.data['data']['logo'];
      }
    </script>
 

  <script> 
    Category()
    async function Category(){
        let res=await axios.get("/course-categories");
        $("#courseCategoryList").empty()
        res.data['data'].forEach((item,i)=>{
          let EachItem= `<li><a  href="/course-categories/by-category?id=${item['id']}">${item['name']}</a></li>`
            $("#courseCategoryList").append(EachItem);
        })
    }
  </script>

 
<script>
  async function LogOut() {
           
           localStorage.clear();
           sessionStorage.clear();
                       
           }
</script>


@endpush