<?php


class rexponsive {

	var $open;
	var $close;

	var $cur;
	var $next = null;
	var $next_slice_id = null;
	var $slice_id = null;
	var $slice_status;

	var $mid = 'rexponsive-modul'; # UNIQUE MODUL IDENTIFIER
	var $first = false;

	var $sel_column;
	var $select_rex_array;






	# ModulEingabe mit mForm
	public function getRexponsiveSelectBox($name, $rex_value) {

		$sel_columns = array_merge(array(0=>"Spaltenanzahl"), range(1,12));

		$mform = new mform();
		$mform->addSelectField($rex_value);
		$mform->addOptions($sel_columns);
		$mform->setSize(1);
		$mform->setLabel($name);

		# Ausgabe Selectbox
		echo $mform->show_mform();

	}






	public function getREXponsiveWrapperStart() {
		global $REX;

		if ($REX['REXPONSIVE']['COLUMNS'] - $this->sel_column < 0) {
			$this->first = true;
			$REX['REXPONSIVE']['COLUMNS'] = 12 - $this->sel_column;
		} else {
			$REX['REXPONSIVE']['COLUMNS'] = $REX['REXPONSIVE']['COLUMNS'] - $this->sel_column;
		}

		if(!isset($REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid])){
			$this->cur  = OOArticleSlice::getArticleSliceById($this->slice_id);
			# ES WIRD GEÖFFNET
		} else {
			$this->cur = $REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid];
			# MACH NIX
		}
	}







	public function setCurrentSlice($modul_slice_id) {
		$this->slice_id = $modul_slice_id;
	}

	public function getNextSlice() {
		if(is_object($this->next))
		{
			$this->next_slice_id = $this->next->getId();

			return $this->next_slice_id;
		}
	}






	public function getREXponsiveWrapperEnd() {
		global $REX;

		$this->next = $this->cur->getNextSlice();

		if(!is_object($this->next))
		{
			# MACH ZU!!!
			unset($REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid]);
			unset($REX['REXPONSIVE']['COLUMNS']);
			unset($this->sel_column);
		} else {
			$REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid] = $this->next;

			if($this->first)
			{
				# MACH ZU!!! UND WIEDER AUF!!
			}
		}
	}






	public function getREXponsiveContentOutput($output) {
		global $REX;

		if(!empty($output) OR $output != '')
		{
			$out = '';

			if(is_array($output))
			{
				$out .= join("\n", $output);
			} else {
				$out .= trim($output);
			}

			echo $out;
		}
	}






	public function getInfoFreeColumnsBefore() {
		global $REX;

		$info_grids_before = $REX['REXPONSIVE']['COLUMNS'] != '' ? $REX['REXPONSIVE']['COLUMNS'] : 12;

		if($REX['REDAXO'])
			echo rex_info('Freie Spalten in dieser Zeile zur Verfügung <u>vor</u> diesem Block: '.$info_grids_before);
	}






	public function getInfoFreeColumnsNext() {
		global $REX;

		if($REX['REDAXO'])
		{
			if($this->sel_column > 0 AND $REX['REXPONSIVE']['COLUMNS'] != 0)
			{
				echo rex_info('Freie Spalten in dieser Zeile zur Verfügung <u>nach</u> diesem Block: '.$REX['REXPONSIVE']['COLUMNS']);
			} else {
				echo rex_info('Freie Spalten in dieser Zeile zur Verfügung <u>nach</u> diesem Block: 12');
			}
		}
	}






	public function setSelectRexValueArray($select_rex_array) {

		if(is_array($select_rex_array) && !empty($select_rex_array))
		{
			# large
			if($select_rex_array[1] != '' && $select_rex_array[1] > 0)
				$this->sel_column = $select_rex_array[1];


			/*

			# large
			if($select_rex_array[1] != '' && $select_rex_array[1] > 0)
				$this->sel_column = $select_rex_array[1];

			# medium
			if($select_rex_array[2] != '' && $select_rex_array[2] > 0)
				$this->sel_value_medium = $select_rex_array[2];

			# small
			if($select_rex_array[3] != '' && $select_rex_array[3] > 0)
				$this->sel_value_small = $select_rex_array[3];

			# xtra small
			if($select_rex_array[4] != '' && $select_rex_array[4] > 0)
			{
				$this->sel_value_xsmall = $select_rex_array[4];
			} else {
				$this->sel_value_xsmall = 12;
			}
			*/

		}
	}


	public function getSelectRexValueArray() {
		return $this->select_rex_array;
	}


	public function setREXponsiveWrapperOpen($open) {
		$this->open = $open;
	}

	public function getREXponsiveWrapperOpen() {
		return $this->open;
	}

	public function setREXponsiveWrapperClose($close) {
		$this->close = $close;
	}

	public function getREXponsiveWrapperClose() {
		return $this->close;
	}

}


?>