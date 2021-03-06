<?php
class TestCleanReport extends WP_UnitTestCase {

	private $wpephpc;

	public function setUp() {
		$root_dir = realpath( __DIR__ . '/../../' );

		$this->wpephpc = new \WPEPHPCompat( $root_dir );
	}

	public function test_clean_report_time() {
		$report = "Time: 323\n";

		$output = $this->wpephpc->clean_report( $report );
		$this->assertEquals( '', $output );
	}

	public function test_clean_report_newlines() {
		$report = "\n\n\n\n";

		$output = $this->wpephpc->clean_report( $report );
		$this->assertEquals( '', $output );
	}

	public function test_clean_report_time_and_newlines() {
		$report = "\n\n\nhello\nTime: 323\n\n\n\n\n";

		$output = $this->wpephpc->clean_report( $report );
		$this->assertEquals( 'hello', $output );
	}
}
