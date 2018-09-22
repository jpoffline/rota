<?php

class CompileRotaOptions
{

	private $all_dates;
	private $resources;
	private $skills;
	

	function __construct($rotaname)
	{
		$this->type = $rotaname;
		$this->rotaid = 1;
		$skillsdata  = new SkillsDataSetup();
		$rotamembers = new RotaMembers();
		$rotadates   = new RotaDataSetup();
		
		$this->skills    = $skillsdata->get_skills_for_type($this->rotaid);
		$this->resources = $rotamembers->get_all();
		
		$this->all_dates = $rotadates->get_dates_for_type_and_periodid($this->rotaid, 1);
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

	function get_compiled_rota($periodid)
	{
		$who = $this->who_available_when($periodid);
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

	private function who_available_when($periodid)
	{
		$type = $this->type;
		 
		$empty = '-';
		$delim = ' ';
		$data = array();

		$count_date = 0;
		$userids_in_period_for_rota = get_userids_for_period_in_rota($periodid, $type);
		foreach($this->all_dates as $date)
		{
			$date = $date['date'];
			$row = array();
			$row['date'] = '<div onClick="onClickActiveRow(this.id);" id = "rota-row-'.$count_date.'">'.$date.'</div>';
			$row['people'] = array();
			$row['skill'] = array();
			foreach($this->skills as $s)
			{
				$row['skill'][$s['skillid']] = $empty;
			}
			$count_res = 0;
			foreach($userids_in_period_for_rota as $resource)
			{
				$resource_userid = $resource;
				$resource_username = get_username_for_userid($resource_userid);
				
				$resource_availability = list_availability_for_user_rota_period(
					$resource_username,
					$type,
					$periodid
				);
				$resource_skillids = get_skillids_for_username_in_rota($resource_userid, $type);
				if(in_array($date, $resource_availability))
				{
					$row['people'][] = $resource_username;
					$count_skill=0;
					foreach($this->skills as $a)
					{
						$skillid = $a['skillid'];
						if(in_array($skillid, $resource_skillids))
						{
							$uid = $count_date . '-' . $count_res . '-' . $count_skill;
							$resource_toprint = $this->render_resource($uid, $resource_username);

							if($row['skill'][$skillid] !=$empty)
							{
								$row['skill'][$skillid].= $delim.$resource_toprint;
							}
							else
							{
								$row['skill'][$skillid]= $resource_toprint;
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