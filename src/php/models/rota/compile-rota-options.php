<?php

class CompileRotaOptions
{

	private $all_dates;
	private $resources;
	private $skills;
	

	function __construct()
	{
		$this->type = 'music';
		$skillsdata = new SkillsDataSetup();
		$rotamembers = new RotaMembers();
		$rotadates = new RotaDataSetup();
		
		$this->skills    = $skillsdata->get_skills_for_type($this->type);
		$this->resources = $rotamembers->get_all();
		
		$this->all_dates = $rotadates->get_dates_for_type_and_periodid($this->type, 0);
	}

	function get_colnames()
	{
		$colnames = array();
		$colnames[] = 'date';
		foreach($this->skills as $s)
		{
			$colnames[] = $s['title'];
		}
		return $colnames;
	}

	function get_compiled_rota()
	{
		$who = $this->who_available_when();
		$data = array();
		foreach($who as $dd)
		{
			$row = array();
			$row[] = $dd['date'];
			foreach($dd['skill'] as $d)
			{
				$row[] = $d;
			}
			$data[] = $row;
		}
		return $data;
	}

	private function who_available_when()
	{
		$type = $this->type;
		$periodid = '1';
		$empty = '-';
		$delim = ' ';
		$data = array();

		$count_date = 0;
		foreach($this->all_dates as $date)
		{
			$row = array();
			$row['date'] = $date;
			$row['people'] = array();
			$row['skill'] = array();
			foreach($this->skills as $s)
			{
				$row['skill'][$s['skillid']] = $empty;
			}
			$count_res = 0;
			foreach($this->resources as $resource)
			{
				if(in_array($date, $resource['availability'][$type.'-periodid-'.$periodid]))
				{
					$row['people'][] = $resource['username'];
					$count_skill=0;
					foreach($this->skills as $a)
					{
						if(in_array($a['skillid'], $resource['skills'][$type]))
						{
							$uid = $count_date . '-' . $count_res . '-' . $count_skill;
							$resource_toprint = $this->render_resource($uid, $resource['username']);

							if($row['skill'][$a['skillid']] !=$empty)
							{
								$row['skill'][$a['skillid']].= $delim.$resource_toprint;
							}
							else
							{
								$row['skill'][$a['skillid']]= $resource_toprint;
							}
						}
						$count_skill++;
					}
				}
				$count_res++;
			}
			$data[] = $row;
			$count_date++;
		}
		
		return $data;
	}

	private function render_resource($id, $text)
	{
		$html_tag = 'button';
		$css_init = 'btn btn-info btn-sm';
		$js_onclick = 'onClickRotaResource(this.id);';
		return '<'.$html_tag.' class="'.$css_init.'" id="'.$id.'"onClick="'.$js_onclick.'">'.strToUpper($text).'</'.$html_tag.'>';	
	}
	
	
}


?>