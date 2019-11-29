<?php

/*
Template Name: Insert
*/

?>
<?php
/**

 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crater-free
 */

get_header();


if (isset( $_POST['submit'] ) ){
die();
         global $wpdb;
         // $tablename = $wpdb->prefix.'wp_register';

        $wpdb->insert( 'wp_register', array(
            'name' => $_POST['name'], 
            'post' => $_POST['post']),
            array( '%s', '%s') 
        );
    }

// global $wpdb;
// if ($_POST['insert']) {
//    global $wpdb;
//          $tablename = $wpdb->prefix.'wp_register';

//            $wpdb->insert( $tablename, array(
//             'name' => $_POST['name'],
//             'mob' => $_POST['mob']),
//            array( '%s', '%s'));
  
   
//         echo "<script> alert('data inserted')</script>";
//       // } else{
//       //   echo "<script> alert('not inserted')</script>";
//       // }
// }
// $sql= $wpdb->insert('wp_register',array('mob'=>$mob,'name'=>$name),array('%s','%s'));

    
 ?>
	<div id="main" class="site-main" role="main">
		<div class="content-inner">
			<div id="blog-section">
			    <div class="container">
			        <div class="row">
			        	<div id="form">
    <form method="POST">
        <fieldset>
            <h4>Contact Me!</h4>
            <label for="name">Name:</label>
                <input type="text" name="name" id="name"/>
                <label for="mob"/>mob:</label>
                <input type="mob" name="mob" id="mob"/>
                <fieldset>
                <input class="btn" type="submit" name="submit"  class="submit" value="Submit"/>
                <input class="btn" type="reset" value="Reset"/>
                </fieldset>
        </fieldset>
    </form>
</div>

			        </div>
			    </div>
			</div>
		</div>
	</div>


<?php

get_footer();
