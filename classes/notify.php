<?php

class Notify
{
	public static function queue($data = null)
	{
		$notification = Model_Notification::forge($data);

		$notification->save();

		return $notification->id();
	}
}