<?php ?>
<!doctype html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>HDPorno</title>
	
	<link rel="icon" href="favicon.ico" type="image/x-icon"/><link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container clearfix">
			<a href="/" class="logo"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo.png" alt="Логотип"></a>
			<div class="toggle-block right">
          <a href="#" class="toggle-mnu hidden-lg"><span></span></a>
          <span>Все категории</span>
      </div>
		</div>
	</header>
	<nav class="menu clearfix">
    <div class="container">
      <?php wp_nav_menu( array(
        'theme_location'  => 'menu',
        'menu'            => '', 
        'container'       => false, 
        'container_class' => '', 
        'container_id'    => '',
        'menu_class'      => '', 
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
      )); ?>
      
    </div>
	</nav>
	<section class="main-content">
	<main>
    <section class="search-top">
      <div class="container clearfix">
          <ul class="left">
            <li><a href="/">Новинки</a></li>
            <li><a href="http://hd/populyarnye/">Популярное</a></li>
          </ul>
          <form action="/" method="get" class="right">
            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Введите название видео">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
      </div>
    </section>
