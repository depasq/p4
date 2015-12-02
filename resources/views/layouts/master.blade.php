<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="favicon-rocket.ico">
  <title>
     @yield('title',"Chandra Peer Review")
  </title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css" type='text/css'>
  <link rel="stylesheet" href="css/side-menu.css" type='text/css'>
  <link rel="stylesheet" href="css/p3.css" type='text/css'>
    @yield('head')
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
        @yield('content')
    </section>

   </div>

    <script src="js/ui.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

  </div>
</body>

</html>
