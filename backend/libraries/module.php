<?php

   /*

      harlequin
      Copyright (c) 2015 - 2016 praclear. All rights reserved.

      This software consists of voluntary contributions made by many individuals.
      For more information, see <http://harlequin.praclear.de>.

      Permission is hereby granted, free of charge, to any person obtaining a
      copy of this software and associated documentation files (the "Software"),
      to deal in the Software without restriction, including without limitation
      the rights to use, copy, modify, merge, publish, distribute, sublicense,
      and/or sell copies of the Software, and to permit persons to whom the
      Software is furnished to do so, subject to the following conditions:

      THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
      OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
      FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
      THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
      LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
      FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
      IN THE SOFTWARE.

   */

   namespace Harlequin\Backend\Libraries;

   use \Exception;
   use Harlequin\Backend\Core;
   use Harlequin\Backend\Libraries as Library;

   class Module extends Library\Application implements Core\SpecificationModuleClass {

      private $module_installed_key;
      private $module_installed_value;
      private $module_md5sum_computed;
      private $module_md5sum_reference;
      private $modules_available;
      private $modules_installed;

      private function returnInstalledModulesDataArray() {

         return unserialize($this->returnConstantValue('DATA_MODULES_INSTALLED'));

      }

      public function checkInstalledModules() {

         if (!empty(array_diff(scandir($this->returnConstantValue('ENVIRONMENT_DIRECTORY_MODULES')), array('.', '..')))) {

            $this->modules_available = array_diff(scandir($this->returnConstantValue('ENVIRONMENT_DIRECTORY_MODULES')), array('.', '..'));
            $this->modules_installed = $this->returnInstalledModulesDataArray();

            foreach ($this->modules_installed as $this->module_installed_key => $this->module_installed_value) {

               if (!in_array($this->module_installed_key, $this->modules_available)) {

                  throw new Exception('[library] [module] [56] Module '.$this->module_installed_key.' not found, but supposed to be there.');

               }

               // search value for str_ireplace MUST include two (2) blank spaces before "-" charakter
               $this->module_md5sum_computed    = str_ireplace('  -', '', exec('tar -cf - '.$this->returnConstantValue('ENVIRONMENT_DIRECTORY_MODULES').$this->modules_installed.' | md5sum'));
               $this->module_md5sum_reference   = $this->module_installed_value['md5sum'];

               if (!$this->compareTwoStrings($this->module_md5sum_reference, $this->module_md5sum_computed)) {

                  throw new Exception('[library] [module] [66] Computed md5sum for module'.$this->module_installed_key.' is diffrent than provided reference in modules data file.');

               }

            }

         } else {

            throw new Exception('[library] [module] [49] No modules installed.');

         }

      }

   }

?>