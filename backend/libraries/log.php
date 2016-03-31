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

   use Harlequin\Backend\Core;
   use Harlequin\Backend\Libraries as Library;

   class Log extends Library\Application implements Core\SpecificationLogClass {

      private $logfile_directory;
      private $logfile_entry;
      private $logfile_filename;

      public function writeEntryToLogFile($event_timestamp, $event_type, $event) {

         $this->logfile_directory   = $this->returnConstantValue('ENVIRONMENT_DIRECTORY_DATA_LOGFILES').date('Y').'/'.date('m').'/'.date('W').'/';
         $this->logfile_entry       = '['.$event_timestamp.'] ['.$event_type.'] '.$event;
         $this->logfile_filename    = date('d').'.log';

         if (!file_exists($this->logfile_directory)) {

            if (!mkdir($this->logfile_directory, $this->returnConstantValue('SETTING_SECURITY_PERMISSIONS_DIRECTORY_LOGFILES'), $this->returnConstantValue('SETTING_LOG_MKDIR_RECURSIVE_ENABLE'))) {

               exit($this->returnCurrentDateAndTime().'&nbsp;'.$this->returnConstantValue('MSG_ERROR_LOG_DIRECTORY_NOTCREATED'));

            }

         }

         if (is_writable($this->logfile_directory)) {

            if (!file_exists($this->logfile_directory.$this->logfile_filename)) {

               if (!fopen($this->logfile_directory.$this->logfile_filename, 'w')) {

                  exit($this->returnCurrentDateAndTime().'&nbsp;'.$this->returnConstantValue('MSG_ERROR_LOG_FILE_NOTCREATED'));

               }

               fclose($this->logfile_directory.$this->logfile_filename);

            }

            if (!file_put_contents($this->logfile_directory.$this->logfile_filename, $this->logfile_entry.PHP_EOL , FILE_APPEND)) {

               exit($this->returnCurrentDateAndTime().'&nbsp;'.$this->returnConstantValue('MSG_ERROR_LOG_FILE_ENTRY_NOTCREATED'));

            }

         } else {

            exit($this->returnCurrentDateAndTime().'&nbsp;'.$this->returnConstantValue('MSG_ERROR_LOG_DIRECTORY_NOTWRITEABLE'));

         }

      }

   }

?>