<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
		 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
		 xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	@foreach ($setUrls as $setUrl)
		<url>
			<loc>			{{$setUrl['loc']}}			</loc>
			<lastmod>		{{$setUrl['lastmod']}}		</lastmod>
			<changefreq>	{{$setUrl['changefreq']}}	</changefreq>
			<priority>		{{$setUrl['priority']}}		</priority>
		</url>
	@endforeach
</urlset>