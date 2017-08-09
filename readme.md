Smoke Player
============

A Wordpress plugin implementing the pop-out live radio player for Smoke Radio. Uses a HTML5 audio element with .aac and .mp3 fallback sources.

Integrates with the WP-JSON API endpoints created by Smoke Shows to display now-playing metadata.

Also automatically adds a 'listen live' link to the main radio navigation menu.

Known issues
------------

The URL rewrite of /index.php?player to /player is finnicky on some hosting. You may have to manually create a .htaccess rule.
