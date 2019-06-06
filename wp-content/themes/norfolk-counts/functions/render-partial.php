<?php

/*
*
*
* @function render_partial
* provides a global wrapper to the process of including HTML in
* partials. This is a little bit of future-proofing, and also
* makes the call easier to read than setting variables before require-ing
* @param string $partial the name of the partial being called.
8 @param mixed $options either:
  - a property bag of params for the partial in question
  - since many partials take only a single content argument, if this param is
    a string it will be passeed as-is to the partial as the $content variable
* @return null
*/

function render_partial($partial, $options = array())
{
  if (is_array($options)):
    //make the options available as simple variables
    foreach ($options as $key => $val) {
      $$key = $val;
    }
  else:
    $content = $options;
  endif;

  require get_stylesheet_directory() . "/partials/$partial.php";
}

/*
 *
 *
 * @function render_partial_html
 * wraps render_partial and returns the HTML instead of echoing it.
 * @return string $html of the partial
 */

function render_partial_html($partial, $options = array())
{
  ob_start();
  render_partial($partial, $options);
  return ob_get_clean();
}
