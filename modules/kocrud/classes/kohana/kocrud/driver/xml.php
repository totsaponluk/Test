<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Kocrud_Driver_Xml {

	public function __construct($data = NULL, $model = NULL)
	{
		$output  = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
		
		if ( ! isset($data['request']))
		{
			throw new Kohana_Exception('No request');
		}
		
		$output .= '<request>'."\n";
		
		if ( isset($data['request']['response']))
		{
			$output .= "\t".'<response>'."\n";
			foreach ($data['request']['response'] as $id => $item)
			{
				if (is_array($item))
				{
					$output .= "\t\t".'<item>'."\n";
					
					foreach ($item as $key => $val)
					{
						$output .= "\t\t\t".'<'.$key.'>'.htmlentities($val).'</'.$key.'>'."\n";
					}
					
					$output .= "\t\t".'</item>'."\n";
				}
				else
				{
					$output .= "\t\t".'<'.$id.'>'.htmlentities($item).'</'.$id.'>'."\n";
				}
			}
			$output .= "\t".'</response>'."\n";
		}
		
		unset($data['request']['response']);
		
		foreach ($data['request'] as $key => $item)
		{
			$output .= "\t".'<'.$key.'>';

			if (is_array($item))
			{
				$output .= "\n";

				foreach ($item as $k => $val)
				{
					$output .= "\t\t".'<'.$k.'>'.htmlentities($val).'</'.$k.'>'."\n";
				}

				$output .= "\t";
			}
			else
			{
				$output .= htmlentities($item);
			}
			
			$output .= '</'.$key.'>'."\n";
		}
		
		$output .= '</request>';
		
		echo $output;
	}

}
