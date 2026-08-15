<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<title>
@yield('title','Admin Form')
</title>



<link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">


<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<link rel="stylesheet"
href="{{ asset('css/admin-create.css') }}">



</head>




<body>



<div class="background">

<div class="blur one"></div>

<div class="blur two"></div>

<div class="blur three"></div>

</div>






<div class="container py-5">





<div class="d-flex justify-content-between align-items-center mb-4">


<h2 class="font-weight-bold">


@yield('title')


</h2>





<button id="theme-toggle"

class="btn btn-light shadow">


<i class="bi bi-moon-stars-fill"></i>


</button>



</div>







@yield('content')







</div>








<script>


document.addEventListener("DOMContentLoaded", function(){



// ==========================
// DARK MODE
// ==========================


const body = document.body;

const toggle = document.getElementById("theme-toggle");



if(toggle){


const icon = toggle.querySelector("i");



if(localStorage.getItem("theme") === "dark"){


body.classList.add("dark");


icon.className="bi bi-sun-fill";


}





toggle.addEventListener("click",function(){



body.classList.toggle("dark");



if(body.classList.contains("dark")){


localStorage.setItem("theme","dark");


icon.className="bi bi-sun-fill";


}

else{


localStorage.setItem("theme","light");


icon.className="bi bi-moon-stars-fill";


}



});



}




});



</script>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>


</html>