<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon-rocket.ico">
  <title>
          P4: Chandra Peer Review
  </title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css" type='text/css'>
  <link rel="stylesheet" href="css/side-menu.css" type='text/css'>
  <link rel="stylesheet" href="css/p4.css" type='text/css'>
</head>

<body>

  <div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
      <!-- Hamburger icon -->
      <span></span>
    </a>

    <div id="menu">
      <div class="pure-menu">
        <a class="pure-menu-heading" href="http://dwa15.jdepasquale.com/">DWA15</a>
        <ul class="pure-menu-list">
          <li class="pure-menu-item"><a href="http://p1.dwa15.jdepasquale.com/" class="pure-menu-link">Project 1</a>
            <ul class="pure-menu-children">
              <li class="pure-menu-item ghub"><a href="https://github.com/depasq/p1" target="_blank" class="pure-menu-link">GitHub</a></li>
            </ul>
          </li>
          <li class="pure-menu-item"><a href="http://p2.dwa15.jdepasquale.com/" class="pure-menu-link">Project 2</a>
            <ul class="pure-menu-children">
              <li class="pure-menu-item ghub"><a href="https://github.com/depasq/p2" target="_blank" class="pure-menu-link">GitHub</a></li>
            </ul>
          </li>
          <li class="pure-menu-item"><a href="http://p3.dwa15.jdepasquale.com/" class="pure-menu-link">Project 3</a>
            <ul class="pure-menu-children">
              <li class="pure-menu-item ghub"><a href="https://github.com/depasq/p3" target="_blank" class="pure-menu-link">GitHub</a></li>
            </ul>
          </li>
          <li class="pure-menu-item"><a href="http://p4.dwa15.jdepasquale.com/" class="pure-menu-link">Project 4</a>
            <ul class="pure-menu-children">
              <li class="pure-menu-item ghub"><a href="https://github.com/depasq/p4" target="_blank" class="pure-menu-link">GitHub</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>

    <div id="main">

    <section>
        {{-- Main page content will be yielded here --}}
          <div class="header">
              <h1>Chandra Peer Review</h1>
          </div>

          <div class="content">
                <p> Each year, scientists from around the world propose for observing time with <a href="chandra.si.edu">NASA’s Chandra
                    X-ray Observatory</a>. These proposals are then reviewed by a team of about one hundred
                    scientists at the annual Chandra Peer Review. Handling the logistics of organizing this
                    meeting is the job of the Chandra Director’s Office. This team currently relies on an
                    existing, PHP-based website that is sorely in need of updating. In an effort to contribute
                    something worthwhile to the Chandra program with my final project, I’m going to begin the
                    process of rewriting the peer review website as a Laravel application. </p>
                    <a href="welcome">Enter Peer Review Site</a>
          </div>
    </section>

   </div>

    <script src="js/ui.js"></script>

  </div>
</body>

</html>
