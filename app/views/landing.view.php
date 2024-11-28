<!DOCTYPE html>
<html lang="en">

<<<<<<< HEAD
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/landing.css?v=1.1" />
  <title>Well Be</title>
</head>
=======
        <ul class="nav__links">
         <li class="link"><a href="#home">Home</a></li>
          <li class="link"><a href="#about">About Us</a></li>
          <li class="link"><a href="#service">Services</a></li>
          <li class="link"><a href="#pages">Pages</a></li>
          <li class="link"><a href="#blog">Blog</a></li>
          <li class="login-dropdown link dropdown">
            <a class="appointment-btn" id="loginButton">Login</a>
            <div class="dropdown-content" id="dropdownMenu">
                <p>Login as</p>
                <form method="post">
                    <a href="<?=ROOT?>/login" data-type="doctor" class="loginFilter">Doctor</a>
                    <a href="<?=ROOT?>/login" data-type="patient" class="loginFilter">Patient</a>
                </form>
            </div>
          </li>
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b

<body>
  <header>
    <nav class="section__container nav__container">
      <div class="nav__logo"><img src="<?= ROOT ?>/assets/images/logo (1).png" />WELL BE</div>

      <ul class="nav__links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#about">About Us</a></li>
        <li class="link"><a href="#service">Services</a></li>
        <li class="link"><a href="#pages">Pages</a></li>
        <li class="link"><a href="#blog">Blog</a></li>
        <li class="link dropdown">
          <a class="appointment-btn" id="loginButton">Login</a>
          <div class="dropdown-content" id="dropdownMenu">
            <p>Login as</p>
            <form method="post">
              <a href="<?= ROOT ?>/login" data-type="doctor" class="loginFilter">Doctor</a>
              <a href="<?= ROOT ?>/login" data-type="patient" class="loginFilter">Patient</a>
              <a href="<?= ROOT ?>/login" data-type="pharmacy" class="loginFilter">Pharmacy</a>
              <a href="<?= ROOT ?>/login" data-type="lab" class="loginFilter">Lab</a>
              <a href="<?= ROOT ?>/login" data-type="admin" class="loginFilter">Admin</a>
            </form>
          </div>
        </li>

      </ul>

    </nav>
    <div class="section__container header__container" id="home">
      <div class="header__content">
        <h1>Providing an Exceptional Patient Experience</h1>
        <p>
          Welcome, where exceptional patient experiences are our priority.
          With compassionate care, state-of-the-art facilities, and a
          patient-centered approach, we're dedicated to your well-being. Trust
          us with your health and experience the difference.
        </p>
        <button class="btn" onclick="window.location.href='login'">Book Appointment</button>
      </div>
      <div class="header__form">
        <form>
          <h4 class="blinking-text">Contact Us</h4>

          <h3 class="form__btn">011 234 6879</h3>
        </form>
      </div>
    </div>
  </header>

  <section class="section__container service__container" id="service">
    <div class="service__header">
      <div class="service__header__content">
        <h2 class="section__header">Our Special service</h2>
        <p>
          Beyond simply providing medical care, our commitment lies in
          delivering unparalleled service tailored to your unique needs.
        </p>
      </div>
    </div>
    <div class="service__grid">
      <div class="service__card">
        <span><i class="ri-microscope-line"></i></span>
        <h4>Laboratory Test</h4>
        <p>
          Accurate Diagnostics, Swift Results: Experience top-notch Laboratory
          Testing at our facility.
        </p>
        <a href="#">Learn More</a>
      </div>
      <div class="service__card">
        <span><i class="ri-microscope-line"></i></span>
        <h4>Laboratory Test</h4>
        <p>
          Accurate Diagnostics, Swift Results: Experience top-notch Laboratory
          Testing at our facility.
        </p>
        <a href="#">Learn More</a>
      </div>
      <div class="service__card">
        <span><i class="ri-microscope-line"></i></span>
        <h4>Laboratory Test</h4>
        <p>
          Accurate Diagnostics, Swift Results: Experience top-notch Laboratory
          Testing at our facility.
        </p>
        <a href="#">Learn More</a>
      </div>
      <div class="service__card">
        <span><i class="ri-microscope-line"></i></span>
        <h4>Laboratory Test</h4>
        <p>
          Accurate Diagnostics, Swift Results: Experience top-notch Laboratory
          Testing at our facility.
        </p>
        <a href="#">Learn More</a>
      </div>
      <div class="service__card">
        <span><i class="ri-mental-health-line"></i></span>
        <h4>Health Check</h4>
        <p>
          Our thorough assessments and expert evaluations help you stay
          proactive about your health.
        </p>
        <a href="#">Learn More</a>
      </div>
      <div class="service__card">
        <span><i class="ri-hospital-line"></i></span>
        <h4>General Dentistry</h4>
        <p>
          Experience comprehensive oral care with Dentistry. Trust us to keep
          your smile healthy and bright.
        </p>
        <a href="#">Learn More</a>
      </div>
    </div>
  </section>
  <section class="section__container about__container" id="about">
    <div class="about__content">
      <h2 class="section__header">About Us</h2>
      <p>
        Welcome to our healthcare website, your one-stop destination for
        reliable and comprehensive health care information. We are committed
        to promoting wellness and providing valuable resources to empower you
        on your health journey.
      </p>
      <p>
        Explore our extensive collection of expertly written articles and
        guides covering a wide range of health topics. From understanding
        common medical conditions to tips for maintaining a healthy lifestyle,
        our content is designed to educate, inspire, and support you in making
        informed choices for your health.
      </p>
      <p>
        Discover practical health tips and lifestyle advice to optimize your
        physical and mental well-being. We believe that small changes can lead
        to significant improvements in your quality of life, and we're here to
        guide you on your path to a healthier and happier you.
      </p>
    </div>
    <div class="about__image">
      <img src="<?= ROOT ?>/assets/images/about.jpg" alt="about" />
    </div>
  </section>

  <section class="section__container why__container" id="blog">
    <div class="why__image">
      <img src="<?= ROOT ?>/assets/images/choose-us.jpg" alt="why choose us" />
    </div>
    <div class="why__content">
      <h2 class="section__header">Why Choose Us</h2>
      <p>
        With a steadfast commitment to your well-being, our team of highly
        trained healthcare professionals ensures that you receive nothing
        short of exceptional patient experiences.
      </p>
      <div class="why__grid">
        <span><i class="ri-hand-heart-line"></i></span>
        <div>
          <h4>Intensive Care</h4>
          <p>
            Our Intensive Care Unit is equipped with advanced technology and
            staffed by team of professionals
          </p>
        </div>
        <span><i class="ri-truck-line"></i></span>
        <div>
          <h4>Free Ambulance Car</h4>
          <p>
            A compassionate initiative to prioritize your health and
            well-being without any financial burden.
          </p>
        </div>
        <span><i class="ri-hospital-line"></i></span>
        <div>
          <h4>Medical and Surgical</h4>
          <p>
            Our Medical and Surgical services offer advanced healthcare
            solutions to address medical needs.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="section__container doctors__container" id="pages">
    <div class="doctors__header">
      <div class="doctors__header__content">
        <h2 class="section__header">Our Special Doctors</h2>
        <p>
          We take pride in our exceptional team of doctors, each a specialist
          in their respective fields.
        </p>
      </div>
      <div class="doctors__nav">

      </div>
    </div>
    <div class="doctors__grid">
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-1.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. Emily Smith</h4>
        <p>Cardiologist</p>
      </div>
<<<<<<< HEAD
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-2.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. James Anderson</h4>
        <p>Neurosurgeon</p>
      </div>
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-3.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. James Anderson</h4>
        <p>Neurosurgeon</p>
      </div>
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-1.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. James Anderson</h4>
        <p>Neurosurgeon</p>
      </div>
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-2.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. James Anderson</h4>
        <p>Neurosurgeon</p>
      </div>
      <div class="doctors__card">
        <div class="doctors__card__image">
          <img src="<?= ROOT ?>/assets/images/doctor-3.jpg" alt="doctor" />
          <div class="doctors__socials">
            <span><i class="ri-instagram-line"></i></span>
            <span><i class="ri-facebook-fill"></i></span>
            <span><i class="ri-heart-fill"></i></span>
            <span><i class="ri-twitter-fill"></i></span>
          </div>
        </div>
        <h4>Dr. Michael Lee</h4>
        <p>Dermatologist</p>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="footer__logo"><img src="<?= ROOT ?>/assets/images/logo (1).png" /></div>
        <p>
          We are honored to be a part of your healthcare journey and committed
          to delivering compassionate, personalized, and top-notch care every
          step of the way.
        </p>
        <p>
          Trust us with your health, and let us work together to achieve the
          best possible outcomes for you and your loved ones.
        </p>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <p>Home</p>
        <p>About Us</p>
        <p>Work With Us</p>
        <p>Our Blog</p>
        <p>Terms & Conditions</p>
      </div>
      <div class="footer__col">
        <h4>Services</h4>
        <p>Search Terms</p>
        <p>Advance Search</p>
        <p>Privacy Policy</p>
        <p>Suppliers</p>
        <p>Our Stores</p>
      </div>
      <div class="footer__col">
        <h4>Contact Us</h4>
        <p>
          <i class="ri-map-pin-2-fill"></i> 123, London Bridge Street, London
        </p>
        <p><i class="ri-mail-fill"></i> support@care.com</p>
        <p><i class="ri-phone-fill"></i> (+012) 3456 789</p>
      </div>
    </div>
    <div class="footer__bar">
      <div class="footer__bar__content">
        <p>Copyright © 2024 Well Be. All rights reserved.</p>
        <div class="footer__socials">
          <span><i class="ri-instagram-line"></i></span>
          <span><i class="ri-facebook-fill"></i></span>
          <span><i class="ri-heart-fill"></i></span>
          <span><i class="ri-twitter-fill"></i></span>
        </div>
      </div>
    </div>
  </footer>
  <script>
    var navLinks = document.getElementById("navLinks");

    function showMenu() {
      navLinks.style.right = "0";
    }

    function hideMenu() {
      navLinks.style.right = "-300px";
    }
=======
    </footer>
    <script>

        var navLinks = document.getElementById("navLinks");

        function showMenu(){
            navLinks.style.right = "0";
        }

        function hideMenu(){
                navLinks.style.right = "-300px";  
        }

        document.addEventListener('DOMContentLoaded', () => {
          const loginButton = document.getElementById('loginButton');
          const dropdownMenu = document.getElementById('dropdownMenu');
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b

    const loginButton = document.getElementById('loginButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    loginButton.addEventListener('click', (event) => {
      event.preventDefault(); // Prevents the default action of the link
      dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Optional: Click outside to close the dropdown
    document.addEventListener('click', (event) => {
      if (!loginButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.style.display = 'none';
      }
    });

    const loginOptions = document.querySelectorAll(".loginFilter");

    loginOptions.forEach(option => {
      option.addEventListener("click", function() {

        event.preventDefault();

        // Get the user type from data attribute
        const userType = option.getAttribute("data-type");

        // Send the user type to PHP via AJAX
        fetch('Ajax.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'user_type=' + encodeURIComponent(userType),
          })
          .then(response => response.text())
          .then(data => {
            console.log("User type saved in session:", data);
            // Redirect or take other action if needed
            window.location.href = option.href;
          });
      });
    });
  </script>

<<<<<<< HEAD
</body>

</html>
=======
          // Optional: Click outside to close the dropdown
          document.addEventListener('click', (event) => {
            if (!loginButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
              dropdownMenu.style.display = 'none';
            }
          });
        });

        const loginOptions = document.querySelectorAll(".loginFilter");

              loginOptions.forEach(option => {
                  option.addEventListener("click", function () {

                      event.preventDefault();

                      // Get the user type from data attribute
                      const userType = option.getAttribute("data-type");

                      // Send the user type to PHP via AJAX
                      fetch('Ajax.php', {
                          method: 'POST',
                          headers: {
                              'Content-Type': 'application/x-www-form-urlencoded',
                          },
                          body: 'user_type=' + encodeURIComponent(userType),
                      })
                      .then(response => response.text())
                      .then(data => {
                          console.log("User type saved in session:", data);
                          // Redirect or take other action if needed
                          window.location.href = option.href;
                      });
                  });
              });

</script>

  </body>
</html>
>>>>>>> b6af62eac9dd3f336fdb2e84d1ebe651ffdafe6b
