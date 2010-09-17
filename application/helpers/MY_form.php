<?php defined('SYSPATH') or die('No direct script access.');

class Form extends form_Core {

	public static function get_flash($key)
	{
		if (Kohana::instance()->session->get($key))
		{
			return Kohana::instance()->session->get($key);
		}
		else
		{
			return FALSE;
		}
	}

	public static function set_value($field = '', $default = '')
	{
		if ( ! Kohana::instance()->input->post($field))
		{
			return $default;
		}

		return Kohana::instance()->input->post($field);
	}

	public static function set_select($field = '', $value = '', $default = FALSE)
	{
		if ($_POST)
		{
			if ( ! Kohana::instance()->input->post($field))
			{
				if (count($_POST) === 0)
				{
					return ' selected="selected"';
				}
				return '';
			}

			$field = Kohana::instance()->input->post($field);

			if (is_array($field))
			{
				if (! in_array($value, $field))
				{
					return '';
				}
			}
			else
			{
				if (($field == '' OR $value == '') OR $field != $value)
				{
					return '';
				}
				else
				{
					return  ' selected="selected"';
				}
			}
		}
		elseif ($default)
		{
			return  ' selected="selected"';
		}
	}

	public static function set_checkbox($field = '', $value = '', $default = FALSE)
	{
		if ($_POST)
		{

			if ( ! Kohana::instance()->input->post($field))
			{
				if (count($_POST) === 0)
				{
					return ' checked="checked"';
				}
				return '';
			}

			$field = Kohana::instance()->input->post($field);

			if (is_array($field))
			{
				if (! in_array($value, $field))
				{
					return '';
				}
				else
				{
					return ' checked="checked"';
				}
			}
			else
			{
				if (($field == '' OR $value == '') OR $field != $value)
				{
					return '';
				}
				else
				{
					return  ' checked="checked"';
				}
			}
		}
		elseif ($default)
		{
			return  ' checked="checked"';
		}
	}

	public static function xbase_url($string)
	{
		if (Kohana::config('config.index_page'))
		{
			return url::base().Kohana::config('config.index_page').'/'.$string;
		}
		else
		{
			return url::base().$string;
		}
	}
}