# WordPress Base Theme

## Setup
Download and extract the theme to your themes folder, then run `npm install` within that directory.

From here you can now run `gulp` to start compiling SCSS & transpiling JS into ES5 compatible code.

You can also run `gulp --local` if you have your site set up on a virtual host and have updated the `vhost` string in the `package.json`.

## Adding new blocks
New blocks can be registered within `includes/lib/acf.php`, you can just copy and paste the block code. You must also add it to the allowed list of ACF blocks a little further down in the same file.

The reason these are separated is so that standard blog posts can still make use of the core blocks, and you can also register your own blocks for posts if needed, while keeping the main site blocks limited to pages. This is because the site blocks are done with their own containers, so they will be full width etc. Where as post blocks are usually made to go in the container that you setup in `single.php`.

## Custom post types & taxonomies
You can add new custom post types within `includes/lib/cpt.php` - I have included a link to my custom post types generator which also generates the required code for custom taxonomies too.

## General functionality
All filters/actions can be registered within their own file, `includes/lib/filters.php` and `includes/lib/actions.php` to keep this nice and organized. The only time I deviate from this is with WooCommerce, which I usually put in it's own file since they are specific to that. The functions that you hook in the filters & actions files can be registered within `includes/lib/methods.php`. We also have a few other files for specific uses to help keep things organised, so it's worth having a look through each file in the `includes/lib` folder to see what they do. 

Any kind of snippet or block of code that you want to be re-usable can easily be done by creating it as a partial within `includes/partials`, you can then include this directly onto multiple pages and they will read from the same partial. An example of this is in `single.php` as it includes the file `includes/partials/post-share.php`.

## Adding scripts to the JS
At the top of `main.js` you will see the following: `//=include ./example.js` - this will include `example.js` into the final output script.
You can also include a script directly from NPM, if you remove the `./` and instead directly do something like this: `npm-package/script.js` - this will then pull it in from the `node_modules` folder.

## Coming soon
- WooCommerce setup with some helpful functions