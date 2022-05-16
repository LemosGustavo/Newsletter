<?php

function lm($val) {
	log_message('error', print_r($val, TRUE));
}

function lq($val) {
	log_message('error', $val->db->getLastQuery());
}
