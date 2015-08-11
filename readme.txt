=== Timber with Jetpack Photon ===
Contributors: slimndap
Tags: timber, jetpack, photon, cdn, images, imagemanipulation, twig
Requires at least: 3.8
Tested up to: 3.9
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plug-in to use JetPack's free Photon image manipulation and CDN with Timber.

== Description ==
Make the [Timber](https://wordpress.org/plugins/timber-library/) plugin work with Jetpack's Photon. Once installed, all TimberImages use Photon as a CDN and for image manipulation (eg. resize).

[Photon](http://jetpack.me/support/photon/) is an image acceleration and modification service for Jetpack-connected WordPress sites. Converted images are cached automatically and served from the WordPress.com CDN. Photon is part of the Jetpack plugin and completely free.

=== What does it do? ===

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

Requires the [Timber plugin](http://jarednova.github.io/timber/) by [Jared Nova](http://profiles.wordpress.org/jarednova/) and the Jetpack plugin with Photon activated.

__Contributors welcome__

* Submit a [pull request on Github](https://github.com/slimndap/TimberPhoton)

__Author__

* [Jeroen Schmit, Slim & Dapper](http://slimndap.com)

== Installation ==

Look for 'Timber with Jetpack Photon' in the plugin repository.

== Changelog ==
= 0.3 =
* Added support for the 'letterbox' filter.

= 0.2 =
* Added support for the upcoming `timber_image_src` filter.

= 0.1 =
* Proof of concept.
