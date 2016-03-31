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

   namespace Harlequin;

   use \Exception;
   use Harlequin\Backend\Libraries as Library;

   require 'backend/bootstrap.php';

   // core files
   require ENVIRONMENT_DIRECTORY_BACKEND_CORE.'interfaces.php';

   // data files
   require ENVIRONMENT_DIRECTORY_DATA.'modules.php';
   require ENVIRONMENT_DIRECTORY_DATA.'settings.php';
   require ENVIRONMENT_DIRECTORY_DATA_MESSAGES.'errors.php';
   require ENVIRONMENT_DIRECTORY_DATA_MESSAGES.'exceptions.php';

   // libraries
   require ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES.'application.php';
   require ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES.'log.php';
   require ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES.'module.php';

   // class invocations
   $application         = new Library\Application();
   $application_log     = new Library\Log();
   $application_module  = new Library\Module();

   try {

      // integrity test
      $application_module->checkInstalledModules();

      // variable-width encoding
      mb_internal_encoding($application->returnConstantValue('SETTING_ENCODING_VARIABLEWIDTH'));
      mb_http_output($application->returnConstantValue('SETTING_ENCODING_VARIABLEWIDTH'));

      // DO SOMETHING

   } catch (Exception $application_exception) {

      $application_log->writeEntryToLogFile($application->returnCurrentDateAndTime(), 'EX', $application_exception->getMessage());
      exit($application->returnConstantValue('MSG_EXCEPTION_INDEX_GENERAL_PUBLIC'));

   }

?>