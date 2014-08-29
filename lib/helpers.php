<?php
/**
 * Helper functions
 */

// == Create a simple hash based on a file checksum 

function version_hash($file) {
	if(!$file) return false;
	$full_path = get_template_directory() . $file;
	return hash_file('CRC32',$full_path);
}