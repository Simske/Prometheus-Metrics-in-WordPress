<?php

namespace WP_Prometheus_Metrics\metrics;


class Users_Sessions_Metric extends Abstract_Metric {

	public function __construct() {
		parent::__construct( 'wp_user_sessions', 'gauge', 'user_sessions' );
	}

	function get_metric_value() {
		global $wpdb;

// TODO is this still working?
		return $wpdb->get_var( "SELECT count(*) FROM $wpdb->options WHERE `option_name` LIKE '_wp_session_%'" );
	}

	function get_help_text(): string {
		return _x( 'User sessions', 'Metric Help Text', 'prometheus-metrics-for-wp' );
	}
}
