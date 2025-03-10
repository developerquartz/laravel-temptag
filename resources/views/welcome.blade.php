<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/frontend/images/favicon.png'); }}"/>
    <title>Title</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet"> -->
  </head>
  <body>
    <div id="app">
      <app></app>
    </div>
    <script defer src="{{ mix('js/app.js') }}"></script>
    <!-- <script src="{{ URL::asset('js/app.js') }}"></script> -->
    <script>
      console.log('blade');
      /*current_user=false;
      if(localStorage.getItem('user')){
        current_user=JSON.parse(localStorage.getItem('user'));
        console.log(current_user['roles']['0']['name']);  
      }
      else{
        console.log('not logined');
      }*/
      // $(document).ready(function() {
        // $(document).on("click", ".nav-link", function(){
          /*if ($(this).parent('li').hasClass("menu-is-opening menu-open")) {
            $(this).parent('li').removeClass("menu-is-opening menu-open");
          }
          else{
            $(this).parent('li').addClass("menu-is-opening menu-open"); 
          }*/
          // $(this).parent('li').toggleClass("menu-is-opening menu-open");
          // customjs=true;
          // console.log('nav-link clicked welcome');
        // });

      // });

    </script>
    <!-- <script  src="{{ asset('assets/admin/js/custom.js') }}"></script> -->
    <!-- <script  src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script  src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script> -->

  </body>
</html>