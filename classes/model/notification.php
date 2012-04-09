<?php

class Model_Notification extends Mongo_Crud
{
	protected static $_collection_name = 'notifications';

	public $status = Notify::STATUS_SCHEDULED;
	public $method = array(Notify::METHOD_EMAIL, Notify::METHOD_INTERNAL);
	public $notices = array(
				'conversions' => 0,
				'list' => array(
					),
				);


	public function set_method($method = array())
	{
		if(!is_array($method))
		{
			$method = array($method);
		}
		$this->method = $method;

		return $this;
	}

	public function set_status($status = null)
	{
		$this->status = $status;

		return $this;
	}

	public function add_conversion($id = null)
	{
		$this->notices['conversions']++;

		$this->notices['list'][$id]['conversions']['count']++;
		$this->notices['list'][$id]['conversions'][] = time();

		$this->save();

		return $this;
	}

	public function add_notice()
	{


		return $this;
	}
}