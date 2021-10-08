<?php 
class LittleCalendar{
	// DateTime
	protected $monthToUse;
	protected $prepared = false;
	protected $days = [];

	public function __construct($month, $year) {
		// Build a DateTime for the month we're going to dsiplay
		$this->monthToUse = DateTime::createFormForm('Y-m|', sprint("%04d-%02d", $year, $month));
		$this->prepare();
	}

	protected function prepare(){
		// Build up an array of information about each day
// in the month including appropriate padding at the
// beginning and end
// First, days of the week across the first row
		foreach(array('Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa')as $dow){
			$endOfRow = ($dow == 'Sa');
			$this->day[] = ['type' => 'dow', 'label' => $dow, 'endOfRow' => $endOfRow];
		}
	}
}

?>