=== smart User Slug Hider ===
Contributors: smartware.cc
Donate link:http://smartware.cc/make-a-donation/
Tags: author, authors, user, users, url, link, security, secure, login, permalink, authorlink, author link, userlink, user link, authorpage, author page
Requires at least: 3.0
Tested up to: 4.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hide usernames in author pages URLs to enhance security

== Description ==

> This Plugin replaces user names with 16 digits coded strings.

For author page URLs WordPress uses the pattern www.example.com/author/name where 'name' represents the users login name. This means that the **login names from all your users are publicly visible**. This is the already half of the infomations needed to log in...

The smart User Slug Hider Plugin changes all author page URLs from e.g. www.example.com/author/admin to something like www.example.com/author/e9e716def73f76ac.

The codes are generated automatically and its impossible to make conclusions about the user names. The WordPress default URLs (like www.example.com/author/admin) will cause a 404 (not found) error. The plugin does not make any changes to your database. Deactivating the Plugin restores the default WordPress behavior.

There are **no settings and no need to change anything**.

= More Information =

Visit the [Plugin Homepage](http://smartware.cc/wp-smart-user-slug-hider)

= Do you like the smart User Slug Hider Plugin? =

Thanks, I appreciate that. You don't need to make a donation. No money, no beer, no coffee. Please, just [tell the world that you like what I'm doing](http://smartware.cc/make-a-donation/)! And that's all.

== Installation ==

= From your WordPress dashboard =

1. Visit 'Plugins' -> 'Add New'
1. Search for 'smart User Slug Hider'
1. Activate the plugin through the 'Plugins' menu in WordPress

= Manually from wordpress.org =

1. Download smart User Slug Hider from wordpress.org and unzip the archive
1. Upload the `smart-user-slug-hider` folder to your `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

Nothing yet.

== Screenshots ==

There's nothing to see...

== Changelog ==

= 1.0 (2014-10-02) =
* Initial Release (tanks to [joeymalek](https://profiles.wordpress.org/joeymalek/) for drawing my attention to this problem)