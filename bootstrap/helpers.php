<?php
use Urodoz\Truncate\TruncateService;

if (!function_exists('truncateHTML')) {
   function truncateHTML($html, $limit = 150)
   {
      $truncator = new TruncateService();
      return $truncator->truncate($html, $limit);
   }
}
