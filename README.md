# Connect Polylang Elementor - Language Switcher & Template Tweaks 
**Contributors:** [daveshine](https://profiles.wordpress.org/daveshine), [p4fbradjohnson](https://profiles.wordpress.org/p4fbradjohnson), [deckerweb](https://profiles.wordpress.org/deckerweb), [wpautobahn](https://profiles.wordpress.org/wpautobahn)  
**Donate link:** https://www.paypal.me/deckerweb  
**Tags:** elementor, polylang, multilingual, language switcher, languages, templates, widget, finder, dynamic tags, deckerweb  
**Requires at least:** 4.7  
**Tested up to:** 4.9.8  
**Requires PHP:** 5.6  
**Stable tag:** 1.0.0  
**License:** GPL-2.0-or-later  
**License URI:** https://opensource.org/licenses/GPL-2.0  

Connect Polylang with Elementor - show correct Templates, plus Elementor language switcher widget.


## Description 


### What the Plugin Does 
* **Show correct Template** (for different languages): It makes it so that Polylang can show the correct Elementor template that will be shown on the front end. Before the plugin, Elementor did not show the correct template.
* Beyond enabling the Elementor post type in Polylang settings, plus assigning every post/page/template to a language, no further settings needed for these Template tweaks. It just works out of the box. All the heavy lifting happens under the hood.
* **Usage Example:**
  * Make a header template in Elementor, set display conditions in Elementor panel, assign this to one language (English for example)
  * Make a second header template in Elementor, set NO display conditions for this one, but assign to another Polylang language (German for example), meaning to link those languages/templates in Polylang
  * Result: when viewing in frontend the proper English content appears with the English header template, translated content in German appears with the German header template


### Plus: Even More Features 
* **Polylang Language Switcher Widget**: A native Elementor Widget to easily built a nice language switcher menu and have **more styling options** for non-coders at hand
* **Elementor Finder integration**: Adds Polylang languages, admin settings links, plus support resources as quick jump links to the Elementor Finder feature (Elementor v2.3.0+) - so you can navigate more quickly from whereever you are
* **Dynamic Tags** in Elementor Pro: Polylang Language Names (all registered/active) / Current Language Name / Current Language Code / Current Language Flag (image) / Current Language URL


### Further Plugin Info 
* More features might be added in the future.
* Community collaboration between David Decker and Brad Johnson, and more code coming from the Elementor/Polylang community


### Translations 
* English (default, `en_US`) - always included
* German (`de_DE`) - always included
* German formal (`de_DE_formal`) - always included
* `.pot` file (`connect-polylang-elementor.pot`) for translators is also always included :)
* Easy plugin translation platform with GlotPress tool: [Translate "Connect Polylang Elementor"...](https://translate.wordpress.org/projects/wp-plugins/connect-polylang-elementor)


### Feedback 
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Join our [**Facebook User Community Support Group**](https://www.facebook.com/groups/deckerweb.wordpress.plugins/)


### My Other Plugins 
* [**Toolbar Extras for Genesis & Elementor - WordPress Admin Bar Enhanced**](https://wordpress.org/plugins/connect-polylang-elementor/)
* [**Builder Template Categories - for WordPress Page Builders**](https://wordpress.org/plugins/builder-template-categories/)
* [Genesis What's New Info](https://wordpress.org/plugins/genesis-whats-new-info/)
* [Genesis Layout Extras](https://wordpress.org/plugins/genesis-layout-extras/)
* [Genesis Widgetized Not Found & 404](https://wordpress.org/plugins/genesis-widgetized-notfound/)
* [Genesis Widgetized Footer](https://wordpress.org/plugins/genesis-widgetized-footer/)
* [Genesis Widgetized Archive](https://wordpress.org/plugins/genesis-widgetized-archive/)
* [Multisite Toolbar Additions](https://wordpress.org/plugins/multisite-toolbar-additions/)
* [Cleaner Plugin Installer](https://wordpress.org/plugins/cleaner-plugin-installer/)



## Installation 


### Minimum Requirements 

* WordPress version 4.7 or higher
* [Elementor](https://wordpress.org/plugins/elementor/) and [Polylang](https://wordpress.org/plugins/polylang/) plugins - free versions from WordPress.org Plugin Directory
* **Optional:** *Elementor Pro* which is needed for Theme Building possibilities (Header templates etc.). This is a paid premium product by Elementor LTD, [available via elementor.com](https://toolbarextras.com/go/elementor-pro/)
* PHP version 5.6 or higher
* MySQL version 5.0 or higher


### We Recommend Your Host Supports at least: 

* PHP version 7.0 or higher
* MySQL version 5.6 or higher / or MariaDB 10 or higher


### Installation 

1. Install using the WordPress built-in Plugin installer (via **Plugins > Add New** - search for `connect polylang elementor`), or extract the ZIP file and drop the contents in the `wp-content/plugins/` directory of your WordPress installation.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to **Polylang > Settings > Custom post types and Taxonomies**, enable the "My Templates" post type (Elementor)
4. Next time you set or edit display conditions in Elementor, the language conditions (via Polylang) should appear



## Frequently Asked Questions 


### Correct Elementor template does not show up?

Every page/ post/ template must be assigned a language for this to work. This is standard PolyLang procedure but it should be noted in case "it doesnt work".

Also, for Elementor Templates, the post type must be enabled for Polylang support: Go to **Polylang > Settings > Custom post types and Taxonomies**, enable the "My Templates" post type (Elementor).



### Where is the Elementor Widget to found?

It's in the widget category "General Elements". Plus, if Elementor Pro is active and you're editing a template, the widget additionally appears in the "Site" widget category.

When searching for widgets type "polylang" or "languages" and it will show up immediately! ;-)



### Where is the plugin's settings page?

This plugin has NO settings page, as it does not need one. All it does works just under the hood. Activate the plugin. Done.

(If there will be settings needed in the future, we might add options in later plugin versions.)



### Are custom flags supported?

In general, [custom flags](https://polylang.pro/doc/can-i-use-my-own-flags-for-the-language-switcher/) are supported in the Polylang Switcher Elementor widget and in the Dynamic Tag (Current Language Flag).
However, the default flags in Polylang are sized `16px` wide and `11px` high, this automatically applies to custom flags - as it is fully handled internally by Polylang.

To use a different size for custom flags we are trying to find ways to implement this for Elementor in future versions of this plugin.



### Is Polylang Pro supported?

Yes, it is! :)
All features of "Connect Polylang Elementor" work with both, *Polylang* (free) AND *Polylang Pro* (Premium).



### Other recommended plugins for multilingual websites?

There are quite a few:

* [**Country Flags for Elementor**](https://wordpress.org/plugins/country-flags-for-elementor/) - Native Elementor widget
* [**Polylang Pro** (Premium)](https://polylang.pro/downloads/polylang-pro/) - The official premium version with more features, plus premium support
* [**Polylang for WooCommerce** (Premium)](https://polylang.pro/downloads/polylang-for-woocommerce/) - Makes WooCommerce multilingual - official Polylang Add-On
* [**Lingotek Translation**](https://wordpress.org/plugins/lingotek-translation/) - Native Polylang integration - Lingotek brings convenient cloud-based localization and translation for WordPress
* [**Integrate Gravity Forms + Polylang**](https://wordpress.org/plugins/integrate-gravity-forms-polylang/) - Add form titles, descriptions, field labels, etc. to Polylang string translations
* [**WPML to Polylang**](https://wordpress.org/plugins/wpml-to-polylang/) - From the Polylang developer himself



### More info on Translations? 

* English - default, always included
* German (de_DE): Deutsch - immer dabei! :-)
* For custom and update-safe language files please upload them to `/wp-content/languages/connect-polylang-elementor/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `connect-polylang-elementor-en_US.mo/.po` to achieve that (for creating one see the following tools).

**Easy WordPress.org plugin translation platform with GlotPress platform:** [**Translate "Connect Polylang Elementor"...**](https://translate.wordpress.org/projects/wp-plugins/connect-polylang-elementor)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating and validating I recommend the awesome ["Poedit Editor"](https://www.poedit.net/), which works fine on Windows, macOS and Linux.



## Screenshots 

### 1. ---
[missing image]




## Changelog 


### 1.0.0 - 2018-11-?? 
* Initial release



## Upgrade Notice 


### 1.0.0 
Just released into the wild.


## Donate 
Enjoy using *Connect Polylang Elementor*? [**Please consider making a donation**](https://www.paypal.me/deckerweb) to support the project's continued development.


## Credits
Credit where credit is due. The following code/ classes, all licensed under the GPL. Note: Credit is also referenced in the code doc block inline where used.

* Polylang Switcher class (Elementor Widget) and its CSS based on widget from plugin "Language Switcher for Elementor" by Solitweb (GPLv2 or later)


## Plugin Links 
* [Translations (WP GlotPress Platform)](https://translate.wordpress.org/projects/wp-plugins/connect-polylang-elementor)
* [User support forums](https://wordpress.org/support/plugin/connect-polylang-elementor)
* [DECKERWEB WordPress Plugins Facebook Group](https://www.facebook.com/groups/deckerweb.wordpress.plugins/)