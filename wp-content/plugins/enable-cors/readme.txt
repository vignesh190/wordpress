=== Enable CORS ===
Contributors: devkabir
Donate link: https://www.buymeacoffee.com/devkabir011
Tags: cors, error, fix, enable, ajax, axios
Requires at least: 4.7
Tested up to: 6.3
Stable tag: 1.1.9
Requires PHP: 7.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Please read the plugin description before installing to ensure compatibility and avoid potential issues.

== Description =

Are you tired of dealing with pesky CORS errors on your website? Do you want to finally be able to access cross-origin resources with ease? Look no further! This plugin is here to solve all of your CORS issues. With just a few simple clicks, you can enable CORS support on your website and say goodbye to frustrating error messages. Plus, our tool is easy to use and compatible with all major browsers. Don't miss out on this game-changing solution! Try today and revolutionize the way you access cross-origin resources.

[youtube https://youtu.be/bFru6VCZ7KA]

## What is CORS ? ##

CORS (Cross-Origin Resource Sharing) is a security feature implemented by web browsers that blocks web pages from making requests to a different domain than the one that served the web page. This is done to prevent malicious websites from making unauthorized requests to other websites on behalf of the user.

However, there may be legitimate reasons for a web page to make requests to a different domain, such as accessing a third-party API or including resources from a CDN. In these cases, the server that the web page is making the request to can include special headers in its responses that tell the browser to allow the web page to access the resources.

If a web page tries to make a request to a different domain and the server doesn't include the necessary CORS headers, the browser will block the request and the web page will receive a CORS error. This can be frustrating for developers, as it can prevent them from accessing resources they need to build their websites or applications.

## Does the cors error occur on WordPress? ##

Yes, CORS errors can occur on WordPress websites. WordPress is a content management system (CMS) that runs on a web server and serves web pages to users through a web browser. As with any other web page, CORS errors can occur when a WordPress website tries to make requests to a different domain and the server doesn't include the necessary CORS headers in its responses.

There are several reasons why a WordPress website might encounter CORS errors. For example, the website might be using a plugin or theme that makes requests to an external API or includes resources from a different domain. In this case, the server hosting the API or resources would need to include the necessary CORS headers in its responses to allow the WordPress website to access them.

Another possible cause of CORS errors on WordPress websites is if the website is hosted on a server that has CORS headers disabled. In this case, the website would not be able to make requests to any other domains, even if the server hosting those domains includes the necessary CORS headers.

To fix CORS errors on a WordPress website, you will need to either configure the server to include the necessary CORS headers or modify the website to make requests to a different domain that does include the necessary headers. It's also possible to use a plugin or other tool to enable CORS support on your WordPress website.

## How do I enable cors without a plugin in WordPress? ##

There are a few different ways you can enable CORS support on a WordPress website without using a plugin.

Modify the server configuration: If you have access to the server that your WordPress website is hosted on, you can enable CORS by adding the necessary headers to the server's configuration. The exact steps for doing this will depend on the type of server you are using and how it is configured.


Be aware that modifying the server configuration or adding code to your WordPress website can have unintended consequences, so it's a good idea to test any changes thoroughly before deploying them to a production environment.

## How does your plugin help with CORS support? ##
This plugin adds support for CORS to your WordPress website, allowing you to specify which domains are allowed to access your website's resources, and which types of requests are allowed. This helps to ensure that your website remains secure while allowing authorized access to resources from other domains.

**If your site is serving data to others, then This plugin will work. Otherwise, do not install this plugin, It will be waste of your time only.**


== Installation ==

1. Install & Activate the plugin through the 'Plugins' screen in WordPress
1. Plugin redirect you to settings panel.

== Frequently Asked Questions ==

= What requests use CORS? =

1. Invocations of the XMLHttpRequest or Fetch APIs, as discussed above.
1. Web Fonts (for cross-domain font usage in @font-face within CSS), so that servers can deploy TrueType fonts that can only be loaded cross-origin and used by web sites that are permitted to do so.
1. WebGL textures.
1. Images/video frames drawn to a canvas using drawImage().
1. CSS Shapes from images.

= Plugin is not working on my site. =

I'm sorry to hear that you are experiencing issues with the plugin on your website. If you require assistance with resolving this issue, I recommend placing an order via my [fiverr](https://www.fiverr.com/share/3Zvz8r) to fix the issue for you. Please provide me with additional details about the issue you are facing so that I can better assist you.

== Changelog ==

= 1.1.9 - 06-09-2023 =
* Removed automate support system
* Added support form
* Add controls from font and image

...

= 1.0.0 - 28-03-2023 =
* Added support link on the settings page.
* Added automate support system.
* Added support for ajax.
* Added link for customer support.
* Added support for Font & Images issues.
* Added support for api redirection.
* Added support for image rendering issues.
* Note:: This plugin does not help on Google Analytics issues.
