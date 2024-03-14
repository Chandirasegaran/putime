<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap CSS -->

  <style>
    .scroll-btn {
      position: fixed;
      padding: 10px;
      border: none;
      border-radius: 50%;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      z-index: 99;
    }

    .scroll-btn i {
      font-size: 24px;
    }

    .scroll-btn.hidden {
      display: none;
    }

    #moveToTopBtn {
      bottom: 20px;
      right: 20px;
    }

    #moveToBottomBtn {
      bottom: 70px;
      right: 20px;
    }
  </style>
</head>
<body>
  <button id="moveToTopBtn" class="scroll-btn hidden" onclick="moveToTop()"><i class="fas fa-arrow-up"></i></button>
  <button id="moveToBottomBtn" class="scroll-btn hidden" onclick="moveToBottom()"><i class="fas fa-arrow-down"></i></button>

  <script>
    function moveToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function moveToBottom() {
      window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      var topButton = document.getElementById("moveToTopBtn");
      var bottomButton = document.getElementById("moveToBottomBtn");

      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        topButton.classList.remove("hidden");
      } else {
        topButton.classList.add("hidden");
      }

      if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 20) {
        bottomButton.classList.add("hidden");
      } else {
        bottomButton.classList.remove("hidden");
      }
    }
  </script>
</body>
