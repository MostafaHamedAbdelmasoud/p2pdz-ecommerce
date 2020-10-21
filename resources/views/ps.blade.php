<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>scroll</title>

  <style>

    body{
      
    }
    #container {
      position: relative;
      height: 100vh;
      overflow: hidden;
    }

    #container p {
      margin: 0;
      border-top: 1px solid #DDD;
      height: 50px;
      line-height: 50px;
    }



    .ps-container>.ps-scrollbar-x-rail,
    .ps-container>.ps-scrollbar-y-rail {
      opacity: 0.6 !important;
    }


    .ps-container > .ps-scrollbar-x-rail > .ps-scrollbar-x {
      transition: .2s linear left;
      /* maybe other vendor-prefixed transitions */
    }
    .ps-container > .ps-scrollbar-y-rail > .ps-scrollbar-y {
      transition: .2s linear top;
      /* maybe other vendor-prefixed transitions */
    }


  </style>

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css">

</head>

<body>




  <div id="container" class="my-custom-scrollbar">
   
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>

  <script>
    const demo = document.querySelector('#container');
    const ps = new PerfectScrollbar(demo);
   
    demo.addEventListener('ps-y-reach-end', function(){
      console.log('hi');
    });

  </script>

</body>

</html>