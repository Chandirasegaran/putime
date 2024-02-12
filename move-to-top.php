<head>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->

<style>
  #moveToTopBtn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 99;
    padding: 10px;
    border: none;
    border-radius: 50%;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }

  #moveToTopBtn i {
    font-size: 24px;
  }

  #moveToTopBtn.hidden {
    display: none;
  }
</style>


</head>
<body>

  <button id="moveToTopBtn" class="hidden" onclick="moveToTop()"><i class="fas fa-arrow-up"></i></button>
  <script>
    function moveToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    window.onscroll = function () { scrollFunction() };
    function scrollFunction() {
      var button = document.getElementById("moveToTopBtn");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.classList.remove("hidden");
      } else {
        button.classList.add("hidden");
      }
    }
  </script>

</body>