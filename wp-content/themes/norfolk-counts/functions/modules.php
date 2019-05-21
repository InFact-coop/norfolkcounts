<?php namespace leeds;



/*
*
*
* @function render_module
* Receives an array of module information, possibly from the ACF plugin and renders the appropriate
* module template. Two signatures:
*

* Signature 1
* @param array $module - element of a call to ACF get_field()
* @return NULL

* Signature 2
* @param string $module_name - name of the module to call, used when calling modules directly
*     as opposed to reading them from the ACF list.
* @param array $module - data array of module content
* @return NULL
*
*/

function render_module()
{
  if(func_num_args()==1){
    $module = func_get_arg(0);
    $module_type = $module['acf_fc_layout'];
  }
  if(func_num_args()==2){
    $module = func_get_arg(1);
    $module_type = func_get_arg(0);
  }

  $module_filename = "partials/modules/{$module_type}.php";
  $file = locate_template($module_filename);
  if($file === ""){
    throw new \Exception("Module file for $module_type was not found.");
  }
  require($file);
}
