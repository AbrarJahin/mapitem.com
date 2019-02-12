<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	@foreach ($setUrls as $url)
		<sitemap>
			<loc>			{{$url['loc']}}			</loc>
			<lastmod>		{{$url['lastmod']}}		</lastmod>
			{{-- <changefreq>	{{$url['changefreq']}}	</changefreq> --}}
			{{-- <priority>		{{$url['priority']}}	</priority> --}}
		</sitemap>
	@endforeach
</sitemapindex>