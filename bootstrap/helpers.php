<?php
use Urodoz\Truncate\TruncateService;

if (!function_exists('truncateHTML')) {
   function truncateHTML($html, $limit = 150)
   {
      $truncator = new TruncateService();
      return $truncator->truncate($html, $limit);
   }

   function getInitials($name, $limit = 2) {
      return collect(explode(' ', trim($name)))
         ->filter()
         ->map(fn($word) => strtoupper($word[0]))
         ->take($limit)
         ->join('');
   }
}
