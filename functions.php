<?php
/*
==========================================================
ATTENTION!! THIS FILE IS LEFT BLANK SO YOU CAN BUILD IN
YOUR OWN CUSTOM FUNCTIONALITY. YOU CAN USE THE CODE IN
'sample-functions.php' AS A GUIDE TO BUILD YOUR OWN.
==========================================================
*/

function demoshop_remove_actions()
{
remove_action( 'jbst_header', 'jbst_main_navbar', 50 );
remove_action( 'jbst_header', 'jbst_top_content_wrapper', 60 );
remove_action( 'jbst_before_content_page','jbst_open_content_wrappers ', 10 );
remove_action( 'jbst_after_content_page','jbst_close_content_wrappers ', 10 );
remove_action( 'jbst_footer', 'jbst_right_sidebar', 9 );
remove_action( 'jbst_footer', 'jbst_bottom_content_wrapper', 20 );
remove_action( 'jbst_footer', 'jbst_footer_area', 30 );
}


add_action('init','demoshop_remove_actions');
add_action( 'wp_enqueue_scripts', 'demo_shop_stylesheets', 99 );
add_action( 'wp_enqueue_scripts', 'demo_shop_javascripts', 99 );

function demo_shop_stylesheets()
{

    if(!is_admin())wp_register_style ( 'superfish', get_bloginfo('stylesheet_directory') . '/superfish-master/css/superfish.css' );
    wp_enqueue_style ( 'superfish');
    if(!is_admin())wp_register_style ( 'superfish-vertical', get_bloginfo('stylesheet_directory') . '/superfish-master/css/superfish-vertical.css' );
    wp_enqueue_style ( 'superfish-vertical');
    if(!is_admin())wp_register_style ( 'custom', get_bloginfo('stylesheet_directory') . '/styles/custom.css',array('superfish'));
    wp_enqueue_style ( 'custom');
}

function demo_shop_javascripts()
{
	wp_register_script('hoverintent', get_bloginfo('stylesheet_directory').'/superfish-master/js/hoverIntent.js', array('jquery'));
	wp_register_script('superfish', get_bloginfo('stylesheet_directory').'/superfish-master/js/superfish.js', array('hoverintent'));
	wp_register_script('initsuperfish', get_bloginfo('stylesheet_directory').'/js/initsf.js', array('superfish'));
	if(!is_admin()) wp_enqueue_script('hoverintent');
	if(!is_admin()) wp_enqueue_script('superfish');
	if(!is_admin()) wp_enqueue_script('initsuperfish');
}	


function demoshop_head_open()
{
	/* write stucture */
?>	


    <div class="container" id="headercontainer">
    <div class="row" id="header">
		<div class="col-sm-2"><img src="<?php echo get_bloginfo('stylesheet_directory')?>/images/logo.png" id="logo"></div>
		<div class="col-sm-10">
		<h1>Your webshop</h1>
		<h2>About your products</h2>
		</div>		
	</div>
	</div>
	<div class="container" id="pagewrapper">
		
<div class="row" id="sidebar">
			
<div class="col-sm-3 col-md-3 col-lg-2">
<?php
demoshop_navbar();
?>
</div>	
			

			
<div class="col-sm-9 col-md-9 col-lg-10 allround" id="maincontent">
	<div class="pull-right">
		<?php
		jbst_cart_dropdown();
		jbst_account_dropdown();
		?>
    </div>
    
<?php
}
add_action( 'jbst_header','demoshop_head_open',60);


function demoshop_foot_close()
{
?>
</div>
			</div>
			
			
		</div>	
		
	</div>	
    <div class="container">
    <div class="row" id="footer">
    <div class="col-sm-7">
		Demo Shop, steet address 13th 506668 New York, USA
	</div>
	<div class="col-sm-5">
		&copy; 2013 Company name /
		<a href="#">Disclaimer</a>
		/
		<a href="#">Privacy Policy</a>

	</div>	
    </div>
    </div>	
<?php
}   
add_action( 'jbst_footer','demoshop_foot_close',1);

function demoshop_navbar()
{
?>
<div class="navbar navbar-default" role="navigation">
  <div class="navbar-header">

    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
   </div>
   
    <br><br>
    <!-- Place everything within .navbar-collapse to hide it until above 768px -->
    <div class="collapse navbar-collapse navbar-responsive-collapse">
            
				<?php jbst_main_nav('sf-menu sf-vertical sf-js-enabled'); // Adjust using Menus in Wordpress Admin ?>
				
    </div><!-- /.nav-collapse -->
  
</div><!-- /.navbar -->

<?php
}
add_filter('jbst_navbar_menu_class',function(){ return 'sf-menu sf-vertical sf-js-enabled'; });

function tsa() {
global $jbst_layout; $jbst_layout = 'full-width'; 
}
add_action( 'jbst_before','tsa' );
	 	
