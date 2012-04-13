<?php

class Model_Notification extends Mongo_Crud
{
	protected static $_collection_name = 'notifications';

	const METHOD_EMAIL 		= 'email';
	const METHOD_INTERNAL	= 'internal';
	const METHOD_SMS		= 'sms';
	const METHOD_PHONE		= 'phone';
	const METHOD_TWITTER	= 'twitter';

	const STATUS_SCHEDULED	= 'scheduled';
	const STATUS_DELAYED	= 'delayed';
	const STATUS_SENT		= 'sent';
	const STATUS_ERROR		= 'error';

	public $type 	= null;
	public $status 	= Notification::STATUS_SCHEDULED;
	public $methods = array(Notification::METHOD_EMAIL, Notification::METHOD_INTERNAL);
	public $notices = array(
				'conversions' => 0,
				'list' => array(
					),
				);


	public function set_methods($methods = array())
	{
		if(!is_array($methods))
		{
			$methods = array($methods);
		}
		$this->methods = $methods;

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
		$this->notices['list'][$id]['conversions']['list'][] = time();

		$this->save();

		return $this;
	}

	public function add_notice($type = null, $data = array(), $method = null)
	{
		$id = Str::random('unique');

		$this->notices['list'][$id] = array(
			'conversions'	=> array(
				'count'	=> 0,
				'list'	=> array(),
				),
			'method'	=> $method,
			'type'		=> $type,
			'data'		=> $data,
			);


		return $this;
	}
}