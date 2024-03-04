<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recta_helper {

	public $key = '8277275987';
	public $port = '1233';
	public $records = "";
	public $html = "";
	public $beforeRawAlign = true;
	public $window_close = true;

	private $tdata = [];
	private $table_text_crop = true;
	private $table_text_margin = 0;
	private $table_cols = 0;
	private $table_max_cols = 0;
	private $table_rows = 0;
	private $table_max_rows = 0;
	private $table_sub_record = array();

	public function __construct($width_paper = 32)
	{
    	$this->ci =& get_instance();
    	$this->records = "printer";
    	$this->width_paper = $width_paper;
    	$this->width_paper_static = $width_paper;
	}

	public function oldPrinter()
	{
		$this->beforeRawAlign = false;
	}

	public function font($type = "B")
	{
		if ($type == "B") {
			$this->width_paper = $this->width_paper_static + 10;
		} else if ($type == "A") {
			$this->width_paper = $this->width_paper_static;
		}
		$this->records .= '.font("'.$type.'")';
		return $this;
	}

	public function text($text = "")
	{
		$this->records .= '.text("'.substr($text,0,$this->width_paper).'")';
		return $this;
	}

	public function hr($m = "-")
	{
		$text = "";
		for ($i=0; $i < $this->width_paper; $i++) {
			$text .= $m[0];
		}
		$this->records .= '.text("'.$text.'")';
		return $this;
	}

	public function align($align = "LEFT")
	{
		$this->records .= '.align("'.$align.'")';
		return $this;
	}

	public function underline($b = false)
	{
		$d = 'true';
		if (!$b) {
			$d = 'false';
		}
		$this->records .= '.underline('.$d.')';
		return $this;
	}

	public function cut($p = true, $l = 4)
	{
		$f = 'true';
		if (!$p) {
			$f = 'false';
		}
		$this->records .= '.cut('.$f.','.$l.')';
		return $this;
	}

	public function barcode($type = "CODABAR", $barcode = "", $barcodeHeight = 5)
	{
		$this->records .= '.barcode('.$type.',"'.$barcode.'",'.$barcodeHeight.')';
		return $this;
	}

	public function feed($n = 4)
	{
		$this->records .= '.feed('.$n.')';
		return $this;
	}

	public function raw($raw = "")
	{
		$this->records .= '.raw("'.$raw.'")';
		return $this;
	}

	public function rprint()
	{
		$this->records .= '.print()';
		return $this;
	}

	public function reset()
	{
		$this->records .= '.reset()';
		return $this;
	}

	public function flush()
	{
		$this->records .= '.flush()';
		return $this;
	}

	public function clearBuffer()
	{
		$this->records .= '.clearBuffer()';
		return $this;
	}

	public function close()
	{
		$this->records .= '.close()';
		return $this;
	}

	public function addCols($col = array(10))
	{
		$this->removeCols();
		$total_width = 0;
		$width_paper = $this->width_paper;
		for ($i=0; $i < count($col); $i++) {
			$width = round(($this->width_paper/100) * $col[$i]*10);
			$this->tdata[$i]['width'] = $width;
			$total_width += $width;
		}
		if ($total_width > $this->width_paper) {
			$count_over = $total_width - $this->width_paper;
			$sisa_co = $count_over;
			for ($i=0; $i < $count_over; $i++) {
				if ($i+1 >= count($col)) {
					$i = 0;
				}
				if ($sisa_co > 0 && !empty($this->tdata[$i]['width'])) {
					$this->tdata[$i]['width'] = $this->tdata[$i]['width'] - 1;
				}
				$sisa_co -= 1;
			}
		}
		if ($total_width < $this->width_paper) {
			$count_less = $this->width_paper - $total_width;
			$sisa_cl = $count_less;
			for ($i=0; $i < $count_less; $i++) {
				if ($i+1 >= count($col)) {
					$i = 0;
				}
				if ($sisa_cl > 0 && !empty($this->tdata[$i]['width'])) {
					$this->tdata[$i]['width'] = $this->tdata[$i]['width']+1;
				}
				$sisa_cl -= 1;
			}
		}
		$this->table_max_cols = count($col);
	}

	public function removeCols()
	{
		$this->tdata = [];
	}

	public function addRecord($no = 1, $text = "", $align = 'LEFT')
	{
		$no = $no - 1;
		if (!empty($this->tdata[$no])) {
			if ($this->table_max_cols == $no+1) {
				$this->table_rows++;
			}
			$margin = "";
			$margin = str_repeat(' ', $this->table_text_margin);
			$width = $this->tdata[$no]['width'];
			$len_text = strlen($text);
			if (($len_text+$this->table_text_margin) < $width) {
			  $space = "";
			  for ($i=0; $i < floor($width-($len_text+$this->table_text_margin)); $i++) {
			    $space .= " ";
			  } 
			  if ($align == 'RIGHT') {
				$text = $space.$text.$margin;
			  } else if ($align == 'LEFT') {
				$text = $margin.$text.$space;
			  } else if ($align == 'CENTER') {
			  	$part_space = (($width-$len_text) + 1) / 2;
			  	$part_space_1 = floor($part_space);
			  	$space_1 = "";
			  	for ($i=0; $i < $part_space_1; $i++) {
			  		$space_1 .= " ";
			  	}
			  	$part_space_2 = ceil($part_space);
			  	$space_2 = "";
			  	for ($i=0; $i<$part_space_2; $i++) {
			  		$space_2 .= " ";
			  	}
				$text = $space_1.$text.$space_2;
			  }
			} else {
			  if ($this->table_text_crop) {
				if ($align == 'RIGHT') {
					$text = substr($text.$margin,0,$width);
				} else if ($align == 'LEFT') {
					$text = substr($margin.$text,0,$width);
				} else {
					$text = substr($text,0,$width);
				}
			  } else {
				if ($align == 'RIGHT') {
					$text = $this->insertAtPosition($text, $margin, $width-$this->table_text_margin);
				  	$this->addOverRecord($len_text, $width, $no+1, $text, $align);
					$text = substr($text,0,$width);
				} else if ($align == 'LEFT') {
					$text = $this->insertAtPositionLeft($text, $margin, $width-$this->table_text_margin);
				  	$this->addOverRecord($len_text, $width, $no+1, $text, $align);
					$text = substr($text,0,$width);
				} else {
				  	$this->addOverRecord($len_text, $width, $no+1, $text, $align);
					$text = substr($text,0,$width);
				}
			  }
			}
			if ($this->beforeRawAlign) {
				$this->records .= '.align("'.$align.'")';
			}
			$this->records .= '.raw("'.$text.'")';
			$this->records .= '.align("LEFT")';
			if ($no+1 == count($this->tdata)) {
				$this->records .= '.text("")';
			}
			$this->addRecordMargin(0);
			return $this;
		} else {
			return $this;
		}
	}

	public function addOverRecord($len_text = 0, $width = 0, $col = 0, $text = "", $align = 'LEFT')
	{
	  	$row_help = 0;
	  	$start = $width;
        for ($i=0; $i < round($len_text/$width); $i++) {
			if ($start > $width) {
		  		$row_help++;
			}
			$text2 = substr($text,$start,$width);
			if (strlen($text2) > 0) {
				$this->table_sub_record[$this->table_rows+$row_help][$col] = array(
					'zrow' => $this->table_rows+$row_help,
					'zcol' => $col,
					'text' => $text2,
					'align' => $align,
				);
			}
            $start += $width;
        }
	}

	private function insertAtPosition($string, $insert, $position) {
	    return implode($insert, str_split($string, $position)).$insert;
	}

	private function insertAtPositionLeft($string, $insert, $position) {
	    return $insert.implode($insert, str_split($string, $position));
	}

	public function showOverRecord()
	{
		$data = $this->table_sub_record;
		if (count($data) > 0) {
			ksort($data);
	        foreach ($data as $key => $value) {
	            ksort($value);
	            for ($i=0; $i < $this->table_max_cols; $i++) {
	                $no = $i+1;
	                $in = 0;
	                foreach ($value as $key2 => $value2) {
	                    if ($key2==$no) {
						  	$this->addRecord($no, $value2['text'], $value2['align']);
	                        $in = 1;
	                    }
	                }
	                if ($in == 0) {
				  		$this->addRecord($no, " ", "LEFT");
	                }
	            }
	        }
		}
		$this->table_sub_record = array();
	}

	public function tableTextCrop($s = true)
	{
		$this->table_text_crop = $s;
	}

	public function addRecordMargin($M = 0)
	{
		$this->table_text_margin = $M;
	}

	public $html_index = [];
	public $html_content = array();

	public function html($html = "")
	{
		//error_reporting(0);
    	$this->html_index = 0;
		$allow_tags = array('p', 'span', '<br>', 'table', 'tr', 'td', 'th');
		$tags = "";
	    foreach ($allow_tags as $key) {
	    	$tags .= "<".$key.">";
	    }
		$html = trim($html);
		$html = strip_tags($html, $tags);
		$html = preg_replace("/\\n/",'=|=', $html);
		$html = str_replace("	", "", $html);
		$exhtml = explode("=|=", $html);
		for ($i=0; $i < count($exhtml); $i++) {
			$this->content_html($exhtml[$i], $allow_tags);
		}
	}

	public $html_table_index = 0;
	public $html_table_cols = 0;
	public $html_table_record = 0;
	public $html_table_allow_Cols = true;

	private function content_html($htmlbr, $tag = array())
	{
    	if (strpos($htmlbr, '<table>') > -1) {
    		$this->html_table_index = $this->html_index;
    		$this->html_index++;
    		$this->html_table_cols = 0;
    		$this->html_table_record = 0;
    	} else if (strpos($htmlbr, '</table>') > -1) {
    		$item = array();
    		$m = 10 % $this->html_table_cols;
    		$f = floor(10 / $this->html_table_cols);
    		for ($i=0; $i < $this->html_table_cols; $i++) {
    			if ($m > 0) {
	    			$item[$i] = $f + $m--;
    			} else {
	    			$item[$i] = $f;
    			}
    		}
    		$this->html_content[$this->html_table_index] = array('i' => $this->html_table_index, 'addCols' => $item);
    		$this->html_table_cols = 0;
    	} else if (strpos($htmlbr, '<tr>') > -1) {
    		if ($this->html_table_cols > 0) {
	    		$this->html_table_allow_Cols = false;
    		}
    	} else if (strpos($htmlbr, '</tr>') > -1) {
    		$this->html_table_record = 0;
    	} else if (strpos($htmlbr, '<td>') > -1) {
    		if ($this->html_table_allow_Cols) {
	    		$this->html_table_cols++;
    		}
    		$this->html_table_record++;
			$content = $this->getTextBetweenTags('td', $htmlbr);
			foreach ($content as $item) {
				$item = array(
					'i' => $this->html_table_cols,
					'text' => $item,
				);
	    		$this->html_content[$this->html_index] = array('i' => $this->html_index, 'addRecord' => $item);
	    		$this->html_index++;
			}
    	} else if (strpos($htmlbr, '<th>') > -1) {
    		if ($this->html_table_allow_Cols) {
	    		$this->html_table_cols++;
    		}
    		$this->html_table_record++;
			$content = $this->getTextBetweenTags('th', $htmlbr);
			foreach ($content as $item) {
				$item = array(
					'i' => $this->html_table_cols,
					'text' => $item,
				);
	    		$this->html_content[$this->html_index] = array('i' => $this->html_index, 'addRecord' => $item);
	    		$this->html_index++;
			}
    	} else {
		    foreach ($tag as $key) {
		    	if (strpos($htmlbr, $key.'>') > 0) {
			      $content = $this->getTextBetweenTags($key, $htmlbr);
			      foreach ($content as $item) {
			        $this->set_html_type($item, $key);
			      }
				}
		    }	
    	}
	}

	public function htmlj()
	{
		sort($this->html_content);
		foreach ($this->html_content as $key) {
			if (!empty($key['text'])) {
				//echo $key['text'].'<br>';
				$this->text($key['text']);
			} else if (!empty($key['raw'])) {
				//echo $key['raw'].'<br>';
				$this->raw($key['raw']);
			} else if (!empty($key['addCols'])) {
				//echo print_r($key['addCols']).'<br>';
				$this->text('');
				$this->addCols($key['addCols']);
			} else if (!empty($key['addRecord'])) {
				//echo print_r($key['addRecord']).'<br>';
				$this->addRecord($key['addRecord']['i'], $key['addRecord']['text']);
			}
		}
	}

	private function set_html_type($item, $tag)
	{
		if ($tag == 'p') {
    		$this->html_content[$this->html_index] = array('i' => $this->html_index, 'text' => $item);
    		$this->html_index++;
		} else if ($tag == 'span') {
    		$this->html_content[$this->html_index] = array('i' => $this->html_index, 'raw' => $item);
    		$this->html_index++;
		} else if ($tag == 'br') {
    		$this->html_content[$this->html_index] = array('i' => $this->html_index, 'feed' => 1);
    		$this->html_index++;
		}
	}

    private function getTextBetweenTags($tag, $html, $strict=0)
    {
        $dom = new domDocument;
        if ($strict==1) {
            $dom->loadXML($html);
        } else {
            $dom->loadHTML($html);
        }
        $dom->preserveWhiteSpace = false;
        $content = $dom->getElementsByTagname($tag);
        $out = array();
        foreach ($content as $item) {
            $out[] = $item->nodeValue;
        }
        return $out;
    }

    public function windowClose($b = true)
    {
    	$this->window_close = $b;
    }

	public function run()
	{
		$this->records .= '.print()';
		$wclose = '';
		if ($this->window_close) {
			$wclose = 'window.close();';
		}
		$this->html = '
		<script src="'.site_url('assets/js/recta.js').'"></script>
		<script type="text/javascript">
		    var printer = new Recta("'.$this->key.'", "'.$this->port.'")
		    printer.open().then(function(){ 
		    	'.$this->records.';
		    	'.$wclose.'
		    });
		</script>
		';
		print_r($this->html);
		$this->records = "";
	}

	public function test()
	{
		$text = "";
		for ($i=0; $i < $this->width_paper; $i++) {
			$text .= "0";
		}
		$wclose = '';
		if ($this->window_close) {
			$wclose = 'window.close();';
		}
		$this->html = '
		<script src="'.site_url('assets/js/recta.js').'"></script>
		<script type="text/javascript">
		    var printer = new Recta("'.$this->key.'", "'.$this->port.'")
		    printer.open().then(function(){ 
		    	printer.text("'.$text.'").print();
		    	'.$wclose.'
		    });
		</script>
		';
		print_r($this->html);
	}

	public function debug()
	{
		print_r('<div>'.htmlentities(strip_tags($this->html)).'</div>');
	}

}

/* End of file Recta_helper.php */
/* Location: ./application/models/Recta_helper.php */
/* Author : Usama */