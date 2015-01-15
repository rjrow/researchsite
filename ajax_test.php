<<<<<<< HEAD
<?php

//add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
add_action( 'wp_ajax_nopriv_example_ajax_request', 'example_ajax_request' );
wp_enqueue_script('jquery');

 function example_ajax_request() {
=======
<?php function example_ajax_request() {
>>>>>>> bd44105d585bec7c20cce613984b550581ebdf42

	    // The $_REQUEST contains all the data sent via ajax
	    if ( isset($_REQUEST) ) {
	     
<<<<<<< HEAD
	     	
=======
>>>>>>> bd44105d585bec7c20cce613984b550581ebdf42
	        $fruit = $_REQUEST['fruit'];
	        echo $fruit;
	         
	        // Let's take the data that was sent and do something with it
	        if ( $fruit == 'Banana' ) {
	            $fruit = 'Apple';
	        }
	     
	        // Now we'll return it to the javascript function
	        // Anything outputted will be returned in the response
<<<<<<< HEAD
	        echo $fruit;
	         
	        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
	        // print_r($_REQUEST);
	     
	    }

	   	     
   	} 

	
=======
	        echo 'apple';
	         
	        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
	        print_r($_REQUEST);
	     
	    }

	    echo 'apple';
	     
   	} 

	add_action( 'wp_ajax_example_ajax_request', 'example_ajax_request' );
>>>>>>> bd44105d585bec7c20cce613984b550581ebdf42
?>