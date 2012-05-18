<?php

class Project 
{
	public static function get_level ($data, $parent = 0)
	{

		if (isset($data[$parent]))
		{
			$html = '';

			foreach ($data[$parent] as $key) 
			{
				$html .= '<div class="media">';
				$html .= '
				<div class="pull-left" href="#">
					<h2 class="media-object">#'.str_pad($key->id, 2, "0", STR_PAD_LEFT).'</h2>
				</div>
				<div class="media-body">'.Str::decode_html($key->name).'
					<div class="qaction">';
						if ($key->mode != 'parent' and $key->mode != 'individu')
						{
							$html .= Html::anchor('question/create/'.$key->topic_id.'?mode=parent&parent_id='.$key->id,'Add question');
						}

						$html .= Html::anchor('question/update/'.$key->topic_id.'/'.$key->id.'?mode='.$key->mode.'&parent_id='.$key->parent_id,'Update');
						$html .= Html::anchor('question/delete/'.$key->topic_id.'/'.$key->id,'Delete',array('onclick' => "return confirm('Are you sure?')"));

			$html .='</div>';
				
				$child = static::get_level($data, $key->id);

				if ($child)
				{
					$html .= $child;
				}
				
				$html .= '</div></div>';							
			}

			return $html;
		}
		else
		{
			return false;
		}
	}
}