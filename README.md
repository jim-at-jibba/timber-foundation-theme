
UNDERWOOD THEME - Foundation 5 Wordpress Starter theme with using Timber
======================================================

# Underwood

This is a WordPress starter theme based on the awesome Foundation 5 by Zurb. This Foundation theme differs from the rest as it makes use to the fantastic [Timber Library](http://upstatement.com/timber/) allowing you to use the [Twig](http://twig.sensiolabs.org/) templating language. Timber facilitates a separation of concerns in Wordpress splitting the data and view of your project.

I personally don't like the lightbox and slider plugins that are included with Foundation 5 so I have included [lightbox 2](http://lokeshdhakar.com/projects/lightbox2/)(Still a classic!) and [Slick](http://kenwheeler.github.io/slick/). These are installed when you you run `bower install`. This is obviously personal taste and can easily be removed by removing them from the bower.json file. See the [bower](http://bower.io/) site for more details about package management.

Please fork, copy, modify, delete, share or do whatever you like with this. 

All contributions are welcome!

## Requirements

**A brief explanation to the requirements** (feel free to skip this if you're a pro):

Back in the days we wrote all styles in the style.css file. Then we realized that this could quickly create clutter and confusion, especially in larger projects. Foundation uses SASS (equivalent to LESS, used in Bootstrap). In short, SASS is a CSS pre-processor that allows you to write styles more effectively and tidy. 

To compile SASS files into one style sheet, we use a tool called Gulp. In short, Gulp is a task runner that automates repetitive tasks like minification, compilation, linting, etc. Gulp and Gulp plugins are installed and managed via npm, the Node.js package manager. Before setting up Gulp ensure that your npm is up-to-date by running ```npm update -g npm``` (this might require ```sudo``` on certain systems)

Bower is a package manager used by Zurb to distribute Foundation. When you have Bower installed, you will be able to run ```bower update``` in the terminal to update Foundation to the latest version. (After an upgrade you must run ```gulp``` to recompile files).


**Okay, so you'll need to have the following items installed before continuing.**

  * [Node.js](http://nodejs.org): Use the installer provided on the NodeJS website.
  * [Gulp](http://gulpjs.com/): Run `[sudo] npm install --global gulp`
  * [Bower](http://bower.io): Run `[sudo] npm install -g bower`

## Quickstart

```bash
cd my-wordpress-folder/wp-content/themes/
git clone https://github.com/jim-at-jibba/timber-foundation-theme.git
mv timber-foundation-theme your-theme-name
cd your-theme-name
npm install && bower install && gulp
```

While you're working on your project, run:

`gulp`

And you're set!

Check for Updates? Run:
`bower update` 

### Stylesheet Folder Structure

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

  * Coming Soon 

### Script Folder Structure
  
  * `bower_components/`: This is the source folder where all Foundation components are located. `bower update` will check and update scripts in this folder.

  * `src/js/`: This is where you put all your custom scripts. Every .js file you put in this directory will be minified and concatinated to [script.js]. The folder will be created when you first run gulp.


  * Please note that you must run `gulp` in your terminal for the script to be copied and concatinated. 

## Demo

* [Visit the Underwood Site for a demo](http://getunderwood.co.uk)

## How to make Foundation your own
* [Learn to use the _settings file to change almost every aspect of a Foundation site](http://zurb.com/university/lessons/66)
* [Other lessons from Zurb University](http://zurb.com/university/past-lessons)


#### Pull Requests

Pull requests are highly appreciated. Here are some guidelines to help:

1. Solve a problem. Features are great, but even better is cleaning-up and fixing issues in the code that you discover
2. Make sure that your code is bug-free and does not introduce new bugs
3. Create a [pull request](https://help.github.com/articles/creating-a-pull-request)

## Documentation

* [Zurb Foundation Docs](http://foundation.zurb.com/docs/)
* [WordPress Codex](http://codex.wordpress.org/)
* [Timber](https://github.com/jarednova/timber/wiki)
* [Twig](http://twig.sensiolabs.org/)
* [Slick Carousel](http://kenwheeler.github.io/slick/)
* [Lightbox 2](http://lokeshdhakar.com/projects/lightbox2/)







