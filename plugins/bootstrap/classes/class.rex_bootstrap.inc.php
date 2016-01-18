<?php

class rex_bootstrap extends rexponsive {

	var $section = false;
	var $section_open ='<section>';
	var $section_close ='</section>';

	var $container = false;
	var $container_open ='<div class="container">';
	var $container_close ='</div>';

	var $row = false;
	var $row_open ='<div class="row">';
	var $row_close ='</div>';

	var $col;
	var $col_open;
	var $col_close ='</div>';


	var $sel_column;
	var $sel_offset = 0;
	var $select_rex_array;


/*
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Project name</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
*/



	public function getREXponsiveBoostrapNavbar($navbar_brand, $navclasses) {
		global $REX;

		if(!empty($navclasses))
		{
			$output = array();
			$navclass_out = '';
			foreach($navclasses as $navclass)
			{
				$navclass_out .= $navclass .' ';
			}

			$output[] = '<nav class="'.trim($navclass_out).'">';
			$output[] = '<div class="container">';


			$output[] = '<div class="navbar-header">';
			$output[] = '<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">';
			$output[] = '<span class="sr-only">Toggle navigation</span>';
            $output[] = '<span class="icon-bar"></span>';
            $output[] = '<span class="icon-bar"></span>';
            $output[] = '<span class="icon-bar"></span>';
            $output[] = '</button>';



            if($navbar_brand != '')
            {

	            $supported_image = array('gif','jpg','jpeg','png');
	            $ext = pathinfo($navbar_brand, PATHINFO_EXTENSION);

	            $output[] = '<a href="'.$REX['SERVER'].'" class="navbar-brand">';
            	if(in_array($ext, $supported_image) && file_exists('files/'.$navbar_brand))
				{
					$output[] = '<img src="'.seo42::getMediaFile($navbar_brand).'" alt="" class="navbar-logo-image" />';
            	} else {
	            	# Kein Bild.
	            	$output[] = $navbar_brand;
            	}
            	$output[] = '</a>';
            }
			$output[] = '</div>';


			$output[] = '<div class="collapse navbar-collapse" id="navbar">';
			$nav = new nav42();
			$nav->setLevelDepth(2);
			$nav->setUlClass("nav navbar-nav navbar-right", 0);
			$output[] = $nav->getNavigationByLevel(0);
			$output[] = '</div>';


			$output[] = '</div>';
			$output[] = '</nav>';

			echo join("\n", $output);
		}

	}





	public function getREXponsiveBoostrapStart() {
		global $REX;


		if($this->sel_offset > 0)
			$REX['REXPONSIVE']['COLUMNS'] = $REX['REXPONSIVE']['COLUMNS'] - $this->sel_offset;



		if ($REX['REXPONSIVE']['COLUMNS'] - $this->sel_column < 0) {
			# $this->first = true;
			$out_close = '';
			$out_open = '';

			# close
			if($this->row OR $this->container OR $this->section)
				$out_close .= $this->row_close . $this->container_close . $this->section_close;

			if($this->row OR $this->container OR $this->section)
				$out_open .= $this->section_open . $this->container_open . $this->row_open;

			echo $out_close . $out_open;

			$REX['REXPONSIVE']['COLUMNS'] = 12 - $this->sel_column;
		} else {

			$REX['REXPONSIVE']['COLUMNS'] = $REX['REXPONSIVE']['COLUMNS'] - $this->sel_column;
		}

		if(!isset($REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid])){
			$this->cur  = OOArticleSlice::getArticleSliceById($this->slice_id);

			# open section
			if($this->section)
				echo $this->section_open;

			# open container
			if($this->container)
				echo $this->container_open;

			# open row
			if($this->row)
				echo $this->row_open;


		} else {
			$this->cur = $REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid];
			# mach nix
		}

	}






	public function getREXponsiveBoostrapEnd() {
		global $REX;

		$this->next = $this->cur->getNextSlice();

		if(!is_object($this->next))
		{
			unset($REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid]);
			unset($REX['REXPONSIVE']['COLUMNS']);
			unset($this->sel_column);

			# close row
			if($this->row)
				echo $this->row_close;

			# close container
			if($this->container)
				echo $this->container_close;

			# close section
			if($this->section)
				echo $this->section_close;

		} else {
			$REX['REXPONSIVE']['WRAPPER-CTRL'][$this->mid] = $this->next;

		}
	}







	public function setRexBootstrapSection($section, $id, $class) {
		if($section){
			$this->section = $section;

			$this->section_open = '<section';

			if($id != '')
				$this->section_open .= ' id="'.$id.'"';

			if(!empty($class)){
				$classes = '';
				foreach($class as $c)
				{
					$classes .= $c.' ';
				}
				$this->section_open .= ' class="'.trim($classes).'"';
			}

			$this->section_open .= '>';
		} else {
			$this->section_open = '';
			$this->section_close = '';
		}
	}






	public function setRexBootstrapContainer($container, $id, $class = array() ) {
		if($container){
			$this->container = $container;

			$this->container_open = '<div';

			if($id != '')
				$this->container_open .= ' id="'.$id.'"';

			if(!empty($class)){
				$classes = '';
				foreach($class as $c)
				{
					$classes .= $c.' ';
				}
				$this->container_open .= ' class="'.trim($classes).'"';
			}

			$this->container_open .= '>';
		} else {
			$this->container_open = '';
			$this->container_close = '';
		}
	}







	public function setRexBootstrapRow($row, $id, $class = array()) {
		if($row){
			$this->row = $row;

			$this->row_open = '<div';

			if($id != '')
				$this->row_open .= ' id="'.$id.'"';

			if(!empty($class)){
				$classes = '';
				foreach($class as $c)
				{
					$classes .= $c.' ';
				}
				$this->row_open .= ' class="'.trim($classes).'"';
			}

			$this->row_open .= '>';
		}  else {
			$this->row_open = '';
			$this->row_close = '';
		}
	}






	public function setRexBootstrapColumnOutput($output) {
		# <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		# <div class="col-md-4 col-md-offset-4">

		global $REX;

		if(!empty($output) OR $output != '')
		{
			$out = '';
			$out .= '<div class="col-xs-12 col-sm-'.$this->sel_column;

			# col-sm-offset-2
			if($this->sel_offset > 0) {
				$out .= " col-sm-offset-".$this->sel_offset;
			}
			$out .= '">';


			# Ausgabe
			if(is_array($output))
			{
				$out .= join("\n", $output);
			} else {
				$out .= $output;
			}

			$out .= '</div>';
			echo $out;

		}
	}





	public function setSelectRexValueArray($select_rex_array) {

		if(is_array($select_rex_array) && !empty($select_rex_array))
		{
			# bis small
			if($select_rex_array[1] != '' && $select_rex_array[1] > 0)
				$this->sel_column = $select_rex_array[1];

			# offset
			if($select_rex_array[2] != '' && $select_rex_array[2] > 0)
				$this->sel_offset = $select_rex_array[2];

		}
	}

}
