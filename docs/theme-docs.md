# Theme Development

## Quick Tips

Add this to `wp-config.php` to get things loading correctly:
```
define( 'WP_ENVIRONMENT_TYPE', 'development' ); 
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```

## Theme Structure
[Taken from The WordPress Docs](https://developer.wordpress.org/themes/core-concepts/theme-structure/)

### Files and Folders

Here are the minimum requirements for a theme to work:

```
parts/
  footer.html
  header.html
patterns/
  example.php
styles/
  example.json
templates/
  404.html
  archive.html
  index.html (required)
  singular.html
README.txt
functions.php
screenshot.png
style.css (required)
theme.json
```

## Resources

- [Including Assets](https://developer.wordpress.org/themes/core-concepts/including-assets/)
