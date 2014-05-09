TimberPhoton
============

Make the Timber plugin work with Jetpack's Photon. Once installed, all TimberImages will use Photon as a CDN and for image manipulation (eg. resize).

Make the Timber plugin work with Jetpack's Photon. Once installed, all TimberImages use Photon as a CDN and for image manipulation (eg. resize).

[Photon](http://jetpack.me/support/photon/) is an image acceleration and modification service for Jetpack-connected WordPress sites. Converted images are cached automatically and served from the WordPress.com CDN. Photon is part of the Jetpack plugin and completely free.

You can find TimberPhoton in the [Wordpress plugin repository](https://wordpress.org/plugins/timber-with-jetpack-photon/).

## What does it do?

Timber with Jetpack Photon extends the current TimberImage class to use Photon to serve and manipulate your images.

With the current version of Timber (0.18.0):
* `{{post.thumbnail.src}}` remains untouched
* `{{post.thumbnail.src|resize(100)}}` returns a Photon URL
* `{{post.thumbnail.src|resize(100,200)}}` returns a Photon URL

With the upcoming version of Timber:
* `{{post.thumbnail.src}}` returns a Photon URL
* `{{post.thumbnail.src|resize(100)}}` returns a Photon URL
* `{{post.thumbnail.src|resize(100,200)}}` returns a Photon URL

A Photon URL looks like this:

http://i0.wp.com/www.slimndap.com/wp-content/uploads/2014/05/slimndap.png
