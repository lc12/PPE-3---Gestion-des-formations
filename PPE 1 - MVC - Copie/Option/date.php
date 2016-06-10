<?php
function AfficherDateComplete($date)
{
	$phpdate = strtotime( $date );
	return date( 'd-m-Y', $phpdate );
}

function AfficherDateJour($date)
{
	$phpdate = strtotime( $date );
	return date( 'd-m-Y', $phpdate );
}
?>