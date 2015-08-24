# PHW FAQ
### An FAQ WordPress plugin for the Milligan Libraries

## About
Forked from WPB Advanced FAQ (https://wordpress.org/plugins/wpb-advanced-faq/) by wpbean. Implements Lunr.js in the shortcode to enable client-side search capabilities for the FAQ. Licensed under the GPL v2.0

### Plugin Features

* Client-side searching of FAQs
* Categorized FAQ management system
* Tags base FAQ management system
* FAQ Order and number of FAQ control form shortcode
* Shortcode system, can be use anywhere ( widget, page or post )
* Multiple FAQ form different categories or tags
* Very light weight
* Easy to use
* Developer friendly & easy to customize

## Installation

* Install it as a regular WordPress plugin
* Active the plugin
* Add Q&A from the FAQ menu in Dashboard
* Add some CSS and Javascript to your liking!
* Use shortcode to show FAQ

### Category shortcode example

[wpb_af_faqs theme="flat" post="-1" order="DESC" orderby="date" category="" tags="" close_previous="yes"]


Options: 

* theme : Theme for FAQ. Default: flat. Valid values: flat / ui
* post : Number of FAQ to show, default -1. -1 means show all.
* order: Sort order for categories (either ascending or descending). The default is ascending. Valid values: ASC, DESC
* orderby: Sort FAQ alphabetically, by unique Category ID, or by the count of posts in that Category. Valid values: ID, date, name, slug, title etc. Details here: https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters 
* category : Comma separated FAQ categories slug.
* tags : Comma separated FAQ tags slug.
* close_previous : Close previously opend FAQ. Default yes. Valid values: yes / no

## Changelog
* version 1.0 - Forked and hacked up!
