<?php $page_title='Welcome'; include 'header.php'; ?>
<section class="hero-slider" id="homeSlider">
  <div class="slide active" style="background-image:url('choir-group.jpg')"><div class="hero-overlay"></div><div class="container hero-content"><div class="eyebrow">Welcome to our church family</div><h1>Growing in faith. Serving in love.</h1><p>Welcome to St. Andrew’s Anglican Church, Sauka. Come worship with us, encounter God’s presence and grow together as one family.</p><a class="btn" href="about.php">Discover Our Church</a><a class="btn alt" href="contact.php">Plan Your Visit</a></div></div>
  <div class="slide" style="background-image:url('choir-procession.jpg')"><div class="hero-overlay"></div><div class="container hero-content"><div class="eyebrow">Worship • Fellowship • Service</div><h1>A church family rooted in Christ.</h1><p>There is a place for you at St. Andrew’s. Worship, learn, serve and grow with us.</p><a class="btn" href="gallery.php">Explore Our Gallery</a><a class="btn alt" href="contact.php">Visit Us</a></div></div>
  <div class="slide" style="background-image:url('congregation.jpg')"><div class="hero-overlay"></div><div class="container hero-content"><div class="eyebrow">Together as one family</div><h1>Faith that brings us together.</h1><p>Join a welcoming community where prayer, the Word of God and Christian fellowship are at the heart of our life together.</p><a class="btn" href="about.php">Learn More</a><a class="btn alt" href="signup.php">Join Online</a></div></div>
  <div class="slide" style="background-image:url('group-outdoor.jpg')"><div class="hero-overlay"></div><div class="container hero-content"><div class="eyebrow">Presence of God</div><h1>Come and experience His presence.</h1><p>From worship services to community activities, we seek to glorify God in everything we do.</p><a class="btn" href="sermons.php">Sermons & Messages</a><a class="btn alt" href="contact.php">Contact Us</a></div></div>
  <button class="slider-arrow prev" onclick="changeSlide(-1)" aria-label="Previous slide">‹</button><button class="slider-arrow next" onclick="changeSlide(1)" aria-label="Next slide">›</button>
  <div class="slider-dots" id="sliderDots"><button class="dot active" onclick="goToSlide(0)"></button><button class="dot" onclick="goToSlide(1)"></button><button class="dot" onclick="goToSlide(2)"></button><button class="dot" onclick="goToSlide(3)"></button></div>
</section>
<section class="section"><div class="container"><div class="section-head"><div class="eyebrow">A place to belong</div><h2>Faith, fellowship and service</h2><p>We are a Christ-centred community committed to worship, the Word, prayer and loving service to our neighbours.</p></div><div class="cards"><div class="card"><div class="icon">✝</div><h3>Worship</h3><p>Join us for reverent worship, praise and the teaching of God’s Word every week.</p></div><div class="card"><div class="icon">⌂</div><h3>Fellowship</h3><p>Build meaningful relationships with a warm church family across generations.</p></div><div class="card"><div class="icon">♡</div><h3>Service</h3><p>Discover opportunities to use your gifts and make a difference in our community.</p></div></div></div></section>
<section class="section alt-bg"><div class="container"><div class="section-head"><div class="eyebrow">Join us</div><h2>Weekly church schedule</h2></div><div class="schedule"><div class="item"><strong>Sunday</strong><br>Holy Communion / Worship<br><b>8:00 AM</b></div><div class="item"><strong>Monday</strong><br>Bible Study<br><b>6:00 PM</b></div><div class="item"><strong>Tuesday</strong><br>Choir Practice<br><b>6:00 PM</b></div><div class="item"><strong>Wednesday</strong><br>Mid-week Service<br><b>6:00 PM</b></div><div class="item"><strong>Friday</strong><br>Band Practice<br><b>6:00 PM</b></div><div class="item"><strong>Saturday</strong><br>PCC Meeting — 4:00 PM<br>Choir Practice — 6:00 PM</div></div></div></section>
<?php
/* Family Harvest ticker: update the family_harvest table each week. */
$harvest_family = 'Family Harvest family to be announced';
$harvest_date = date('Y-m-d', strtotime('next Sunday'));
if (isset($conn)) {
    $today_sql = date('Y-m-d');
    $harvest_result = @mysql_query("SELECT family_name, harvest_date FROM family_harvest WHERE harvest_date >= '" . mysql_real_escape_string($today_sql) . "' ORDER BY harvest_date ASC LIMIT 1", $conn);
    if ($harvest_result && mysql_num_rows($harvest_result) > 0) {
        $harvest_row = mysql_fetch_assoc($harvest_result);
        $harvest_family = $harvest_row['family_name'];
        $harvest_date = $harvest_row['harvest_date'];
    }
}
$harvest_date_label = date('l, j F', strtotime($harvest_date));
?>
<section class="section programs-section" id="programs">
  <div class="container">
    <div class="section-head">
      <div class="eyebrow">Church programmes</div>
      <h2>Programs &amp; Activities</h2>
      <p>Stay connected with the regular programs and special moments happening at St. Andrew’s Anglican Church.</p>
    </div>
    <div class="cards program-cards">
      <div class="card program-card">
        <div class="icon">🌾</div>
        <h3>Family Harvest</h3>
        <p>Our Family Harvest is celebrated every Sunday as we give thanks to God and celebrate families in our church.</p>
        <strong>Every Sunday • 8:00 AM</strong>
      </div>
      <div class="card program-card">
        <div class="icon">🙏</div>
        <h3>Harvest &amp; Thanksgiving</h3>
        <p>Special harvest and thanksgiving programs bring the church together in gratitude, worship and fellowship.</p>
        <strong>See church announcements</strong>
      </div>
      <div class="card program-card">
        <div class="icon">✝</div>
        <h3>Worship &amp; Fellowship</h3>
        <p>From worship services to Bible study and choir activities, there is always an opportunity to grow and serve.</p>
        <strong>Join us this week</strong>
      </div>
    </div>

    <div class="harvest-ticker-wrap" aria-label="Upcoming Family Harvest">
      <div class="harvest-ticker-label">UPCOMING FAMILY HARVEST</div>
      <div class="harvest-ticker-window">
        <div class="harvest-ticker-track">
          <span>🌾 <b><?php echo htmlspecialchars($harvest_family, ENT_QUOTES, 'UTF-8'); ?></b> — Family Harvest, <?php echo htmlspecialchars($harvest_date_label, ENT_QUOTES, 'UTF-8'); ?> at 8:00 AM</span>
          <span>✝ Join us for thanksgiving, worship and family fellowship at St. Andrew’s Anglican Church, Sauka, Kuje-Abuja.</span>
          <span>🌾 <b><?php echo htmlspecialchars($harvest_family, ENT_QUOTES, 'UTF-8'); ?></b> — Family Harvest, <?php echo htmlspecialchars($harvest_date_label, ENT_QUOTES, 'UTF-8'); ?> at 8:00 AM</span>
          <span>✝ Join us for thanksgiving, worship and family fellowship at St. Andrew’s Anglican Church, Sauka, Kuje-Abuja.</span>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section"><div class="container"><div class="two-col"><img src="minister.jpg" alt="Church ministry"><div><div class="eyebrow">Our heart</div><h2 class="section-title">“Let everything that has breath praise the Lord.”</h2><p class="quote">Psalm 150:6</p><p>Whether you are visiting for the first time or returning home, there is a place for you at St. Andrew’s. We invite you to worship, learn and serve with us.</p><a class="btn" href="gallery.php">View Church Gallery</a></div></div></div></section>
<section class="section alt-bg"><div class="container"><div class="section-head"><div class="eyebrow">Stay connected</div><h2>Join our online church family</h2><p>Create an account to stay connected with St. Andrew’s and access future members-only resources.</p><a class="btn" href="signup.php">Create an Account</a> <a class="btn outline-dark" href="login.php">Member Login</a></div></div></section>
<?php include 'footer.php'; ?>
