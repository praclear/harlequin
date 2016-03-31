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

   class Application implements Core\SpecificationApplicationClass {

      private $dateandtime_current;

      public function compareTwoStrings($string1, $string2) {

         // strcmp returns 0 if submitted strings are identical
         return (strcmp($string1, $string2) === 0 ? true : false);

      }

      public function printConstantValue($constant) {

         echo $this->returnConstantValue($constant);

      }

      public function returnConstantValue($constant) {

         return (defined($constant) === true ? constant($constant) : false);

      }

      public function returnCurrentDateAndTime() {

         // for format, returnConstantValue method cannot be used
         $this->dateandtime_current = new \DateTime(null, new \DateTimeZone($this->returnConstantValue('SETTING_DATEANDTIME_TIMEZONE')));
         return $this->dateandtime_current->format(constant(SETTING_DATEANDTIME_FORMAT));

      }

   }

?>