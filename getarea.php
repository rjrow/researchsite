<?php
    $value=$_POST ["arealist"];

	$newdb = new wpdb($DB_USER, $DB_PASS, $DB_NAME, $DB_HOST);
	$fetch_state_name = $newdb->get_results('SELECT DISTINCT state_name FROM state_rankings_t ORDER BY state_name ASC;');

	echo '<select name = "arealist" class = "arealist">';

	if(!empty($fetch_state_name)) :
    /** Loop through the $results and add each as a dropdown option */
    	$options = '';
    	$options.= sprintf("\t".'<option value="noselect"></option>'."\n");
    	$options.= sprintf("\t".'<option value="Statewide">Statewide</option>'."\n");
    	foreach($fetch_state_name as $result) :
        	$options.= sprintf("\t".'<option value="%1$s">%1$s</option>'."\n", $result->state_name);
    	endforeach;
    	/** Output the dropdown */
    	echo $options;
	    echo '</select>'."\n\n";
		endif;

?>