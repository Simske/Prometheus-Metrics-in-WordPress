<?php

namespace WP_Prometheus_Metrics\metrics;


class Database_Size_Metric extends Abstract_Metric {

	public function __construct() {
		parent::__construct( 'wp_db_size', 'gauge', 'db_size' );
	}

	function get_metric_value() {
		global $wpdb;
		$size = $wpdb->get_var( "SELECT SUM(ROUND(((data_length + index_length) / 1024 / 1024), 2)) as value FROM information_schema.TABLES WHERE table_schema = '" . DB_NAME . "'" ); // phpcs:ignore WordPress.DB

		return $size;
	}

	function get_help_text(): string {
		return _x( 'Total DB size in MB', 'Metric Help Text', 'prometheus-metrics-for-wp' );
	}
}
