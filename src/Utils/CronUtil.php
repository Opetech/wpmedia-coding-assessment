<?php


namespace App\Utils;


class CronUtil
{
    public static function createCrawlerCronJob(): void
    {
        $minute     = '*';
        $hour       = '0';
        $dayOfMonth = '*';
        $month      = '*';
        $dayOfWeek  = '*';
        $schedule   = sprintf('%s %s %s %s %s', $minute, $hour, $dayOfMonth, $month, $dayOfWeek);
        $command    = '/usr/local/bin/php /var/www/app/crawler.php';
        $cronJob    = sprintf('%s %s', $schedule, $command);
        $existingCronJobs = shell_exec('crontab -l');

        // Check if the cron job exists
        $pattern   = '/^\s*' . preg_quote($cronJob, '/') . '\s*$/m';
        $jobExists = preg_match($pattern, $existingCronJobs);

        if (!$jobExists) {
            $updatedCronJobs = $existingCronJobs . $cronJob . PHP_EOL;
            // Update the crontab
            shell_exec('echo "' . trim($updatedCronJobs) . '" | crontab -');
        }
    }
}
