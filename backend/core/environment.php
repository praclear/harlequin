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

   namespace Harlequin\Backend;

   // baseline
   define('ENVIRONMENT_BASELINE',                                    realpath(dirname(basename($_SERVER['REQUEST_URI']))));
   
   // directories: backend
   define('ENVIRONMENT_DIRECTORY_BACKEND',                           ENVIRONMENT_BASELINE.'/backend/');
   define('ENVIRONMENT_DIRECTORY_BACKEND_CORE',                      ENVIRONMENT_DIRECTORY_BACKEND.'core/');
   define('ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES',                 ENVIRONMENT_DIRECTORY_BACKEND.'libraries/');
   define('ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES_GOOGLE',          ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES.'rdbms/');
   define('ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES_RDBMS',           ENVIRONMENT_DIRECTORY_BACKEND_LIBRARIES.'rdbms/');

   // directories: data
   define('ENVIRONMENT_DIRECTORY_DATA',                              ENVIRONMENT_BASELINE.'/data/');
   define('ENVIRONMENT_DIRECTORY_DATA_LOCALES',                      ENVIRONMENT_DIRECTORY_DATA.'locales/');
   define('ENVIRONMENT_DIRECTORY_DATA_LOGFILES',                     ENVIRONMENT_DIRECTORY_DATA.'locales/');

   // directories: modules
   define('ENVIRONMENT_DIRECTORY_MODULES',                           ENVIRONMENT_BASELINE.'/modules/');

   // directories: themes
   define('ENVIRONMENT_DIRECTORY_THEMES',                            ENVIRONMENT_BASELINE.'/themes/');

   // directories: uploads
   define('ENVIRONMENT_DIRECTORY_UPLOADS',                           ENVIRONMENT_BASELINE.'/uploads/');

?>