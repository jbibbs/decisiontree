<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Vroom-Yetton-Jago Decision Model</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/skeleton.css') }}
	{{ HTML::style('css/custom.css') }}

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <header>
  	<div class="container"><h2>Vroom-Jago Decision Model</h2></div>
    <div id="headlow">
        <div class="container">
          <p style="border-bottom: 1px solid #fff; padding-bottom: 12px;">No one leadership style or decision making process fits all situations. By analyzing the situation and evaluating the problem based on time, team buy-in, and decision quality, a conclusion about which style best fits the situation can be made. This model defines a very logical approach to which style to adopt when trying to balance the benefits of participative management with the need to make decisions effectively.</p>
          <p>This is a useful model in new situations, or in ones which have unusual characteristics. Using it, you'll quickly get an feel for the right approach to use in more usual circumstances.
        </p>
        </div>
    </div>
  </header>

    <div class="container">
      <div class="row">
        <div class="one.column column" style="margin-top: 4%">
          @yield('content')
        </div>
      </div>
    </div>

  <footer>

  </footer>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>