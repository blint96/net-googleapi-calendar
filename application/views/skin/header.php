<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?php if($title): ?>
        <title><?=$title;?></title>
        <?php else: ?>
        <title>Domyślny tytuł</title>
        <?php endif;?>

        <link href="/external/css/bootstrap.css" rel="stylesheet"/>
        <link href="/external/css/start.css" rel="stylesheet"/>

    </head>
    <body>
        <!-- navbar-start -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Test</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?=($this->uri->segment(2)==='index' || $this->uri->segment(2) == FALSE)?'active':''?>"><a href="/<?=$this->router->fetch_class();?>/index">Strona główna</a></li>
                        <li class="<?=($this->uri->segment(2)==='calendar')?'active':''?>"><a href="/<?=$this->router->fetch_class();?>/calendar">Kalendarz</a></li>
                        <li class="<?=($this->uri->segment(2) === 'login' || $this->uri->segment(2) ==='register' || $this->uri->segment(2)==='user' || $this->uri->segment(2) === 'register')?'active':''?>"><a href="/<?=$this->router->fetch_class();?>/user">Użytkownik</a></li>
                        <li class="<?=($this->uri->segment(2) === 'calendar7')?'active':''?>"><a href="/<?=$this->router->fetch_class();?>/calendar7">Kalendarz tygodniowy</a></li>
                        <?php if($logged):?>
                        <li class="<?=($this->uri->segment(2)==='logout' || $this->uri->segment(2) == FALSE)?'active':''?>"><a href="/<?=$this->router->fetch_class();?>/logout">Wyloguj się</a></li>
                        <?php endif;?>
                        <li><a><?php echo $mail; ?></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>