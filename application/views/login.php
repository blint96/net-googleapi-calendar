
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Bootply snippet - Bootstrap Bootstrap Login Form</title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Bootstrap Login Form example snippet. An example HTML, JavaScript and CSS code for Bootstrap." />
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">
        
        <style type="text/css">
            .modal-footer {   border-top: 0px; }
        </style>

        <!-- Czcionka -->
        <link href="/external/css/start.css" rel="stylesheet"/>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body  >

      <?php if (!empty($error)): ?>
      <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only"></span>
        <?=$error?>
      </div>
      <?php endif; ?>

      <?php if (!empty($success)): ?>
      <div class="alert alert-success" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only"></span>
        <?=$success?>
      </div>
      <?php endif; ?>
        
        <!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 100px;">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          
          <h1 class="text-center">Panel logowania</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="POST">
            <div class="form-group">
              <input type="email" name="ipt_email" class="form-control input-lg" placeholder="Email" required email>
            </div>
            <div class="form-group">
              <input type="password" name="ipt_pass" class="form-control input-lg" placeholder="Hasło" required>
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Zaloguj</button>
              <span class="pull-left"><a href="/<?=$this->router->fetch_class();?>/register">Zarejestruj się</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
		  </div>	
      </div>
  </div>
  </div>
</div>
        
        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <!-- JavaScript jQuery code from Bootply.com editor  -->
        
        <script type='text/javascript'>
        
        $(document).ready(function() {
        
            
        
        });
        
        </script>
        
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-40413119-1', 'bootply.com');
          ga('send', 'pageview');
        </script>
        
        


        
    </body>
</html>