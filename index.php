<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CS Timetable App</title>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <script>
        $(function(){
          $('#navHeader').load('navbar.php');
        });
     </script>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f5f5f5;
    }

    section {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 2em;
    }

    .feature {
      text-align: center;
      max-width: 300px;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .feature img {
      width: 80px;
      height: 80px;
    }

    .cta {
      text-align: center;
      background-color: #2ecc71;
      color: #fff;
      padding: 2em;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 10px;
      background-color: #e74c3c;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #c0392b;
    }

    footer {
      background-color: #34495e;
      color: #fff;
      text-align: center;
      padding: 1em;
      margin-bottom:0px;
      left: 0;
      bottom:0;
      position: fixed;
      width: 100%;
    }
  </style>
</head>

<body>
<div id="navHeader"></div>


  <section>
    <div class="feature">
      <h2>Easy Scheduling</h2>
      <p>Create and manage schedules effortlessly.</p>
    </div>

    <div class="feature">
      <h2>Real-time Updates</h2>
      <p>Instant notifications for timetable changes.</p>
    </div>

    <div class="feature">
      <h2>Quick Search</h2>
      <p>Powerful search functionality for classes and events.</p>
    </div>
  </section>

  <section class="cta">
    <h2>Get Started Today</h2>
  </section>

  <footer>
    <p>&copy; 2024 CS Timetable App. All rights reserved.</p>
  </footer>

  <script src="main.js"></script>
</body>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section');
    sections.forEach(function (section) {
      section.style.opacity = 0;

      setTimeout(function () {
        section.style.opacity = 1;
        section.style.transition = 'opacity 1s';
      }, 500);
    });
  });
</script>

</html>
