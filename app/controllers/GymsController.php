<?php

class GymsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /accounts
	 *
	 * @return Response
	 */

	public function gympp()
	{
		for ($i=0; $i <136 ; $i++) { 
		 	set_time_limit(60);
			$content = file_get_contents('http://gympp.com/ncr/'.$i);
			$pattern = array(
							'# target="_blank">(.*)</a>#',
							'#<li><i class="fa-li fa fa-map-marker"></i>(.*) <a href#',
							'#<cathead><a href="(.*)" target="_blank">#',
							'#0(.*)							</li>#',
							'#									(.*).(.*)								</span>#',
							// '#<li><i class="fa-li fa fa-location-arrow"></i>(.*)</li>#' 
							 );
				
			$data = array();
			foreach ($pattern as $key => $value) {
				preg_match_all($value,$content,$matches);
				if($key==2)
				{
					foreach ($matches[1] as $key2 => $value2) {
						$data[$key][$key2]='http://gympp.com'.$value2;
					}
				}
				else if($key==4)
				{
					$rating=preg_replace("<</span>>", '', $matches[0]);
					foreach ($rating as $key2 => $value2) {
						$data[$key][$key2]=trim($value2);
					}
				}
				else
				{
					$data[$key]=$matches[1];
				}
			}
			// dd($data);
			foreach ($data[0] as $k => $v)
			{
				$entry=array('name'=>$v, 
							'address'=>$data[1][$k], 
							'url'=>$data[2][$k], 
							'phone'=>$data[3][$k], 
							'rating'=>$data[4][$k],
							'locality'=>$i,
							'location'=>'ncr'
							);
				/*if($data[5])
					$entry['dist']=$data[5][$k];*/
				Gym::create($entry);
			}
		}
	}

	public function phyzo()
	{
		for ($i=1; $i <5 ; $i++) { 
		 	set_time_limit(60);
			$content = file_get_contents('http://www.phyzo.com/l/gurgaon/sps');
			$pattern = array(
							'#<div class="name">(.*)</div>#',
							'#data-coord="(.*)"#',
							'#<div class="col-sm-6"><a href="(.*)" data-#',
							'#x20B9;(.*)</div>#',
							'#<div class="duration">(.*)</div>#',
							 );
			$data = array();
			foreach ($pattern as $key => $value) {
				preg_match_all($value,$content,$matches);
				dd($matches);
				$data[$key]=$matches[1];
			}
			// dd($data);
			foreach ($data[0] as $k => $v)
			{
				$entry=array('name'=>$v, 
							'address'=>$data[1][$k], 
							'url'=>'http://phyzo.com'.$data[2][$k],
							'price'=>$data[3][$k].' per '.$data[4][$k],
							/*'phone'=>$data[3][$k], 
							'rating'=>$data[4][$k],*/
							'locality'=>$i,
							'location'=>'gurgaon'
							);
				/*if($data[5])
					$entry['dist']=$data[5][$k];*/
				Gym::create($entry);
			}
		}
	}

	public function goodservice()
	{
		for ($i=1; $i <5 ; $i++) { 
		 	set_time_limit(60);
			$content = file_get_contents('http://www.goodservice.in/gyms/gurgaon');
			$pattern = array(
							'#<div class="name">(.*)</div>#',
							'#data-coord="(.*)"#',
							'#<div class="col-sm-6"><a href="(.*)" data-#',
							'#x20B9;(.*)</div>#',
							'#<div class="duration">(.*)</div>#',
							 );
			$data = array();
			foreach ($pattern as $key => $value) {
				preg_match_all($value,$content,$matches);
				dd($matches);
				$data[$key]=$matches[1];
			}
			// dd($data);
			foreach ($data[0] as $k => $v)
			{
				$entry=array('name'=>$v, 
							'address'=>$data[1][$k], 
							'url'=>'http://phyzo.com'.$data[2][$k],
							'price'=>$data[3][$k].' per '.$data[4][$k],
							/*'phone'=>$data[3][$k], 
							'rating'=>$data[4][$k],*/
							'locality'=>$i,
							'location'=>'gurgaon'
							);
				/*if($data[5])
					$entry['dist']=$data[5][$k];*/
				Gym::create($entry);
			}
		}
	}

	public function fitpass()
	{
		for ($i=1; $i <5 ; $i++) { 
		 	set_time_limit(60);
			$content = file_get_contents('http://www.fitpass.co.in');
			$pattern = array(
							'#style="cursor:pointer;">(.*)</p><span class="venue#',
							'# style="display:none;">(.*)</span>#',
							 );
			$data = array();
			foreach ($pattern as $key => $value) {
				preg_match_all($value,$content,$matches);
				dd($matches);
				$data[$key]=$matches[1];
			}
			// dd($data);
			foreach ($data[0] as $k => $v)
			{
				$entry=array('name'=>$v, 
							'address'=>$data[1][$k], 
							'url'=>'http://phyzo.com'.$data[2][$k],
							'price'=>$data[3][$k].' per '.$data[4][$k],
							/*'phone'=>$data[3][$k], 
							'rating'=>$data[4][$k],*/
							'locality'=>$i,
							'location'=>'gurgaon'
							);
				/*if($data[5])
					$entry['dist']=$data[5][$k];*/
				Gym::create($entry);
			}
		}
	}

}