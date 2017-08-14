<?php

namespace App\Http\Controllers;

use View;
use Response;
use App\Advertisement;
use App\PublicPage;
use DB;

class SitemapController extends Controller
{//A controller to show Sitemap pages

	/*
		URL				-> get: /sitemap.xml
		Functionality	-> Show Sitemap Index Page
		Access			-> Anyone who is Not Admin
		Created At		-> 14/08/2017
		Updated At		-> 14/08/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function index()
	{
		$lastModTime = date('c',time() - 3600);
		$noOfPagesForAds = Advertisement::where('is_active', 'active')->count()/env("MAX_ADS_PER_PAGE_SITEMAP");

		$setUrls	=	[
							[
								'set_name' 		=>	"public pages",
								'loc'			=>	route('sitemap.public'),
								"lastmod"		=>	$lastModTime,
								"changefreq"	=>	"hourly",
								"priority"		=>	1.0
							]
						];

		if($noOfPagesForAds>1)
		{
			for ($x = 0; $x < $noOfPagesForAds; $x++)
			{
				array_push($setUrls,	[
										'set_name' 		=>	"listing items ".$x+1,
										'loc'			=>	route('sitemap.listing', ['page_index' => $x]),
										"lastmod"		=>	$lastModTime,
										"changefreq"	=>	"hourly",
										"priority"		=>	1.0
									]);
			}
		}
		else
		{
			array_push($setUrls,	[
										'set_name' 		=>	"listing items",
										'loc'			=>	route('sitemap.listing'),
										"lastmod"		=>	$lastModTime,
										"changefreq"	=>	"hourly",
										"priority"		=>	0.9
									]);
		}

		$content = View::make('sitemap.index')
						->with('setUrls', $setUrls);
		return Response::make($content, '200')
					->header('Content-Type', 'text/xml');
	}

	/*
		URL				-> get: /sitemap/public
		Functionality	-> Show Sitemap for public Pages
		Access			-> Anyone who is Not Admin
		Created At		-> 14/08/2017
		Updated At		-> 14/08/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function publicPages()
	{
		$lastModTime = date('c',time() - 3600);

		$publicUrls	=	[
							[
								'page_name' 		=>	"inedex",
								'loc'			=>	route('index'),
								"lastmod"		=>	$lastModTime,
								"changefreq"	=>	"hourly",
								"priority"		=>	0.8
							],
							[
								'page_name' 		=>	"listing",
								'loc'			=>	route('listing'),
								"lastmod"		=>	$lastModTime,
								"changefreq"	=>	"hourly",
								"priority"		=>	1.0
							]
						];

		$publicPages = PublicPage::select('url', 'small_title')
							->where('is_enabled', "enabled")
							->orderBy('page_order', 'DESC')
							->orderBy('id', 'ASC')
							->get();

		foreach ($publicPages as $page)
		{
			$tempUrl = "";
			if(strpos($page->url, '/') !== false)
				$tempUrl	=	$page->url;
			else
				$tempUrl	=	route('public_page', ['url' => $page->url]);

			array_push($publicUrls,[
										'page_name' 		=>	$page->small_title,
										'loc'			=>	$tempUrl,
										"lastmod"		=>	$lastModTime,
										"changefreq"	=>	"monthly",
										"priority"		=>	0.5
									]);
		}

		$content = View::make('sitemap.detail')
						->with('urls', $publicUrls);
		return Response::make($content, '200')
					->header('Content-Type', 'text/xml');
	}

	/*
		URL				-> get: /sitemap/ads
		Functionality	-> Show Sitemap for posted ads Pages
		Access			-> Anyone who is Not Admin
		Created At		-> 14/08/2017
		Updated At		-> 14/08/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function listingPages($page_index = 0)
	{
		$adUrls	=	[];
		$advertisements = Advertisement::select(
										'id as loc',
										'title as page_name',
										//DB::raw("CONCAT (DATE_FORMAT(updated_at,'%Y-%m-%d\T%H:%i:%s'), TIMEDIFF(NOW(), UTC_TIMESTAMP)) AS lastmod")
										DB::raw("DATE_FORMAT(updated_at,'%Y-%m-%d\T%H:%i:%s') AS lastmod")
									)
									->where('is_active', 'active')
									->get();

		foreach ($advertisements as $advertisement)
		{
			array_push($adUrls,[
									'page_name' 	=>	$advertisement->page_name,
									'loc'			=>	route('listing')."#".$advertisement->loc,
									"lastmod"		=>	$advertisement->lastmod,
									"changefreq"	=>	"always",
									"priority"		=>	1.0
								]);
		}

		$content = View::make('sitemap.detail')
						->with('urls', $adUrls);
		return Response::make($content, '200')
					->header('Content-Type', 'text/xml');
	}
}
