<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="home.css">
  <title>My Home Page</title>
</head>
<body>
<header>
  <h2>Welcome to</h2>
  <h1>My Home Page</h1>
  <hr/>
</header>
<nav>
  <ul>
    <li><a href="assignments.html">CS 313 Assignments</a></li>
    <li><a href="http://www.byui.edu/">BYU&#8209;Idaho</a></li>
    <li><a href="https://byui.instructure.com/">I&#8209;Learn</a></li>
  </ul>
  <hr>
</nav>
<article>
  <img src="me.jpg" alt="photo of me"/>
  <h3>About Me</h3>
  <p>I am a researcher, logical minded, and service oriented. I am a husband to a beautiful, pink haired woman, and a
    father to two smart and silly girls. I have lived in many places. My desire in working is to help others through my
    technical abilities. Specifically I feel like I can help people the most with machine learning and AI. One of my
    strengths is in communicating with others and deescalating situations. I am looking forward to continuing my
    education and furthering my abilities to serve others.</p>
</article>
<br><br><p>Server time is:
<?php
echo date("m/d/Y h:i:sa")
?>
</p>
</body>
</html>