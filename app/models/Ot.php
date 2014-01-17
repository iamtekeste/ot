<?php

class Ot extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

  protected $fillable = ['beod', 'eod', 'aeod', 'starttime', 'endtime', 'user_id', 'ampm'];

  public function getDates(){

    return ['created_at', 'updated_at', 'starttime', 'endtime'];
  }
}
