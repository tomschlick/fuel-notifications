<?php

class Notify
{
	const METHOD_EMAIL 		= 'email';
	const METHOD_INTERNAL	= 'internal';
	const METHOD_SMS		= 'sms';
	const METHOD_PHONE		= 'phone';

	const STATUS_SCHEDULED	= 'scheduled';
	const STATUS_DELAYED	= 'delayed';
	const STATUS_SENT		= 'sent';
	const STATUS_ERROR		= 'error';

	public static function queue($data = null)
	{
		$notification = Model_Notification::forge();

		$notification->save();

		return $notification->id();
	}
}